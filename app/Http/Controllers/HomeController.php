<?php

namespace App\Http\Controllers;

use App\Models\ChitietDonhang;
use App\Models\Danhmuc;
use App\Models\Donhang;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    public function home()
    {
        $dmsps = Danhmuc::orderby('order', 'ASC')->get();
        $sanphams = Sanpham::orderby('created_at', 'DESC')->paginate(16);
        return view('FE/index', ['sanphams' => $sanphams, 'dmsps' => $dmsps]);
    }

    public function shop()
    {
        $dmsps = Danhmuc::orderby('order', 'ASC')->get();
        $sanphams = Sanpham::orderby('created_at', 'DESC')->paginate(16);
        return view('FE/shop', ['sanphams' => $sanphams, 'dmsps' => $dmsps]);
    }

    public function sanphamtheodanhmuc($slug)
    {
        $dmsps = Danhmuc::orderby('order', 'ASC')->get();
        $danhmuc_id = Danhmuc::where('slug', '=', $slug)->pluck('id');
        $sanphams = Sanpham::where('danhmuc_id', '=', $danhmuc_id)->orderby('created_at', 'DESC')->paginate(16);
        return view('FE/shop', ['sanphams' => $sanphams, 'dmsps' => $dmsps]);
    }

    public function chitietsanpham($slug)
    {
        $dmsps = Danhmuc::orderby('order', 'ASC')->get();
        $sanpham = Sanpham::where('slug', '=', $slug)->first();
        return view('FE/san-pham', ['sanpham' => $sanpham, 'dmsps' => $dmsps]);
    }

    public function about()
    {
        return view('FE/about');
    }

    public function blog()
    {
        return view('FE/blog');
    }

    public function contact()
    {
        return view('FE/contact');
    }

    public function cart()
    {
        $tongtien = 0;
        if (session()->has('cart')) {
            foreach (session('cart') as $sanpham) {
                $tongtien += $sanpham['soluong'] * $sanpham['gia'];
            }
        }
        return view('FE/cart', compact('tongtien'));
    }

    public function thanhcong(Request $request)
    {
        try {
            //code...
            DB::transaction(function () {
                $tongtien = \request('tongtien');
                $dataItem = [];
                foreach (session('cart') as $item) {
                    $dataItem[] = [
                        'sanpham_id' => $item['id'],
                        'soluong' => $item['soluong'],
                        'gia' => $item['gia'],
                        'ghichu' => ''
                    ];
                }

                $donhang = Donhang::query()->create([
                    'user_id' => Auth::user()->id,
                    'tinh_id' => \request('tinh_id'),
                    'huyen_id' => \request('huyen_id'),
                    'xa_id' => \request('xa_id'),
                    'diachi_id' => \request('diachi_id'),
                    'ghichu' => '',
                    'trangthai' => 'chờ xác nhận',
                    'tongtien' => \request('tongtien')
                ]);

                foreach ($dataItem as $item) {
                    $item['donhang_id'] = $donhang->id;
                    ChitietDonhang::query()->create($item);
                }

                session()->forget('cart');
                DB::commit();
                return redirect()->route('datthanhcong');
            });
        } catch (\Exception $exception) {
            //throw $th;
            dd($exception);
        }
    }
    public function datthanhcong()
    {
        return view('FE/thanhcong');
    }
}

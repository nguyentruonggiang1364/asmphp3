<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use App\Models\HinhanhSanpham;
use App\Models\Sanpham;
use App\Models\Thuonghieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SanphamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Sanpham::latest()->get();
            $products = Sanpham::query()
                ->join('danhmucs', 'danhmucs.id', '=', 'sanphams.danhmuc_id')
                ->join('thuonghieus', 'thuonghieus.id', '=', 'sanphams.thuonghieu_id')
                ->select([
                    'sanphams.id as id',
                    'sanphams.name as sname',
                    'sanphams.price as price',
                    'sanphams.description as description',
                    'danhmucs.name as  dname',
                    'thuonghieus.name as tname'

                ]);
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('action', function ($product) {
                    $btn = 
                    '     
                        <a href="' . route('sanpham.edit', $product->id) . '" 
                        class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        
                        <a href="' . route('sanpham.delete', $product->id) . '" 
                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                
        }
     
        return view('sanpham.index');
    }

    public function view($id)
    {

    }

    public function add()
    {
        $danhmuc = Danhmuc::get();
        $thuonghieu = Thuonghieu::get();
        return view('sanpham.form', ['danhmuc' => $danhmuc, 'thuonghieu' => $thuonghieu]);
    }

    public function save(Request $request)
    {
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'danhmuc_id' => $request->danhmuc_id,
            'thuonghieu_id' => $request->thuonghieu_id,
            'description' => $request->description,
            'price' => $request->price,
            'status' => 'Active'
        ];

        $newsp =  Sanpham::create($data);

        $anhData = [];
        if ($file = $request->file('images')) {
            foreach ($file as $key => $file) {
                $duoifile = $file->getClientOriginalExtension();
                $tenfile = $key . '-' . time() . '.' . $duoifile;
                $path = 'upload/sanpham/';
                $file->move($path, $tenfile);

                $tmp = [
                    'sanpham_id' => $newsp->id,
                    'tenanh' => $path . $tenfile
                ];
                $anhData[] = $tmp;
            }

            HinhanhSanpham::insert($anhData);
        }

        return redirect()->route('sanpham');
    }

    public function edit($id)
    {
        $sanpham = Sanpham::find($id);
        $danhmuc = Danhmuc::get();
        $thuonghieu = Thuonghieu::get();
        $anhs = HinhanhSanpham::where('sanpham_id', '=', $id)->get();

        return view('sanpham.form', ['sanpham' => $sanpham, 'danhmuc' => $danhmuc, 'thuonghieu' => $thuonghieu, 'anhs' => $anhs]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'danhmuc_id' => $request->danhmuc,
            'thuonghieu_id' => $request->thuonghieu,
            'description' => $request->mota,
            'price' => $request->gia
        ];

        Sanpham::find($id)->update($data);

        $anhData = [];
        if ($file = $request->file('images')) {
            //xoa anh neu co roi 
            $anhs = HinhanhSanpham::where('sanpham_id', '=', $id)->get();
            foreach ($anhs as $anh) {
                if (File::exists(asset($anh->tenanh))) {
                    File::delete(asset($anh->tenanh));
                }
                $anh->delete();
            }

            //them moi
            foreach ($file as $key => $file) {
                $duoifile = $file->getClientOriginalExtension();
                $tenfile = $key . '-' . time() . '.' . $duoifile;
                $path = 'upload/sanpham/';
                $file->move($path, $tenfile);

                $tmp = [
                    'sanpham_id' => $id,
                    'tenanh' => $path . $tenfile
                ];
                $anhData[] = $tmp;
            }

            HinhanhSanpham::insert($anhData);
        }

        return redirect()->route('sanpham');
    }

    public function delete($id)
    {
        Sanpham::find($id)->delete();
        return redirect()->route('sanpham');
    }
}

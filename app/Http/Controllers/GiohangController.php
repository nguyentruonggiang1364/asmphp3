<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use Illuminate\Http\Request;

class GiohangController extends Controller
{
    //
    public function index(){
        
    }

    public function themVaoGiohang(Request $request){

        $sanpham_id = $request->productId;
        $soluong = $request->quantity;

        $sanpham = Sanpham::find($sanpham_id);
        if($sanpham == null){
            return response()->json([
                'error' => 'San Pham Ko Tim Thay'
            ],404);
        }

        $giohang = session()->get('cart',[]);
        if(isset($giohang[$sanpham_id])){
            $giohang[$sanpham_id]['soluong'] += $soluong;
        }else{
            $giohang[$sanpham_id] = [
                'id' => $sanpham->id,
                'name'=> $sanpham->name,
                'gia' => $sanpham->price,
                'soluong' => $soluong,
                'anh'=> $sanpham->hinhanhs[0]->tenanh
            ];
        }

        session()->put('cart',$giohang);

        $tongsoluong = 0;
        foreach($giohang as $item){
            $tongsoluong += $item['soluong'];
        }

        // return response()->json(['message'=>'Cart updated', 'tongsoluong' => $tongsoluong],200);
        return redirect()->route('cart');
    }

    public function xoaPhantu(Request $request){
        $cart = session()->get('cart');
        if(isset($cart[$request->id])){
            unset($cart[$request->id]);
            session()->put('cart',$cart);
        }
        session()->flash('success','Product successfully deleted.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Thuonghieu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThuonghieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all = Thuonghieu::all();
        return view('thuonghieu.index', ['all' => $all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('thuonghieu.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        //
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'order' => 0,
            'status' => 'Active',
            'logo' => '',
            'website' => ''
        ];

        Thuonghieu::create($data);
        return redirect()->route('thuonghieu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $thuonghieu = Thuonghieu::find($id);
        return view('thuonghieu.form', ['thuonghieu' => $thuonghieu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            // 'order' => 0,
            // 'status' => 'Active',
            // 'parent_id' => 0,
        ];

        Thuonghieu::find($id)->update($data);
        return redirect()->route('thuonghieu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        Thuonghieu::destroy($id);
        return redirect()->route('thuonghieu');
    }
}

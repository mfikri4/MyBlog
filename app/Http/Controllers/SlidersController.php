<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Sliders;

class SlidersController extends Controller
{
    ///menampilkan semua data
    public function index()
    {
        $data = Sliders::get();
        return view('admin.sliders.index', compact('data'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function insert(Request $request)
    {
        $request->validate(Sliders::$rules);
        $requests = $request->all();
        $requests['image'] = "";
        if($request->hasFile('image')) {
            $files = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/sliders/", $files);
            $requests['image'] = "file/sliders/" . $files;
        }
        
        $cat = Sliders::create($requests);
        if($cat){
            return redirect('admin/sliders')->with('status', 'Berhasil menambah data!');
        }

        return redirect('admin/sliders')->with('status', 'Gagal Menambah data!');
        
    }

    public function edit($id)
    {
        $data = Sliders::find($id);
        return view('admin.sliders.edit', compact('data'));
    }

    public function update(Request $request,$id)
    {
        $d = Sliders::find($id);
        if ($d == null){
            return redirect('admin/sliders')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        if($request->hasFile('image')) {
            if($d->image !== null){
                File::delete("$d->image");
            }
            $sliders = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/sliders/", $sliders);
            $req['image'] = "file/sliders/" . $category;
        }
        
        $data = Sliders::find($id)->update($req);
        if($data){
            return redirect('admin/sliders')->with('status', 'Sliders Berhasil diedit !');
        }

        return redirect('admin/sliders')->with('status', 'Gagal edit data Sliders!');
        
    }

    public function delete($id)
    {
    $data = Sliders::find($id);
    if ($data == null) {
        return redirect('admin/sliders')->with('status', 'Data tidak ditemukan !');
    }
    if ($data->image !== null || $data->image !== "") {
        file::delete("$data->image");
    }
    $delete = $data->delete();
    if ($delete) {
        return redirect('admin/sliders')->with('status', 'Berhasil hapus Sliders !');
    }
    return redirect('admin/sliders')->with('status', 'Gagal hapus Sliders !');
    }
}

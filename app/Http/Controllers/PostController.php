<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Posts;

class PostController extends Controller
{
    public function index()
    {
        $data = Posts::get();
        return view('admin.post.index', compact('data'));
    }

    public function create()
    {
        $category = Category::get();
        return view('admin.post.create', compact('category'));
    }

    public function insert(Request $request)
    {
        $request->validate(Posts::$rules);
        $requests = $request->all();
        $request['thumbnail'] = "";
        if ($request->hasFile('thumbnail')){
            $files = Str::random("20") . "-" . $request->thumbnail->getClientOriginalName();
            $request->file('thumbnail')->move("file/thumbnail/",$files);
            $requests['thumbnail']="file/thumbnail/" . $files;
        }

        $cat = Posts::create($requests);
        if($cat){
            return redirect('admin/post')->with('status','Berhasil Menambah Post !');
        }
        return redirect('admin/post')->with('status','Gagal menambah Post');
    }

    public function edit($id)
    {
        $data = Posts::find($id);
        $category = Category::get();
        return view('admin.post.edit', compact('data','category'));
    }

    public function update(Request $request, $id)
    {
        $d = Posts::find($id);
        if ($d == null){
            return redirect('admin/post')->with('status','Data tidak ditemukan !');

        }
        $req = $request->all();

        if ($request->hasFile('thumbnail')){
            if ($d->thumbnail !== null){
                File::delete("$d->thumbnail");
            }
            $post = Str::random("20") . "-" . $request->thumbnail->getClientOriginalName();
            $request->file('thumbnail')->move("file/post/",$post);
            $req['thumbnail']="file/post/".$post;
        }

        $data = Posts::find($id)->update($req);
        if ($data){
            return redirect('admin/post')->with('status', 'Post berhasil diedit !');
        }
        return redirect('admin/post')->with('status','Gagal edit post !');
    }

    public function delete($id)
    {
        $data = Posts::find($id);
        if ($data == null){
            return redirect('admin/post')->with('status','Data tidak ditemukan !');
        }
        if ($data->image !== null || $data->image !== "") {
            File::delete("$data->image");
        }
        $delete = $data->delete();
        if ($delete){
            return redirect('admin/post')->with('status', 'Berhasil hapus post !');
        }
        return redirect('admin/post')->with('status', 'Gagal hapus post !');
    }
}
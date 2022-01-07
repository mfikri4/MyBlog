<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Messages;

class MessagesController extends Controller
{
    public function index()
    {
        $data = Messages::get();
        return view('admin.messages.index', compact('data'));
    }

    public function delete($id)
    {
        $data = Messages::find($id);
        if ($data == null){
            return redirect('admin/messages')->with('status','Data tidak ditemukan !');
        }
        $delete = $data->delete();
        if ($delete){
            return redirect('admin/messages')->with('status', 'Berhasil hapus pesan !');
        }
        return redirect('admin/messages')->with('status', 'Gagal hapus pesan !');
    }
}

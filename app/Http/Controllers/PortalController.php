<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Posts;
use App\Models\Sliders;
use App\Models\User;
use App\Models\Comment;
use App\Models\Mainmenu;

class PortalController extends Controller
{
    public function index()
    {
        $data['sliders']        = Sliders::where('status', 1)->get();
        $data['posts']          = Posts::where('status', 1)->get();
        $data['latestposts']    = Posts::where('status', 1)->limit(5)->get();
        $data['headline']       = Posts::where('status', 1)->where('is_headline', 1)->get();
        $data['user']           = User::first();
        $data['category']       = Category::get();
        return view('portal.index', compact('data'));
    }

    public function about()
    {
        $data['posts']          = Posts::where('status', 1)->get();
        $data['latestpost']     = Posts::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        return view('portal.about', compact('data'));
    }

    public function contact()
    {
        $data['posts']          = Posts::where('status', 1)->get();
        $data['latestpost']     = Posts::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        return view('portal.contact', compact('data'));
    }

    public function post()
    {
        $data['posts']          = Posts::where('status', 1)->get();
        $data['latestpost']     = Posts::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        return view('portal.post', compact('data'));
    }

    public function postDetail($id)
    {
        $data['posts']          = Posts::where('status', 1)->get();
        $data['latestpost']     = Posts::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['comment']        = Comment::where('posts_id', $id)->get();
        $data['user']           = User::first();
        $_POST                  = Posts::find($id);
        return view('portal.post-detail', compact('post', 'data'));
    }

    public function menu($id)
    {
        $data['posts']          = Posts::where('status', 1)->get();
        $data['latestpost']     = Posts::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        $data['menu']           = Mainmenu::find($id);
        return view('portal.menu', compact('data'));
    }

    public function category($id)
    {
        $data['posts']          = Posts::where('status', 1)->where('categories_id',$id)->get();
        $data['latestpost']     = Posts::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        return view('portal.category', compact('data'));
    }

    public function search($request)
    {
        $data['posts']          = Posts::where('status', 1)
                                        ->where('title', 'LIKE', '%'. $request->search.'%')
                                        ->orWhere('content', 'LIKE', '%'.$request->search.'%')
                                        ->get();
        $data['latestpost']     = Posts::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        return view('portal.search', compact('data'));
    }
}
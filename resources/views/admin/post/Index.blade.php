@extends('admin.app')
@section('content')
    <h3>Post</h3>
    <hr>
    @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
    @endif
    <a href="{{ url('admin/post/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i>Tambah Post</a>
    <table class="table table-bordered">
        <thead class="bg-primary text-light">
            <tr>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($data as $cat)
        <tr>
            <td>{{$cat->title}}</td>
            <td><img width="100px" src="{{ url($cat->thumbnail) }}"></td>
            <td>
                <a href="{{ url('admin/post/edit/'.$cat->id) }}" class="btn btn-primary btn-md"><i class="far fa-edit"></i>Edit</a>
                <a href="{{ url('admin/post/delete/'.$cat->id) }}" class="btn btn-primary btn-md"><i class="far fa-trash"></i>Delete</a>
            </td>
        </tr>
        @endforeach

    </table>
@endsection
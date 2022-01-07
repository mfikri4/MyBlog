@extends('admin.app')
@section('content')
    <h3>Sliders</h3>
    <hr>
    @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
    @endif
    <a href="{{ url('admin/sliders/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i>Tambah Slider</a>
    <table class="table table-bordered">
        <thead class="bg-primary text-light">
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Url</th>
                <th>Order</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($data as $dt)
        <tr>
            <td>{{$dt->title}}</td>
            <td><img width="100px" src="{{ url($dt->image) }}"></td>
            <td>{{$dt->url}}</td>
            <td>{{$dt->order}}</td>
            <td>{{$dt->status}}</td>
            <td>
                <a href="{{ url('admin/sliders/edit/'.$dt->id) }}" class="btn btn-primary btn-md"><i class="far fa-edit"></i>Edit</a>
                <a href="{{ url('admin/sliders/delete/'.$dt->id) }}" class="btn btn-danger btn-md"><i class="far fa-trash"></i>Delete</a>
            </td>
        </tr>
        @endforeach

    </table>
@endsection
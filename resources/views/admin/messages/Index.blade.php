@extends('admin.app')
@section('content')
    <h3>Messages</h3>
    <hr>
    @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead class="bg-primary text-light">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Messages</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($data as $dt)
        <tr>
            <td>{{$dt->name}}</td>
            <td>{{$dt->email}}</td>
            <td>{{$dt->subject}}</td>
            <td>{{$dt->message}}</td>
            <td>
                <a href="{{ url('admin/messages/delete/'.$dt->id) }}" class="btn btn-danger btn-md"><i class="far fa-trash"></i>Delete</a>
            </td>
        </tr>
        @endforeach

    </table>
@endsection
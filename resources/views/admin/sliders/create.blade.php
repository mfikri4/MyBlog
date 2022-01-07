@extends('admin.app')
@section('content')
    <h3>Create Sliders</h3>
    <hr>
    <div class="col-lg-6">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url('admin/sliders/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Slider Title</label>
            <input type="text" name="title" class="form-control">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            <label for="url">Url</label>
            <input type="text" name="url" class="form-control">
            <label for="order">Order</label>
            <select class="form-control" name="order" id="order">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="1">Publish</option>
                <option value="0">Tidak Publish</option>
            </select>
            <br>
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{ url('admin/sliders') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i>Kembali</a>
        </form>
    </div>
    
@endsection
@section('js')
<script src="{{url('assets/ckeditor/ckeditor.js')}}"></script>

<script>
    var content = document.getElementById("content");
    CKEDITOR.replace(content,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>
@endsection
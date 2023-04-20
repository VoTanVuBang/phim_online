@extends('layouts.app')
@section('content')
{{-- <div class="container">
    @include('layouts.navbar')
</div> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">Quản lý Thể loại</div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!isset($genre))
                    {!! Form::open(['route'=>'genre.store','method'=>'POST']) !!}
                    @else
                    {!! Form::open(['route'=>['genre.update',$genre->id],'method'=>'PUT']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Tên thể loại', []) !!}
                            {!! Form::text('title', isset($genre) ? $genre->title : '', ['class'=>'form-control','placeholder'=>'Nhập tên danh mục...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug thể loại', []) !!}
                            {!! Form::text('slug', isset($genre) ? $genre->slug : '', ['class'=>'form-control','id'=>'convert_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả', []) !!}
                            {!! Form::textarea('description', isset($genre) ? $genre->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập vào mô tả...','id'=>'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Active', 'Trạng thái', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Ẩn'],isset($genre) ? $genre->status : '', ['class'=>'form-controll']) !!}
                          
                        </div>
                        @if(!isset($genre))
                        {!! Form::submit('Thêm dữ liệu', ['class'=>'btn btn-success']) !!}
                        @else
                        {!! Form::submit('Cập nhật dữ liệu', ['class'=>'btn btn-success']) !!}
                        @endif

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        {{-- <table class="table" id="tablephim">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên thể loại</th>
                <th scope="col">Slug thể loại</th>
                <th scope="col">Mô tả thể loại</th>
                <th scope="col">Hiển thị/ Ẩn</th>
                <th scope="col">Quản lí</th>
              </tr>
            </thead>
            <tbody>
            @foreach($list as $key=> $cate)
              <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$cate->title}}</td>
                <td>{{$cate->slug}}</td>
                <td>{{$cate->description}}</td>
                <td>
                    @if ($cate->status)
                        Hiển thị
                    @else
                        Không hiển thị
                    @endif
                </td>
                <td>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'route'=> ['genre.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn chắc chắn muốn xóa không?")'
                    ]) !!}
                        {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    <a href="{{route('genre.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table> --}}
    </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
{{-- <div class="container">
    @include('layouts.navbar')
</div> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">Quản lý Link phim</div> --}}
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!isset($linkmovie))
                    {!! Form::open(['route'=>'linkmovie.store','method'=>'POST']) !!}
                    @else
                    {!! Form::open(['route'=>['linkmovie.update',$linkmovie->id],'method'=>'PUT']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Tên link phim', []) !!}
                            {!! Form::text('title', isset($linkmovie) ? $linkmovie->title : '', ['class'=>'form-control','placeholder'=>'Nhập tên link phim...']) !!}
                        </div>
                      
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả', []) !!}
                            {!! Form::textarea('description', isset($linkmovie) ? $linkmovie->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập vào mô tả...','id'=>'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Active', 'Trạng thái', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Ẩn'],isset($linkmovie) ? $linkmovie->status : '', ['class'=>'form-controll']) !!}
                          
                        </div>
                        @if(!isset($linkmovie))
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
                <th scope="col">Tên danh mục</th>
                <th scope="col">Slug danh mục</th>
                <th scope="col">Mô tả danh mục</th>
                <th scope="col">Hiển thị/ Ẩn</th>
                <th scope="col">Quản lí</th>
              </tr>
            </thead>
            <tbody class="order_position">
            @foreach($list as $key=> $cate)
              <tr id="{{$cate->id}}">
                <th  scope="row">{{$key}}</th>
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
                        'route'=> ['linkmovie.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn chắc chắn muốn xóa không?")'
                    ]) !!}
                        {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    <a href="{{route('linkmovie.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
                </td>
                
              </tr>
            @endforeach
            </tbody>
          </table> --}}
    </div>
</div>
@endsection

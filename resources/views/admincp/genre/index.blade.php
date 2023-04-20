@extends('layouts.app')
@section('content')
{{-- <div class="container">
    @include('layouts.navbar')
</div> --}}

 <div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"> --}}
                {{-- <div class="card-header">Quản lý Thể loại</div> --}}
                {{-- <a href="{{route('genre.create')}}" class="btn btn-primary">Thêm thể loại</a> --}}
               
               
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table" id="tablephim">
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
                      </table>
                {{-- </div>
            </div>
        </div>
       
    </div> --}}
</div>
@endsection

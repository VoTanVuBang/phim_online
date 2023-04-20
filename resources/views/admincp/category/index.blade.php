@extends('layouts.app')
@section('content')
{{-- <div class="container">
    @include('layouts.navbar')
</div> --}}

            
              {{-- <div class="card-header">Quản lý Danh mục</div> --}}
              {{-- <a href="{{route('category.create')}}" class="btn btn-primary">Thêm danh mục</a> --}}
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

                    <table class="table" id="tablephim">
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
                            @can('Delete')
                              {!! Form::open([
                                  'method'=>'DELETE',
                                  'route'=> ['category.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn chắc chắn muốn xóa không?")'
                              ]) !!}
                             
                                  {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
    
                                  {!! Form::close() !!}
                            @endcan
                              <a href="{{route('category.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
                          
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
             
@endsection

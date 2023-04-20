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
              {{-- <a href="{{route('linkmovie.create')}}" class="btn btn-primary">Thêm link phim</a> --}}
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
                          <th scope="col">Tên link phim</th>
                          
                          <th scope="col">Mô tả</th>
                          <th scope="col">Hiển thị/ Ẩn</th>
                          <th scope="col">Quản lí</th>
                        </tr>
                      </thead>
                      <tbody class="order_position">
                      @foreach($listmovie as $key=> $movielink)
                        <tr>
                          <th  scope="row">{{$key}}</th>
                          <td>{{$movielink->title}}</td>
                          
                          <td>{{$movielink->description}}</td>
                          <td>
                              @if ($movielink->status)
                                  Hiển thị
                              @else
                                  Không hiển thị
                              @endif
                          </td>
                          <td>
                              {!! Form::open([
                                  'method'=>'DELETE',
                                  'route'=> ['linkmovie.destroy',$movielink->id],'onsubmit'=>'return confirm("Bạn chắc chắn muốn xóa không?")'
                              ]) !!}
                                  {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                              {!! Form::close() !!}
                              <a href="{{route('linkmovie.edit',$movielink->id)}}" class="btn btn-warning">Sửa</a>
                          </td>
                          
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
      
    </div>
</div>
@endsection

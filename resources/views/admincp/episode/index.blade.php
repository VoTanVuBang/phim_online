@extends('layouts.app')
@section('content')
{{-- <div class="container">
    @include('layouts.navbar')
</div> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
        <table class="table table-responsive" id="tablephim">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên phim</th>
                <th scope="col">Hình ảnh phim</th>
                <th scope="col">Tập phim</th>
                <th scope="col">Link phim</th>
                {{-- <th scope="col">Hiển thị/ Ẩn</th> --}}
                <th scope="col">Quản lí</th>
              </tr>
            </thead>
            <tbody>
            @foreach($list_episode as $key=> $list)
               
              <tr>
                <th  scope="row">{{$key}}</th>
                <td>{{$list->movie->title}}</td>
                <td><img width="200" height="200" src="{{asset('uploads/movie/'.$list->movie->image)}}" alt=""></td>
                <td>{{$list->episode}}</td>
                <td>{!!$list->linkphim!!}</td>
                {{-- <td>
                    @if ($list->status)
                        Hiển thị
                    @else
                        Không hiển thị
                    @endif
                </td> --}}
                <td>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'route'=> ['episode.destroy',$list->id],'onsubmit'=>'return confirm("Bạn chắc chắn muốn xóa không?")'
                    ]) !!}
                        {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    <a href="{{route('episode.edit',$list->id)}}" class="btn btn-warning">Sửa</a>
                </td>
                
              </tr>
          
            @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection

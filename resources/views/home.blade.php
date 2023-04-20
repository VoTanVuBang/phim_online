@extends('layouts.app')
@section('content')
{{-- <div class="container">
    @include('layouts.navbar')
</div> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Quản lí Admin') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Chào mừng Admin') }}
                    <div>
                        <p class="text-center font-weight-bold text-light bg-dark" style="font-size:20px">Thống kê chi tiết</p>
                        <a href="{{route('category.index')}}">
                            <div class="bg-success text-light">
                            <h5><strong>{{$category_total}}</strong></h5>
                            <span>Danh mục phim</span>
                            </div>
                        </a>
                        <a href="{{route('genre.index')}}">
                            <div class="bg-primary text-light">
                              <h5><strong>{{$genre_total}}</strong></h5>
                              <span>Thể loại</span>
                            </div>
                          </a>
                          <a href="{{route('country.index')}}">
                            <div class="bg-success text-light">
                              <h5><strong>{{$country_total}}</strong></h5>
                              <span>Quốc gia phim</span>
                            </div>
                          </a>
                          <a href="{{route('movie.index')}}">
                            <div class="bg-primary text-light">
                              <h5><strong>{{$movie_total}}</strong></h5>
                              <span>Phim</span>
                            </div>
                          </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

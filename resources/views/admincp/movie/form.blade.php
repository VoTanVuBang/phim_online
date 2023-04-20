@extends('layouts.app')
@section('content')
{{-- <div class="container">
    @include('layouts.navbar')
</div> --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> --}}
            {{-- <a href="{{route('movie.index')}}" class="btn btn-primary">Liệt kê phim</a> --}}
            {{-- <div class="card"> --}}
                {{-- <div class="card-header">Quản lý Phim</div> --}}

                {{-- <div class="card-body"> --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!isset($movie))
                    {!! Form::open(['route'=>'movie.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    @else
                    {!! Form::open(['route'=>['movie.update',$movie->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Tên phim', []) !!}
                            {!! Form::text('title', isset($movie) ? $movie->title: '', ['class'=>'form-control','placeholder'=>'Nhập tên danh mục...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Tên tiếng anh', 'Tên tiếng anh', []) !!}
                            {!! Form::text('name_eng', isset($movie) ? $movie->name_eng: '', ['class'=>'form-control','placeholder'=>'Nhập tên tiếng anh...']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('thoiluong', 'Thời lượng phim', []) !!}
                            {!! Form::text('thoiluong', isset($movie) ? $movie->thoiluong: '', ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('sotap', 'Số tập phim ', []) !!}
                            {!! Form::text('sotap', isset($movie) ? $movie->sotap: '', ['class'=>'form-control','placeholder'=>'Nhập số tập...']) !!}
                        </div>

                     

                        <div class="form-group">
                            {!! Form::label('trailer', 'Trailer phim', []) !!}
                            {!! Form::text('trailer', isset($movie) ? $movie->trailer: '', ['class'=>'form-control','placeholder'=>'...']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('slug', 'Slug phim', []) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug: '', ['class'=>'form-control','id'=>'convert_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả', []) !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập vào mô tả...','id'=>'description']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('tags', 'Tags Phim', []) !!}
                            {!! Form::text('tags', isset($movie) ? $movie->tags : '', ['style'=>'resize:none','class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Active', 'Trạng thái', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Ẩn'],isset($movie) ? $movie->status : '', ['class'=>'form-control']) !!}   
                        </div>
                        <div class="form-group">
                            {!! Form::label('resolution', 'Định dạng', []) !!}
                            {!! Form::select('resolution', ['0'=>'HD','1'=>'SD','2'=>'HDCam','3'=>'Cam','4'=>'FULL HD','5'=>'Trailer'],isset($movie) ? $movie->resolution : '', ['class'=>'form-control']) !!}   
                        </div>
                        <div class="form-group">
                            {!! Form::label('phude', 'Phụ đề', []) !!}
                            {!! Form::select('phude', ['0'=>'Phụ đề','1'=>'Thuyết minh/ Lồng tiếng'],isset($movie) ? $movie->phude : '', ['class'=>'form-control']) !!}   
                        </div>
                        <div class="form-group">
                            {!! Form::label('Category', 'Thuộc danh mục', []) !!}
                            {!! Form::select('category_id',$category,isset($movie) ? $movie->category_id : '' , ['class'=>'form-control']) !!}   
                        </div>  

                        <div class="form-group">
                            {!! Form::label('thuocphim', 'Thuộc phim', []) !!}
                            {!! Form::select('thuocphim',['phimle'=>'Phim lẻ','phimbo'=>'Phim bộ'],isset($movie) ? $movie->thuocphim : '' , ['class'=>'form-control']) !!}   
                        </div> 
                    
                  

                        <div class="form-group">
                            {!! Form::label('Country', 'Thuộc quốc gia', []) !!}
                            {!! Form::select('country_id',$country,isset($movie) ? $movie->country_id : ''  , ['class'=>'form-control']) !!}   
                        </div>  

                        <div class="form-group">
                            {!! Form::label('Genre', 'Thuộc thể loại', []) !!}<br>
                            {{-- {!! Form::select('genre_id',$genre,isset($movie) ? $movie->genre_id : ''  , ['class'=>'form-control']) !!}    --}}
                            @foreach($list_genre as $key=>$gen)
                            @if(isset($movie))
                                {!! Form::checkbox('genre[]',$gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false ) !!}
                            @else
                                {!! Form::checkbox('genre[]',$gen->id,'' ) !!}

                            @endif
                                {!! Form::label('genre',$gen->title) !!}

                            @endforeach
                        </div>

                        <div class="form-group">
                            {!! Form::label('Hot', 'Phim Hot', []) !!}
                            {!! Form::select('phim_hot',['1'=>'Có','0'=>'Không'],isset($movie) ? $movie->phim_hot : '' , ['class'=>'form-control']) !!}   
                        </div>
                        
                        <div class="form-group">
                           {!! Form::label('Image', 'Hình ảnh', []) !!}
                           {!! Form::file('image', ['class'=>'form-control-file']) !!}
                            @if(isset($movie))
                                <img src="{{asset('uploads/movie/'.$movie->image)}}" alt="" style="height:100px; width=100px;">
                            @endif
                          </div>
                        @if(!isset($movie))
                        {!! Form::submit('Thêm dữ liệu', ['class'=>'btn btn-success']) !!}
                        @else
                        {!! Form::submit('Cập nhật dữ liệu', ['class'=>'btn btn-success']) !!}
                        @endif

                    {!! Form::close() !!}
                {{-- </div> --}}
            {{-- </div>
        </div>
        
    </div>
</div> --}}
@endsection

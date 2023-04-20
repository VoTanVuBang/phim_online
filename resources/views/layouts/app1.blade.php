<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
   <style>
    body{
        background: #F8F8FF;
    }
   </style>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    
                 
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    {{-- Chọn danh mục Ajax  --}}
    <script>
        $('.category_choose').change(function(){
            var category_id = $(this).val();
            var movie_id = $(this).attr('id');
            $.ajax({
                url:"{{route('category-choose')}}",
                method:"GET",
                data:{category_id:category_id,movie_id:movie_id},
                success:function(data){
                    alert('Thay đổi thành công');
                }
            });
            
        })
    </script>
    {{-- Chọn quốc gia Ajax --}}
    <script>
        $('.country_choose').change(function(){
            var country_id = $(this).val();
            var movie_id = $(this).attr('id');
            $.ajax({
                url:"{{route('country-choose')}}",
                method:"GET",
                data:{country_id:country_id,movie_id:movie_id},
                success:function(data){
                    alert('Thay đổi thành công');
                }
            });
            
        })
    </script>
 
       <script>
        $('.trangthai_choose').change(function(){
            var trangthai_val = $(this).val();
            var movie_id = $(this).attr('id');
            $.ajax({
                url:"{{route('trangthai-choose')}}",
                method:"GET",
                data:{trangthai_val:trangthai_val,movie_id:movie_id},
                success:function(data){
                    alert('Thay đổi thành công');
                }
            });
            
        })
    </script>
        {{-- Chọn phụ đề Ajax --}}
    <script>
        $('.phude_choose').change(function(){
            var phude_val = $(this).val();
            var movie_id = $(this).attr('id');
            $.ajax({
                url:"{{route('phude-choose')}}",
                method:"GET",
                data:{phude_val:phude_val,movie_id:movie_id},
                success:function(data){
                    alert('Thay đổi thành công');
                }
            });
            
        })
    </script>
 
            {{-- Chọn phim hot Ajax --}}
            <script>
                $('.phimhot_choose').change(function(){
                    var phimhot_val = $(this).val();
                    var movie_id = $(this).attr('id');
                    $.ajax({
                        url:"{{route('phimhot-choose')}}",
                        method:"GET",
                        data:{phimhot_val:phimhot_val,movie_id:movie_id},
                        success:function(data){
                            alert('Thay đổi thành công');
                        }
                    });
                    
                })
            </script>

                 {{-- Chọn thuộc phim Ajax --}}
                 <script>
                    $('.thuocphim_choose').change(function(){
                        var thuocphim_val = $(this).val();
                        var movie_id = $(this).attr('id');
                        $.ajax({
                            url:"{{route('thuocphim-choose')}}",
                            method:"GET",
                            data:{thuocphim_val:thuocphim_val,movie_id:movie_id},
                            success:function(data){
                                alert('Thay đổi thành công');
                            }
                        });
                        
                    })
                </script>
                
    
                 {{-- Chọn định dạng phim Ajax --}}
                 <script>
                    $('.resolution_choose').change(function(){
                        var resolution_val = $(this).val();
                        var movie_id = $(this).attr('id');
                        $.ajax({
                            url:"{{route('resolution-choose')}}",
                            method:"GET",
                            data:{resolution_val:resolution_val,movie_id:movie_id},
                            success:function(data){
                                alert('Thay đổi thành công');
                            }
                        });
                        
                    })
                </script>


        {{-- Chọn hình ảnh ajax --}}
        <script>
            $(document).on('change','.file_image',function(){
                var movie_id = $(this).data('movie_id');
                var files = $("#file-"+movie_id)[0].files;
                //console.log(files);
                var image = document.getElementById("file-"+movie_id).files[0];
                var form_data = new FormData();
                form_data.append("file",document.getElementById("file-"+movie_id).files[0]);
                form_data.append("movie_id",movie_id);
                $.ajax({
                    url:"{{route('update-image-movie-ajax')}}",
                    method:"POST",
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    
                    data:form_data,

                    contentType:false,
                    cache:false,
                    processData:false,

                    success:function(data){
                       location.reload();
                       $('#success_gallery').html('<span class="text-success">Cập nhật hình ảnh thành công</span>');
                }
            });
            })
        </script>
    
    
    
    {{-- Số tập phim --}}
    <script >
        $('.select-movie').change(function(){
            var id = $(this).val();
            $.ajax({
                url:"{{route('select-movie')}}",
                method:"GET",
                data:{id:id},
                success:function(data){
                    $('#show_movie').html(data);
                }
            });
        })
    </script>
    {{-- Năm --}}
   <script>
        $('.select-year').change(function(){
            var year = $(this).find(':selected').val();
            var id_phim = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
           
            $.ajax({
                        url:"{{url('/update-year-phim')}}",
                        method:"POST",
                        data:{year:year,id_phim:id_phim,_token:_token},
                        success:function(data){
                            alert('Thay đổi theo năm ' + year + ' thành công');
                        }
                    })

        })
    </script>
    {{-- Season phim --}}
    <script>
        $('.select-season').change(function(){
            var season = $(this).find(':selected').val();
            var id_phim = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
           
            $.ajax({
                        url:"{{url('/update-season-phim')}}",
                        method:"POST",
                        data:{season:season,id_phim:id_phim,_token:_token},
                        success:function(data){
                            alert('Thay đổi theo năm ' + season + ' thành công');
                        }
                    })

        })
    </script>
    {{-- Top view --}}
    <script>
        $('.select-topview').change(function(){
            var topview = $(this).find(':selected').val();
            var id_phim = $(this).attr('id');
            if(topview==0){
                var text = 'Ngày';
            }else if(topview==1){
                var text = 'Tuần';
            }else{
                var text = 'Tháng';
            }
            $.ajax({
                        url:"{{url('/update-topview-phim')}}",
                        method:"GET",
                        data:{topview:topview,id_phim:id_phim},
                        success:function(data){
                            alert('Thay đổi theo top view ' + text + ' thành công');
                        }
                    })

        })
    </script>
    <script type="text/javascript">
 
        function ChangeToSlug()
            {
    
                var slug; 
             
                 //Lấy text từ thẻ input title  
                 slug = document.getElementById("slug").value;
                slug = slug.toLowerCase(); 
                 //Đổi ký tự có dấu thành không dấu
                    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                    slug = slug.replace(/đ/gi, 'd');
                    //Xóa các ký tự đặt biệt
                    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                    //Đổi khoảng trắng thành ký tự gạch ngang
                    slug = slug.replace(/ /gi, "-");
                    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                    slug = slug.replace(/\-\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-/gi, '-');
                    //Xóa các ký tự gạch ngang ở đầu và cuối
                    slug = '@' + slug + '@';
                    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                    //In slug ra textbox có id “slug”
                document.getElementById('convert_slug').value = slug;
            }
        </script>

        {{-- Sắp xếp danh mục --}}
        <script type="text/javascript">
            $('.order_position').sortable({
                placeholder: 'ui-state-highlight',
                update: function(event,ui){
                    var array_id = [];
                    $('.order_position tr').each(function(){
                        array_id.push($(this).attr('id'));
                    })

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:"{{route('resorting_category')}}",
                        method:"POST",
                        data:{array_id:array_id},
                        success:function(data){
                            alert('Sắp xếp thứ tự thành công!');
                        }
                    })
                 
                }
            })
        </script>

        {{-- Lọc phim Datatables.net --}}
        <script>
            $(document).ready( function () {
                $('#tablephim').DataTable();
            });
        </script>
        
</body>
</html>

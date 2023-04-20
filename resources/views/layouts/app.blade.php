<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
  <head>
    <title>
      Glance Design Dashboard an Admin Panel Category Flat Bootstrap Responsive
      Website Template | Home :: w3layouts
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta
      name="keywords"
      content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
    />
    <script type="application/x-javascript">
      addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

                      function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('backend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 
     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- font-awesome icons CSS -->
    <link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- //font-awesome icons CSS-->
    <!-- side nav css file -->
    <link
      href="{{asset('backend/css/SidebarNav.min.css')}}"
      media="all"
      rel="stylesheet"
      type="text/css"
    />
    <!-- //side nav css file -->
    <!-- js-->
    <script src="{{asset('backend/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('backend/js/modernizr.custom.js')}}"></script>
    <!--webfonts-->
    <link
      href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <!--//webfonts-->
    <!-- chart -->
    <script src="{{asset('backend/js/Chart.js')}}"></script>
    <!-- //chart -->
    <!-- Metis Menu -->
    <script src="{{asset('backend/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/js/custom.js')}}"></script>
    <link href="{{asset('backend/css/custom.css')}}" rel="stylesheet" />
    <!--//Metis Menu -->
    <style>
      #chartdiv {
        width: 100%;
        height: 295px;
      }
    </style>
   
   
    <!-- //requried-jsfiles-for owl -->
  </head>

  <body class="cbp-spmenu-push">
    
    @if(Auth::check())
    <div class="main-content">
      <div
        class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left"
        id="cbp-spmenu-s1"
      >
        <!--left-fixed -navigation-->
        <aside class="sidebar-left">
          <nav class="navbar navbar-inverse">
            <div class="navbar-header">
              <button
                type="button"
                class="navbar-toggle collapsed"
                data-toggle="collapse"
                data-target=".collapse"
                aria-expanded="false"
              >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <h1>
                <a class="navbar-brand" href="{{url('/home')}}"
                  ><span class="fa fa-area-chart"></span>Bang It<span
                    class="dashboard_text"
                    >Redesign dashboard</span
                  ></a
                >
              </h1>
            </div>
            <div
              class="collapse navbar-collapse"
              id="bs-example-navbar-collapse-1"
            >
              <ul class="sidebar-menu">
                <li class="header text-uppercase">Quản lí thành phần</li>
                <li class="treeview">
                  <a href="{{url('/home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  </a>
                </li>
                {{-- Danh mục --}}
                @php
                    $segment = Request::segment(1);
                @endphp
                <li class="treeview {{($segment=='category') ? 'active' : ''}}">
                  <a href="#">
                    <i class="fa fa-file"></i>
                    <span>Danh mục phim</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="{{route('category.create')}}"
                        ><i class="fa fa-angle-right"></i>Thêm danh mục</a
                      >
                    </li>
                    <li>
                        <a href="{{route('category.index')}}">
                            <i class="fa fa-angle-right"></i>Liệt kê danh mục
                        </a>
                    </li>
                  </ul>
                </li>
                {{-- Thể loại --}}
                <li class="treeview {{($segment=='genre') ? 'active' : ''}}">
                    <a href="#">
                      <i class="fa fa-child"></i>
                      <span>Thể loại phim</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                        <a href="{{route('genre.create')}}"
                          ><i class="fa fa-angle-right"></i>Thêm thể loại</a
                        >
                      </li>
                      <li>
                          <a href="{{route('genre.index')}}">
                              <i class="fa fa-angle-right"></i>Liệt kê thể loại
                          </a>
                      </li>
                    </ul>
                  </li>
                  {{-- Quốc gia --}}
                  <li class="treeview {{($segment=='country') ? 'active' : ''}}">
                    <a href="#">
                      <i class="fa fa-globe"></i>
                      <span>Quốc gia phim</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                        <a href="{{route('country.create')}}"
                          ><i class="fa fa-angle-right"></i>Thêm quốc gia phim</a
                        >
                      </li>
                      <li>
                          <a href="{{route('country.index')}}">
                              <i class="fa fa-angle-right"></i>Liệt kê quốc gia phim
                          </a>
                      </li>
                    </ul>
                  </li>
                  {{-- phim --}}
                  <li class="treeview {{($segment=='movie') ? 'active' : ''}}">
                    <a href="#">
                      <i class="fa fa-film"></i>
                      <span>Phim</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                        <a href="{{route('movie.create')}}"
                          ><i class="fa fa-angle-right"></i>Thêm phim</a
                        >
                      </li>
                      <li>
                          <a href="{{route('movie.index')}}">
                              <i class="fa fa-angle-right"></i>Liệt kê phim
                          </a>
                      </li>
                      
                    </ul>

                   
                  </li>
                  {{-- Link phim --}}
                  <li class="treeview {{($segment=='genre') ? 'active' : ''}}">
                    <a href="#">
                      <i class="fa fa-child"></i>
                      <span>Link phim</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                        <a href="{{route('linkmovie.create')}}"
                          ><i class="fa fa-angle-right"></i>Thêm link</a
                        >
                      </li>
                      <li>
                          <a href="{{route('linkmovie.index')}}">
                              <i class="fa fa-angle-right"></i>Liệt kê link
                          </a>
                      </li>
                    </ul>
                  </li>
                  {{-- Thông tin website --}}
                  @role('Admin')
                  <li class="treeview {{($segment=='genre') ? 'active' : ''}}">
                    <a href="#">
                      <i class="fa fa-child"></i>
                      <span>Thông tin website</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                        <a href="{{route('info.create')}}"
                          ><i class="fa fa-angle-right"></i>Xem thông tin</a
                        >
                      </li>
                     
                    </ul>
                  </li>
                  @endrole
                  {{-- Tập phim --}}
                  {{-- <li class="treeview">
                    <a href="#">
                      <i class="fa fa-video-camera"></i>
                      <span>Tập phim</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                        <a href="{{route('episode.create')}}"
                          ><i class="fa fa-angle-right"></i>Thêm tập phim</a
                        >
                      </li>
                      <li>
                          <a href="{{route('episode.index')}}">
                              <i class="fa fa-angle-right"></i>Liệt kê tập phim
                          </a>
                      </li>
                    </ul>
                  </li>  --}}


               
            </ul>
            <div class="clearfix"></div>
          </div>
          <!--notification menu end -->
          <div class="clearfix"></div>
        </div>
        <div class="header-right">
          <!--search-box-->
          <div class="search-box">
            <form class="input">
              <input
                class="sb-search-input input__field--madoka"
                placeholder="Search..."
                type="search"
                id="input-31"
              />
              <label class="input__label" for="input-31">
                <svg
                  class="graphic"
                  width="100%"
                  height="100%"
                  viewBox="0 0 404 77"
                  preserveAspectRatio="none"
                >
                  <path d="m0,0l404,0l0,77l-404,0l0,-77z" />
                </svg>
              </label>
            </form>
          </div>
          <!--//end-search-box-->
          <div class="profile_details">
            <ul>
              <li class="dropdown profile_details_drop">
                <a
                  href="#"
                  class="dropdown-toggle"
                  data-toggle="dropdown"
                  aria-expanded="false"
                >
                  <div class="profile_img">
                    <span class="prfil-img"
                      ><img src="images/2.jpg" alt="" />
                    </span>
                    <div class="user-name">
                      <p>{{ Auth::user()->name }}</p>
                      <span>Administrator</span>
                    </div>
                    <i class="fa fa-angle-down lnr"></i>
                    <i class="fa fa-angle-up lnr"></i>
                    <div class="clearfix"></div>
                  </div>
                </a>
                <ul class="dropdown-menu drp-mnu">
                  <li>
                    <a href="#"><i class="fa fa-cog"></i> Settings</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-user"></i> My Account</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-suitcase"></i> Profile</a>
                  </li>
                  <li>
                    {{-- <a href="#"><i class="fa fa-sign-out"></i> Logout</a> --}}
                    <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <i class="fa fa-sign-out"></i><input type="submit" class="bnt btn-danger btn-sm" value="Logout">
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- //header-ends -->
      <!-- main content start-->
      <div id="page-wrapper">
        <div class="main-page">
          <div class="col_3">
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box bg-success">
                <i class="pull-left fa fa-file icon-rounded"></i>
                <a href="{{route('category.index')}}">
                <div class="stats">
                  <h5><strong>{{$category_total}}</strong></h5>
                  <span>Danh mục phim</span>
                </div>
              </a>
              </div>
            </div>
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-child user1 icon-rounded"></i>
                <a href="{{route('genre.index')}}">
                <div class="stats">
                  <h5><strong>{{$genre_total}}</strong></h5>
                  <span>Thể loại</span>
                </div>
              </a>
              </div>
            </div>
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-globe user2 icon-rounded"></i>
                <a href="{{route('country.index')}}">
                <div class="stats">
                  <h5><strong>{{$country_total}}</strong></h5>
                  <span>Quốc gia phim</span>
                </div>
              </a>
              </div>
            </div>
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-film dollar1 icon-rounded"></i>
                <a href="{{route('movie.index')}}">
                <div class="stats">
                  <h5><strong>{{$movie_total}}</strong></h5>
                  <span>Phim</span>
                </div>
              </a>
              </div>
            </div>
            <div class="col-md-3 widget">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                <div class="stats">
                  <h5><strong>5 đang online</strong></h5>
                  <span>Total Users</span>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="row-one widgettable">
            
          </div>
         
        
          
          <script src="{{asset('backend/js/light.js')}}"></script>
          <!-- for amcharts js -->
          <script src="{{asset('backend/js/index1.js')}}"></script>
        
          <div class="col-md-12 table-responsive">
                @yield('content')
                
          </div>
        </div>
        <div class="cl  earfix"></div>
      </div>
      <!--footer-->
      <div class="footer">
        <p>
          &copy; 2012 Glance Design Dashboard. All Rights Reserved | Redesign by
          <a href="https://w3layouts.com/" target="_blank">Bằng B1910344</a>
        </p>
      </div>
      <!--//footer-->
    </div>
    @else
    @yield('content_login')
  
    @endif
   
    <script src="{{asset('backend/js/classie.js')}}"></script>
    <script>
      var menuLeft = document.getElementById('cbp-spmenu-s1'),
        showLeftPush = document.getElementById('showLeftPush'),
        body = document.body;

      showLeftPush.onclick = function () {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
      };

      function disableOther(button) {
        if (button !== 'showLeftPush') {
          classie.toggle(showLeftPush, 'disabled');
        }
      }
    </script>
    
    <script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('backend/js/scripts.js')}}"></script>


    <script src="{{asset('backend/js/SidebarNav.min.js')}}" type="text/javascript"></script>
    <script>
      $('.sidebar-menu').SidebarNav();
    </script>
    <script src="{{asset('backend/js/bootstrap.js')}}"></script>
    <!-- //Bootstrap Core JavaScript -->
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


<form action="{{route('locphim')}}" method="GET">
                <style>
                    .stylish_filter{
                       border: 0;
                       background: #12171b;
                       color: #fff;
                    }
                    .input_filter{
                       border: #fff;
                       background: #12171b;
                       color: #fff;
                       font-size: 14px;
                    }
                    .input_filter:hover{
                       border: #000;
                       background: #fff;
                       color: #000;
                    }
               </style>
                    <div class="col-md-3">
                       <div class="form-group">
                          <style></style>
                        
                          <select class="form-control stylish_filter" name="order" id="exampleFormControlSelect1">
                            <option value="">--Sắp xếp--</option>
                             <option value="date">Ngày đăng</option>
                            <option value="year_release">Năm sản xuất</option>
                            <option value="name_a_z">Tên phim</option>
                            <option value="watch_views">Lượt xem</option>
                          </select>
                       </div>
                    </div>
                    <div class="col-md-2">
                       <div class="form-group">
                        
                          <select class="form-control stylish_filter" name="genre" id="exampleFormControlSelect1">
                            <option value="">--Thể loại--</option>
                             @foreach ($genre as $key=>$gen_filter)
                                <option value="{{$gen_filter->id}}">{{$gen_filter->title}}</option>
                             @endforeach
                          </select>
                       </div>
                    </div> 
                    <div class="col-md-2">
                       <div class="form-group">
                        
                          <select class="form-control stylish_filter" name="country" id="exampleFormControlSelect1">
                             <option value="">--Quốc gia--</option>
                             @foreach ($country as $key=>$cou_filter)
                                <option value="{{$cou_filter->id}}">{{$cou_filter->title}}</option>
                             @endforeach
                          </select>
                       </div>
                    </div> <div class="col-md-3">
                       <div class="form-group ">
                        
                          {!! Form::selectYear('year',2010,2030,null,['class'=>'form-control stylish_filter','placeholder'=>'--Năm phim--']) !!}
  
                            
                       </div>
                    </div>
                    <div class="col-md-2 ">
                       <input class="btn btn-sm btn-default" type="submit" value="Lọc phim">
                    </div>
                    
                    
                 </form>

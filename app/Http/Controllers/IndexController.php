<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Rating;
use App\Models\Info;
use App\Models\LinkMovie;
use Carbon\Carbon;
use DB;

class IndexController extends Controller
{
    public function locphim(){
      
        $sapxep = $_GET['order'];
        $genre_get = $_GET['genre'];
        $country_get = $_GET['country'];
        $year_get = $_GET['year'];
        if($sapxep=='' && $genre_get==''&& $country_get==''&& $year_get==''){
            return redirect()->back();
        }else{
            $category = Category::orderBy('position','ASC')->where('status',1)->get();
            $genre = Genre::orderBy('id','DESC')->get();
            $country = Country::orderBy('id','DESC')->get();
            $phim_hot_sidebar = Movie::withCount('episode')->where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(15)->get();
            $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();
            //Lấy dữ liệu
            $movie = Movie::withCount('episode');
            if($genre_get){
                $movie = $movie->where('genre_id','=',$genre_get);
            }elseif($country_get){
                $movie = $movie->where('country_id','=',$country_get);
            }elseif($year_get){
                $movie = $movie->where('year','=',$year_get);
            }elseif($sapxep){
                $movie = $movie->orderBy('title','ASC');
            }
            $movie = $movie->orderBy('ngaycapnhat','DESC')->paginate(8);
            return view('pages.locphim',compact('category','genre','country','movie','phim_hot_sidebar','phimhot_trailer'));
            
        }
       
    }
    public function search(){

        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $category = Category::orderBy('id','DESC')->where('status',1)->get();
            $genre = Genre::orderBy('id','DESC')->get();
            $country = Country::orderBy('id','DESC')->get();
            $phim_hot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(15)->get();
            $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();
            $movie = Movie::withCount('episode')->where('title','LIKE','%'.$search.'%')->orderBy('ngaycapnhat','DESC')->get();    
            return view('pages.timkiem',compact('category','genre','country','movie','phim_hot_sidebar','phimhot_trailer','search'));
        }else{
            return redirect()->to('/');
        }
    }
    public function searching(Request $request){
        $data  = $request->all();
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $output='';
            $movie = Movie::withCount('episode')->where('title','LIKE','%'.$data['search'].'%')->orderBy('ngaycapnhat','DESC')->take(5)->get();
            if($movie){
                foreach ($movie as $key => $mov) {
                //     $output .= '<div class="item post-37176">
                //     <div>
                //         <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                //         <img src="'.url('uploads/movie/'.$mov->image).'" height="40" width="40"/>
                //         <p class="title">'.$mov->title.'</p>
                //     </div>
                //     </a>
                    
                //     </div>
                //  ';
                $output .='<a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'"><li style="cursor:pointer" class="list-group-item link-class">
                <img src="'.url('uploads/movie/'.$mov->image).'" height="40" width="40" class=""/>'.$mov->title.'<br> 
                | <span class="text-muted">'.$mov->description.'</span></li></a>';
                }
            }
            echo $output;
        }
        }
    


    public function home(){

        $info = Info::find(1);
        $meta_title= $info->title;
        $meta_description= $info->description;
        $meta_image= '';
       
        $phim_hot = Movie::withCount('episode')->where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();
        $phim_hot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(30)->get();
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $category_home = Category::with(
            // Nested trong laravel
            ['movie'=>function($q){
                $q->withCount('episode')->where('status',1);
        }])->orderBy('id','DESC')->where('status',1)->get();
        return view('pages.home',compact('category','genre','country','category_home','phim_hot','phim_hot_sidebar','phimhot_trailer','meta_title','meta_description','meta_image'));
    }
    public function category($slug){
      
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phim_hot_sidebar = Movie::withCount('episode')->where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();
        $cate_slug = Category::where('slug',$slug)->first();
        $meta_title= $cate_slug->title;
        $meta_description= $cate_slug->description;
        $meta_image= '';
       
        $movie = Movie::withCount('episode')->where('category_id',$cate_slug->id)->orderBy('ngaycapnhat','DESC')->get();
        return view('pages.category',compact('category','genre','country','cate_slug','movie','phim_hot_sidebar','phimhot_trailer','meta_title','meta_description','meta_image'));
    } 

    public function year($year){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phim_hot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();
        $year = $year ;
        $meta_title= 'Năm phim: '.$year;
        $meta_description= 'Tìm phim năm:'.$year;
        $meta_image= '';
        $movie = Movie::withCount('episode')->where('year',$year)->orderBy('ngaycapnhat','DESC')->paginate(8);
        return view('pages.year',compact('category','genre','country','year','movie','phim_hot_sidebar','phimhot_trailer','meta_title','meta_description','meta_image'));
    }

    public function tag($tag){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phim_hot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();
        $tag = $tag ;
        $meta_title= $tag;
        $meta_description= $tag;
        $meta_image= '';
        $movie = Movie::withCount('episode')->where('tags','LIKE','%'.$tag.'%')->orderBy('ngaycapnhat','DESC')->paginate(8);
        return view('pages.tag',compact('category','genre','country','tag','movie','phim_hot_sidebar','phimhot_trailer','meta_title','meta_description','meta_image'));
    }

    public function genre($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $genre_slug = Genre::where('slug',$slug)->first();
        $meta_title= $genre_slug->title;
        $meta_description= $genre_slug->description;
        $meta_image= '';
        //Nhiều thể loại
        $movie_genre = Movie_Genre::where('genre_id',$genre_slug->id)->get();
        $many_genre = [];
        foreach($movie_genre as $key=>$movi){
            $many_genre[] = $movi->movie_id;
        }
        // 

        $phim_hot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();
        $movie = Movie::withCount('episode')->whereIn('id',$many_genre)->orderBy('ngaycapnhat','DESC')->paginate(40);
        return view('pages.genre',compact('category','genre','country','genre_slug','movie','phim_hot_sidebar','phimhot_trailer','meta_title','meta_description','meta_image'));
    } 
    public function country($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $country_slug = Country::where('slug',$slug)->first();
        $meta_title= $country_slug->title;
        $meta_description= $country_slug->description;
        $meta_image= '';
        $phim_hot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();
        $movie = Movie::with('category','genre','country')->withCount('episode')->where('country_id',$country_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(40);
        return view('pages.country',compact('category','genre','country','country_slug','movie','phim_hot_sidebar','phimhot_trailer','meta_title','meta_description','meta_image'));
    } 
    public function movie($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phim_hot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();
        
        $movie = Movie::with('category','genre','country','movie_genre','episode')->where('slug',$slug)->where('status',1)->first();
        $meta_title= $movie->title;
        $meta_description= $movie->description;
        $meta_image= url('uploads/movie/'.$movie->image);
        $episode_tapdau = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','ASC')->take(1)->first();

        $episode = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','DESC')->take(3)->get();
        
        //Lấy số tập hiện hành

        //Lấy tổng tập thêm đã thêm
        $episode_current_list = Episode::with('movie')->where('movie_id',$movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();

        // Rating
        $rating = Rating::where('movie_id',$movie->id)->avg('rating');
        $rating = round($rating); //Hàm làm tròn 3.2->3.
        $count_total = Rating::where('movie_id',$movie->id)->count();
        //Tăng lượt view lên 1 khi bấm vào
        $movie->count_view += 1;
        $movie->save();
        $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        return view('pages.movie',compact('category','genre','country','movie','related','phim_hot_sidebar','phimhot_trailer','episode','episode_tapdau','episode_current_list_count','rating','count_total','meta_title','meta_description','meta_image'));
    }
    public function add_rating(Request $request){
        $data = $request->all();
        $ip_address = $request->ip();
        $rating_count = Rating::where('movie_id',$data['movie_id'])->where('ip_address',$ip_address)->count();
        if($rating_count>0){
            echo 'exist';
        }else{
            $rating = new Rating();
            $rating->movie_id = $data['movie_id'];
            $rating->rating = $data['index'];
            $rating->ip_address = $ip_address;
            $rating->save();
            echo 'done';

        }
    }
    public function watch($slug,$tap,$server_active){
      
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

        $phim_hot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(15)->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();
        $movie = Movie::with('category','genre','country','movie_genre','episode')->where('slug',$slug)->where('status',1)->first();
        $meta_title= 'Xem phim: '.$movie->title;
        $meta_description= $movie->description;
        $meta_image= url('uploads/movie/'.$movie->image);
        $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();

        // Cắt tập
        if(isset($tap)){
            $tapphim = $tap;
            $tapphim = substr($tap,4,20);
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }else{
            $tapphim = 1;
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }

        $server = LinkMovie::orderBy('id','DESC')->get();
        $episode_movie = Episode::where('movie_id',$movie->id)->get()->unique('server');
        $episode_list = Episode::where('movie_id',$movie->id)->orderBy('episode','ASC')->get();
        // server_active == server-3;
        

        // return response()->json($movie);
        return view('pages.watch',compact('category','genre','country','movie','phim_hot_sidebar','phimhot_trailer','episode','tapphim','related','meta_title','meta_description','meta_image','server','episode_movie','episode_list','server_active'));
    } 
    
    public function episode(){
        return view('pages.episode');
    }

    // Thanh toán VNPay
    public function thanhtoan_vnp(Request $request)
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $code_rand = rand(00,9999);

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $movie = Movie::orderBy('ngaycapnhat','DESC')->get();
        foreach($movie as $key=>$mov){
            $vnp_Returnurl = "http://phimonline344.com/phim_online/public/phim/$mov->slug";
        }
        $vnp_TmnCode = "KRNLRFVI";//Mã website tại VNPAY 
        $vnp_HashSecret = "BAXTNPXGMEFDKRKSEOCZYYGTWLMFEADA"; //Chuỗi bí mật

        $vnp_TxnRef = $code_rand; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán test";
        // $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = 20000 * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
       
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            // "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
             "vnp_TxnRef" => $vnp_TxnRef,
            // "vnp_ExpireDate"=>$vnp_ExpireDate
            
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            }


            
}
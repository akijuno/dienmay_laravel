<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Mail;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    

    public function index(Request $request){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo 
        $meta_desc = "Đến với chúng tôi lựa chọn hàng nghìn sản phẩm điện lạnh, điện tử, gia dụng, tivi, máy lạnh, máy giặt, điện thoại... với nhiều khuyến mãi hấp dẫn"; 
        $meta_keywords = "sản phẩm điện lạnh, điện tử, gia dụng, tivi, máy lạnh, máy giặt, điện thoại";
        $meta_title = "Siêu thị điện máy, điện lạnh giá hợp lý";
        $url_canonical = $request->url();
        //--seo
        
    	$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();
        
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->paginate(12); 
        //DB::raw('RAND()')//kieu chọn ngẫu nhiên
        // $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(9)->get();

    	return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider); //1
        // return view('pages.home')->with(compact('cate_product','brand_product','all_product')); //2
    }
    public function search(Request $request){
         //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        //seo 
        $meta_desc = "Tìm kiếm sản phẩm"; 
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
        //--seo
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 


        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);

    }
    // public function send_mail(){
    //      //send mail
    //             $to_name = "Nguyen Minh Luc";
    //             $to_email = "nguyenminhluc0703@gmail.com";//send to this email
               
             
    //             $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về hàng hóa'); //body of mail.blade.php
                
    //             Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

    //                 $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
    //                 $message->from($to_email,$to_name);//send from this mail
    //             });
    //             // return redirect('/')->with('message','');
    //             //--send mail
    // }
}

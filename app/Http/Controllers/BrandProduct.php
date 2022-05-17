<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Slider;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand_product(){
        $this->AuthLogin();
    	return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
    	//$all_brand_product = DB::table('tbl_brand')->get(); //static huong doi tuong
        // $all_brand_product = Brand::all(); 
        $all_brand_product = Brand::orderBy('brand_id','DESC')->get();
    	$manager_brand_product  = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
    	return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);


    }
    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $data = array();
        $data['brand_name'] =  $request->brand_product_name;
        $data['brand_slug'] = $request->brand_product_slug;
        $data['brand_desc'] =  $request->brand_product_desc;
        $data['brand_status'] =  $request->brand_product_status;
        $get_image = $request->file('brand_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên image
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['brand_image'] = $new_image;
            Brand::insert($data);
            Session::put("message", "<script> alert('Thêm thương hiệu thành công')</script>");
            return Redirect::to('all-brand-product');
        }
        $data['brand_image'] = '';
        Brand::insert($data);
        Session::put("message", "<script> alert('Bạn chưa chọn hình ảnh')</script>");
        return Redirect::to('add-brand-product');
    }
    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put("message","<script> alert('Hiển thị thương hiệu sản phẩm')</script>");
        return Redirect::to('all-brand-product');

    }
    public function active_brand_product($brand_product_id){ 
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put("message","<script> alert('Ẩn thương hiệu sản phẩm')</script>");
        return Redirect::to('all-brand-product');

    }
    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();

        // $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        $edit_brand_product = Brand::where('brand_id',$brand_product_id)->get();
        $manager_brand_product  = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);

        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_product_id){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] =  $request->brand_product_name;
        $data['brand_slug'] = $request->brand_product_slug;
        $data['brand_desc'] =  $request->brand_product_desc;
        $get_image = $request->file('brand_image');
      
        //add_brand_product in databise

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên image
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['brand_image'] = $new_image;
            Brand::where('brand_id', $brand_product_id)->update($data);
            Session::put("message", "<script> alert('Cập nhật thương hiệu sản phẩm thành công')</script>");
            return Redirect::to('all-brand-product');
        }
        Brand::where('brand_id', $brand_product_id)->update($data);
        Session::put("message", "<script> alert('Cập nhật thương hiệu sản phẩm thành công')</script>");
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        Session::put("message","<script> alert('Xóa danh mục sản phẩm thành công')</script>");
        return Redirect::to('all-brand-product');
    }

    //End Function Admin Page
     
     public function show_brand_home(Request $request, $brand_slug){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 
        
        
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_brand.brand_slug',$brand_slug)->paginate(6);

        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_slug',$brand_slug)->limit(1)->get();

        foreach($brand_name as $key => $val){
            //seo 
            $meta_desc = $val->brand_desc; 
            $meta_keywords = $val->brand_desc;
            $meta_title = $val->brand_name;
            $url_canonical = $request->url();
            //--seo
        }
         
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);
    }
}

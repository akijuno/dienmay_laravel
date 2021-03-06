<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---------Seo--------->
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">
    <link  rel="icon" type="image/x-icon" href="" />
    
    {{--   <meta property="og:image" content="{{$image_og}}" />  
      <meta property="og:site_name" content="http://localhost/tutorial_youtube/shopbanhanglaravel" />
      <meta property="og:description" content="{{$meta_desc}}" />
      <meta property="og:title" content="{{$meta_title}}" />
      <meta property="og:url" content="{{$url_canonical}}" />
      <meta property="og:type" content="website" /> --}}
    <!--//-------Seo--------->
    <title>{{$meta_title}}</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
     <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
    

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- <link rel="shortcut icon" href="{{('public/frontend/images/favicon.ico')}}"> -->
    <link rel="icon" href="{{('public/frontend/images/icontitle.png')}}" type="image/x-icon">
    <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png"> -->
</head><!--/head-->

<body>

    <header id="header" class="header-fix"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="boder-befor">
                    <div class="title-top-baner">
                        <p>Do ???nh h?????ng c???a d???ch Covid, <span>Nguy???n Kim</span> xin ph??p giao h??ng cho qu?? kh??ch tr??? h??n d??? ki???n. Xin l???i qu?? kh??ch v?? s??? b???t ti???n n??y.</p>
                     </div>
                </div>
                
                <div class="row row-center">
                    <div class="col-sm-3">
                        <div class="contactinfo">
                        <a href="{{URL::to('/trang-chu')}}"><img src="https://cdn.nguyenkimmall.com/images/companies/_1/html/2017/T11/homepage/Logo_NK.svg?v=2020" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                         <!-- <form action="{{URL::to('/tim-kiem')}}" method="POST">
                            {{csrf_field()}}
                            <div class="search_box pull-right">
                                <input type="text" name="keywords_submit" placeholder="T??m ki???m s???n ph???m"/>
                                <input type="submit" style="margin-top:0;color:#666" name="search_items" class="btn btn-primary btn-sm" value="T??m ki???m">
                            </div>
                        </form> -->
                        <form action="{{URL::to('/tim-kiem')}}" method="POST" class="form-search-product">
						{{csrf_field()}}
							<div class="form-search-box">
								<input type="text" name="keywords_submit" placeholder="B???n c???n t??m g?? h??m nay ?"/>
								<button class="btn-search search-icon" type="submit" name="search_items" value="T??m ki???m">
									<i class="fas fa-search icon-search"></i>
			          			</button>
							</div>
						</form>
                    </div>
                    <div class="col-sm-5">
                        <div class="nav-li-list">
                            <ul class=""> 
                            <!-- <li><a href="#"><i class="fa fa-star"></i> Y??u th??ch</a></li> -->
                                <?php
                                   $customer_id = Session::get('customer_id');
                                   $shipping_id = Session::get('shipping_id');
                                   if($customer_id!=NULL && $shipping_id==NULL){ 
                                 ?>
                                  <li><a href="{{URL::to('/checkout')}}"><i class="fab fa-cc-amazon-pay"></i>&nbsp; Thanh to??n</a></li>
                                
                                <?php
                                 }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                 ?>
                                 <li><a href="{{URL::to('/payment')}}"><i class="fab fa-cc-amazon-pay"></i>&nbsp; Thanh to??n</a></li>
                                 <?php 
                                }else{
                                ?>
                                 <li><a href="{{URL::to('/dang-nhap')}}"><i class="fab fa-cc-amazon-pay"></i>&nbsp; Thanh to??n</a></li>
                                <?php
                                 }
                                ?>
                                

                                <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i>&nbsp; Gi??? h??ng</a></li>
                                <?php
                                   $customer_id = Session::get('customer_id');
                                   if($customer_id!=NULL){ 
                                 ?>
                                  <li><a href="{{URL::to('/logout-checkout')}}"><i class="far fa-user-circle"></i>&nbsp; ????ng xu???t</a></li>
                                
                                <?php
                            }else{
                                 ?>
                                 <li><a href="{{URL::to('/dang-nhap')}}"><i class="far fa-user-circle"></i>&nbsp; T??i kho???n</a></li>
                                 <?php 
                             }
                                 ?>
                                 <!-- <li>
                                     <a href="#">
                                        <i class="fas fa-phone-alt"></i>
                                        <p>Hotline:1800 6800 (Mi???n ph??)</p>
                                     </a>
                                 </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
       
    
        <div class="header-bottom"><!--header-bottom-->
        
            <div class="container">
                <div class="row bg-navbar">
                    

                    <div class="col-sm-12 navbar-list">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                        <li class="home-margi-left"><a href="{{URL::to('/trang-chu')}}" class="active"><i class="fas fa-home"></i>&nbsp; Trang ch???</a></li>
                                <li class="dropdown"><a href="#"><i class="fas fa-th-list"></i>&nbsp; T???t c??? s???n ph???m<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($category as $key => $danhmuc)
                                        <li><a href="{{URL::to('/danh-muc/'.$danhmuc->slug_category_product)}}">{{$danhmuc->category_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#"><i class="fas fa-newspaper"></i>&nbsp; Tin t???c</a>
                                    
                                </li> 
                                <li><a href="#"><i class="fas fa-chalkboard-teacher"></i>&nbsp; H?????ng d???n mua online</a></li>
                                 <li class="call-icon">
                                     <a href="#">
                                        <i class="fas fa-phone-alt"></i>&nbsp; Hotline:1800 6800 (Mi???n ph??)</a>
                                        
                                 </li>
                            </ul>
                    </div>
                    <!-- <div class="col-sm-5">
                        <form action="{{URL::to('/tim-kiem')}}" method="POST">
                            {{csrf_field()}}
                        <div class="search_box pull-right">
                            <input type="text" name="keywords_submit" placeholder="T??m ki???m s???n ph???m"/>
                            <input type="submit" style="margin-top:0;color:#666" name="search_items" class="btn btn-primary btn-sm" value="T??m ki???m">
                        </div>
                        </form>
                    </div> -->
                </div>
            </div>
         
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <section id="slider" class="baner-slide"><!--slider-->
        <div class="bannerslide-left">
            <a href="index.html"><img src="{{asset('public/frontend/images/bannerslideleft.png')}}" alt="" /></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                        @php 
                            $i = 0;
                        @endphp
                        @foreach($slider as $key => $slide)
                            @php 
                                $i++;
                            @endphp
                            <div class="item {{$i==1 ? 'active' : '' }}">
                               
                                <div class="">
                                    <img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" height="200" width="100%" class="img img-responsive">
                                   
                                </div>
                            </div>
                        @endforeach  
                          
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left left-icon-muiten"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right right-icon-muiten"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="bannerslide-right">
        <a href="index.html"><img src="{{asset('public/frontend/images/bannerslideright.png')}}" alt="" /></a>
        </div>
    </section><!--/slider-->
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar"> 
                        <h2><i class="fas fa-th-list"></i>&nbsp; Danh m???c s???n ph???m</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                          @foreach($category as $key => $cate)
                           
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/danh-muc/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a></h4>
                                </div>
                            </div>
                        @endforeach
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2><i class="fas fa-list-alt"></i>&nbsp; Th????ng hi???u s???n ph???m</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $key => $brand)
                                    <li><a href="{{URL::to('/thuong-hieu/'.$brand->brand_slug)}}"> <span class="pull-right"></span>
                                     <img src="{{URL::to('public/uploads/product/'.$brand->brand_image)}}" height="40" alt="" />
                                    </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                        
                     
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">

                   @yield('content')
                    
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
     
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Th??ng tin c??ng ty</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Gi???i thi???u v??? c??ng ty</a></li>
                                <li><a href="#">Quy ch??? ho???t ?????ng s??n TM??T</a></li>
                                <li><a href="#">H??? th???ng c???a h??ng</a></li>
                                <li><a href="#">Tuy???n d???ng</a></li>
                                <li><a href="#">Li??n h???</a></li>
                            </ul>
                        </div>
                    </div>
                 
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Ch??nh s??ch</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Tr??? g??p</a></li>
                                <li><a href="#">??u ????i ?????i t??c</a></li>
                                <li><a href="#">??i???u ki???n giao d???ch</a></li>
                                <li><a href="#">B???o v??? th??ng tin ng?????i d??ng</a></li>
                                <li><a href="#">B???o m???t th??ng tin c???a kh??ch h??ng</a></li>
                                <li><a href="#">Ch??nh s??ch b???o h??nh</a></li>
                                <li><a href="#">Ch??nh s??ch 30 ng??y ?????i tr???</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>H??? tr??? kh??ch h??ng</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">H?????ng d???n mua h??ng</a></li>
                                <li><a href="#">H??a ????n ??i???n t???</a></li>
                                <li><a href="#">C??u h???i th?????ng g???p</a></li>
                                <li><a href="#">V???n chuy???n v?? giao nh???n</a></li>
                                <li><a href="#">Ph????ng th???c thanh to??n</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Th??ng tin kh??c</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Email:<span style="color:red"> Nguyenminhluc073@gmail.com</span></a></li>
                                <li><a href="#">Mua h??ng - g??p ?? - b???o h??nh</a></li>
                                <li><a href="#">G???i<span style="color:red"> 1800.6098</span> Mi???n ph??</a></li>
                                <li><a href="#"><span style="color:red">C???nh b??o gi??? m???o</span></a></li>
                                <li><a href="#">Ti???p nh???n c??c ph???n ??nh c???a kh??ch h??ng</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="pull-left">
                        <h4 style="font-weight:bold">Ph????ng th???c thanh to??n.</h4>
                        <img src="{{asset('public/frontend/images/iconbottom.JPG')}}" alt="" />
                    </div>
                    <div class="pull-right">
                        <h4 style="font-weight:bold">Ch???ng nh???n</h4>
                        <a target="_blank" href="http://online.gov.vn/Home/WebDetails/31869"> <img src="{{asset('public/frontend/images/iconxn.JPG')}}" alt="" /></a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>


    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2339123679735877&autoLogAppEvents=1"></script>
    <script type="text/javascript">

          $(document).ready(function(){
            $('.send_order').click(function(){
                swal({
                  title: "X??c nh???n ????n h??ng",
                  text: "????n h??ng s??? kh??ng ???????c ho??n tr??? khi ?????t,b???n c?? mu???n ?????t kh??ng?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "C???m ??n, Mua h??ng",

                    cancelButtonText: "????ng,ch??a mua",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                     if (isConfirm) {
                        var shipping_email = $('.shipping_email').val();
                        var shipping_name = $('.shipping_name').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_notes = $('.shipping_notes').val();
                        var shipping_method = $('.payment_select').val();
                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();

                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                            success:function(){
                               swal("????n h??ng", "????n h??ng c???a b???n ???? ???????c g???i th??nh c??ng", "success");
                            }
                        });

                        window.setTimeout(function(){ 
                            location.reload();
                        } ,3000);

                      } else {
                        swal("????ng", "????n h??ng ch??a ???????c g???i, l??m ??n ho??n t???t ????n h??ng", "error");

                      }
              
                });

               
            });
        });
    

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){

                var id = $(this).data('id_product');
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                if(parseInt(cart_product_qty) >  parseInt(cart_product_quantity)){
                    alert('L??m ??n ?????t s??? l?????ng nh??? h??n ' + cart_product_quantity);
                }else{
                    $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                    success:function(){

                        swal({
                                title: "???? th??m s???n ph???m v??o gi??? h??ng",
                                text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
                                showCancelButton: true,
                                cancelButtonText: "Xem ti???p",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "??i ?????n gi??? h??ng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });

                        }

                    });
                }
              
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        });
          
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh =='' && xaid ==''){
                    alert('L??m ??n ch???n ????? t??nh ph?? v???n chuy???n');
                }else{
                    $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                       location.reload(); 
                    }
                    });
                } 
        });
    });
    </script>
  
</body>
</html>
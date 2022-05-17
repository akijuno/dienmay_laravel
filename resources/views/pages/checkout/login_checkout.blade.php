@extends('layout')
@section('content')

<section id="form"><!--form-->
	<!-- <div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form">
					<h2>Đăng nhập tài khoản</h2>
					<form action="{{URL::to('/login-customer')}}" method="POST">
						{{csrf_field()}}
						<input type="text" name="email_account" placeholder="Tài khoản" />
						<input type="password" name="password_account" placeholder="Password" />
						<span>
							<input type="checkbox" class="checkbox"> 
							Ghi nhớ đăng nhập
						</span>
						<button type="submit" class="btn btn-default">Đăng nhập</button>
					</form>
				</div>
			</div>
			<div class="col-sm-1">
				<h2 class="or">Hoặc</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form">
					<h2>Đăng ký</h2>
					<form action="{{URL::to('/add-customer')}}" method="POST">
						{{ csrf_field() }}
						<input type="text" name="customer_name" placeholder="Họ và tên"/>
						<input type="email" name="customer_email" placeholder="Địa chỉ email"/>
						<input type="password" name="customer_password" placeholder="Mật khẩu"/>
						<input type="text" name="customer_phone" placeholder="Phone"/>
						<button type="submit" class="btn btn-default">Đăng ký</button>
					</form>
				</div>
			</div>
		</div>
	</div> -->
	<div class="category-tab shop-details-tab"><!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#details" data-toggle="tab">Đăng nhập </a></li>
				<li><a href="#companyprofile" data-toggle="tab">Đăng ký</a></li>
			</ul>
		</div>
		<!-- form đăng nhập -->
		<div class="tab-content">
			<div class="tab-pane fade active in" id="details" >
				<div class="login-form"><!--login form-->
							
					<form action="{{URL::to('/login-customer')}}" method="POST">
						{{csrf_field()}}
						<h5>Email</h5>
						<input type="text" name="email_account"  />
						<h5>Nhập mật khẩu</h5>
						<input type="password" name="password_account" />
						<span>
						
						Quên mật khẩu ?
						</span>
						<button type="submit" class="btn btn-default">Đăng nhập</button>
					</form>
				</div><!--/login form-->	
			</div>	
				<!--form đăng nhập  -->
			<div class="tab-pane fade" id="companyprofile" >				
				<div class="signup-form"><!--sign up form-->
					<form action="{{URL::to('/add-customer')}}" method="POST">
						{{ csrf_field() }}
						<h5>Họ và tên</h5>
						<input type="text" name="customer_name" />
						<h5>Email</h5>
						<input type="email" name="customer_email" />
						<h5>Số điện thoại</h5>
						<input type="text" name="customer_phone" />
						<h5>Mật khẩu</h5>
						<input type="password" name="customer_password"/>
						<button type="submit" class="btn btn-default">Đăng ký</button>
					</form>
				</div><!--/sign up form-->					
			</div>				
		</div>
	</div><!--/category-tab-->
</section><!--/form-->

@endsection
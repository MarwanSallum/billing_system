@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الملف الشخصي</h4>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{Auth::user()->name}}</h5>
												<p class="main-profile-name-text">Web Designer</p>
											</div>
										</div>
								
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="row row-sm">
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-primary-transparent">
												<i class="icon-layers text-primary"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13"> عدد الفواتير</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">1,587</h2>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-danger-transparent">
												<i class="icon-paypal text-danger"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">المبالغ المستحقة</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">46,782</h2>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-success-transparent">
												<i class="icon-rocket text-success"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">المبالغ المحصلة</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">1,890</h2>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
						
								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
									<div  >
										<form role="form">
											<div class="form-group">
												<label for="FullName">الإسم</label>
												<input type="text" value="{{Auth::user()->name}}" id="FullName" class="form-control">
											</div>
											<div class="form-group">
												<label for="Email">البريد الإلكتروني</label>
												<input type="email" value="{{Auth::user()->email}}" id="Email" class="form-control">
											</div>
						
											<div class="form-group">
												<label for="Password">كلمة المرور</label>
												<input type="password" placeholder="8 - أحرف أو أرقام" id="Password" class="form-control">
											</div>
											<div class="form-group">
												<label for="RePassword">إعادة كلمة المرور</label>
												<input type="password" placeholder="8 - أحرف أو أرقام" id="RePassword" class="form-control">
											</div>
									
											<button class="btn btn-primary waves-effect waves-light w-md" type="submit">تحديث</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
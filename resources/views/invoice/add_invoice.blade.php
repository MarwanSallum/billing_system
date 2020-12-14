@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal  Datetimepicker-slider css -->
<link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- Internal Spectrum-colorpicker css -->
<link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('title')
    اضافة فاتورة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">إضافة فاتورة جديدة</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-body">
					<div id="wizard3">
						<h3>بيانات العميل</h3>
						<section>
							<div class="row">
								<div class="col-sm-12 col-md-3 mg-t-10">
									<button id="selectCustomer" class="align-self-end btn btn-info btn-block">عميل موجود بالسجل</button>
								</div>
								<div class="col-sm-6 col-md-3 mg-t-10">
									<button id="newCustomer" class="align-self-end btn btn-info btn-block">إنشاء عميل جديد</button>
								</div>

							</div>
							<br>
							
								<div id="selectCustomer" class="col-lg-12 mg-t-20 mg-lg-t-0" >
									<p class="mg-b-10">إختر العميل من القائمة</p>
									<select v-show="isShowing" class="form-control select2">
										<option label="إختر هنا">
										</option>
										<option value="Firefox">
											Firefox
										</option>
										<option value="Chrome">
											Chrome
										</option>
										<option value="Safari">
											Safari
										</option>
										<option value="Opera">
											Opera
										</option>
										<option value="Internet Explorer">
											Internet Explorer
										</option>
									</select>
								
							
							</div>
							
							<br>
							<form id="newCustomer" action="">
								<div class="control-group form-group">
									<label class="form-label">الإسم</label>
									<input type="text" class="form-control required" >
								</div>
								<div class="control-group form-group">
									<label class="form-label">البريد الإلكتروني</label>
									<input type="email" class="form-control required" >
								</div>
								<div class="control-group form-group">
									<label class="form-label">رقم الهاتف</label>
									<input type="number" class="form-control required" >
								</div>
								<div class="control-group form-group mb-0">
									<label class="form-label">العنوان</label>
									<input type="text" class="form-control required" >
								</div>

								<br>
								<div class="col-sm-6 col-md-3 mg-t-10">
									<button id="newCustomer" class="align-self-end btn btn-info btn-block">إنشاء عميل جديد</button>
								</div>
							</form>
						
						</section>
						<h3>المنتجات</h3>
						<section>
							
							<div class="row row-sm mg-b-20">
								<div class="row row-sm">
								<div class="col-md-8 mg-b-20 mg-lg-b-0">
									<p class="mg-b-10">Multiple Select</p><select class="form-control select2" multiple="multiple">
										<option value="Firefox">
											Firefox
										</option>
										<option value="Chrome">
											Chrome
										</option>
										<option value="Safari">
											Safari
										</option>
										<option value="Opera">
											Opera
										</option>
										<option value="Internet Explorer">
											Internet Explorer
										</option>
									</select>
								</div>
							</div>
							</div>
						</section>
						<h3>الفاتورة</h3>
						<section>
							<div class="form-group">
								<label class="form-label" >CardHolder Name</label>
								<input type="text" class="form-control" id="name12" placeholder="First Name">
							</div>
							<div class="form-group">
								<label class="form-label">Card number</label>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-append">
										<button class="btn btn-info" type="button"><i class="fab fa-cc-visa"></i> &nbsp; <i class="fab fa-cc-amex"></i> &nbsp;
										<i class="fab fa-cc-mastercard"></i></button>
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8">
									<div class="form-group mb-sm-0">
										<label class="form-label">Expiration</label>
										<div class="input-group">
											<input type="number" class="form-control" placeholder="MM" name="expiremonth">
											<input type="number" class="form-control" placeholder="YY" name="expireyear">
										</div>
									</div>
								</div>
								<div class="col-sm-4 ">
									<div class="form-group mb-0">
										<label class="form-label">CVV <i class="fa fa-question-circle"></i></label>
										<input type="number" class="form-control" required="">
									</div>
								</div>
							</div>
						</section>
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
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.steps js -->
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Internal  Form-wizard js -->
<script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>

<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>


<script>
$(document).ready(function(){
	$('#newCustomer').click(function(){
		$('form').show();
		$('select').hide();
	});
	$('#selectCustomer').click(function(){
		$('form').hide();
		$('select').show();
	});
});

</script>


@endsection
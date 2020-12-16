@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">قائمة العملاء</h4>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
				<!-- row -->
				<div class="row">
					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<div class="col-sm-6 col-md-4 col-xl-3">
										<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
											data-toggle="modal" href="#modaldemo8">إضافة عميل</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								@include('alerts.success')
								@include('alerts.errors')
								<div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap" data-page-length="50">
										<thead>
											<tr>
												<th class="border-bottom-0">إسم العميل</th>
												<th class="border-bottom-0">البريد الإلكتروني</th>
												<th class="border-bottom-0">الهاتف</th>
												<th class="border-bottom-0">العنوان</th>
												<th class="border-bottom-0">الإجراء</th>
											</tr>
										</thead>
										<tbody>
											@foreach($customers as $customer)
											<tr>
											<td>{{$customer->name}}</td>
											<td>{{$customer->email}}</td>
											<td>{{$customer->mobile}}</td>
											<td>{{$customer->address}}</td>
												<td>
													<button class="btn btn-outline-success btn-sm"
													data-name="{{ $customer->name }}" data-customer_id="{{ $customer->id }}"
													data-email="{{ $customer->email }}"
													data-address="{{$customer->address}}"
													data-mobile="{{ $customer->mobile }}" data-toggle="modal"
													data-target="#edit_customer">تعديل</button>
	
												<button class="btn btn-outline-danger btn-sm " data-customer_id="{{ $customer->id }}"
													data-name="{{ $customer->name }}" data-toggle="modal"
													data-target="#delete_customer">حذف</button>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->

					        <!-- Basic modal -->

        {{-- ADD --}}
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">إضافة عميل جديد</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('customers.store') }}" autocomplete="off">
                            @csrf
							<div class="form-group">
								<label for="exampleFormControlTextarea1">إسم العميل</label>
								<input type="text" class="form-control" id="name" name="name" required>
							</div>

							<div class="form-group">
								<label for="exampleFormControlTextarea1">البريد الإلكتروني</label>
								<input type="text" class="form-control" id="email" name="email" required>
							</div>

							<div class="form-group">
								<label for="exampleFormControlTextarea1">الهاتف</label>
								<input type="text" class="form-control" id="mobile" name="mobile" required>
							</div>

							<div class="form-group">
								<label for="exampleFormControlTextarea1">العنوان</label>
								<input type="text" class="form-control" id="address" name="address" required>
							</div>

							<div class="modal-footer">
								<button class="btn ripple btn-primary" type="submit">حفظ</button>
								<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
		<!-- End Basic modal -->
		
		        {{-- EDIT --}}
				<div class="modal" id="edit_customer">
					<div class="modal-dialog" role="document">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title">تعديل بيانات العميل </h6><button aria-label="Close" class="close"
									data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
		
							<div class="modal-body">
								<form method="POST" action="customers/update" autocomplete="off">
									{{method_field('patch')}}
									@csrf
									<div class="form-group">
										<label for="exampleFormControlTextarea1">إسم العميل</label>
										<input type="hidden" class="form-control" name="customer_id" id="customer_id" value="">
										<input type="text" class="form-control" id="name" name="name" required>
									</div>

									<div class="form-group">
										<label for="exampleFormControlTextarea1">البريد الإلكتروني</label>
										<input type="text" class="form-control" id="email" name="email" required>
									</div>

									<div class="form-group">
										<label for="exampleFormControlTextarea1">الهاتف</label>
										<input type="text" class="form-control" id="mobile" name="mobile" required>
									</div>

									<div class="form-group">
										<label for="exampleFormControlTextarea1">العنوان</label>
										<input type="text" class="form-control" id="address" name="address" required>
									</div>

									<div class="modal-footer">
										<button class="btn ripple btn-primary" type="submit">تعديل</button>
										<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End Basic modal -->

				    {{-- DELET --}}
					<div class="modal" id="delete_customer">
						<div class="modal-dialog" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">حذف عميل</h6><button aria-label="Close" class="close"
										data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
			
								<div class="modal-body">
									<form method="POST" action="customers/destroy" autocomplete="off">
										{{method_field('delete')}}
										@csrf
										<div class="modal-body">
											<p>هل انت متاكد من حذف بيانات العميل التالي ؟</p><br>
											<input type="hidden" name="customer_id" id="customer_id" value="">
										<input class="form-control" name="name" id="name" type="text" readonly>
										</div>
										
										<div class="modal-footer">
											<button class="btn ripple btn-primary" type="submit">حذف</button>
											<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- End Basic modal -->
			</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

<script>
	$('#edit_customer').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var name = button.data('name')
		var email = button.data('email')
		var mobile = button.data('mobile')
		var address = button.data('address')
		var customer_id = button.data('customer_id')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #name').val(name);
		modal.find('.modal-body #email').val(email);
		modal.find('.modal-body #mobile').val(mobile);
		modal.find('.modal-body #address').val(address);
		modal.find('.modal-body #customer_id').val(customer_id);
	})
</script>

<script>
    $('#delete_customer').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var customer_id = button.data('customer_id')
        var name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #customer_id').val(customer_id);
        modal.find('.modal-body #name').val(name);
    })
</script>
@endsection
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
							<h4 class="content-title mb-0 my-auto">قائمة المنتجات</h4>
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
											data-toggle="modal" href="#modaldemo8">إضافة منتج</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap" data-page-length="50">
										<thead>
											<tr>
												<th class="border-bottom-0">إسم المنتج</th>
												<th class="border-bottom-0">إسم القسم</th>
												<th class="border-bottom-0">مدخل بواسطة</th>
												<th class="border-bottom-0">ملاحظات</th>
												<th class="border-bottom-0">الإجراء</th>
											</tr>
										</thead>
										<tbody>
											@foreach($products as $product)
											<tr>
											<td>{{$product->product_name}}</td>
											<td>{{$product->section->section_name}}</td>
											<td>{{$product->created_by}}</td>
											<td>{{$product->description}}</td>
												<td>
													<button class="btn btn-outline-success btn-sm"
													data-product_name="{{ $product->product_name }}" data-pro_id="{{ $product->id }}"
													data-section_name="{{ $product->section->section_name }}"
													data-description="{{ $product->description }}" data-toggle="modal"
													data-target="#edit_product">تعديل</button>
	
												<button class="btn btn-outline-danger btn-sm " data-pro_id="{{ $product->id }}"
													data-product_name="{{ $product->product_name }}" data-toggle="modal"
													data-target="#modaldemo9">حذف</button>
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
                        <h6 class="modal-title">إضافة منتج جديد</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('products.store') }}" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">إسم المنتج</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" required>
							</div>
							
							<label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
							<select name="section_id" id="section_name" class="form-control" required>
								<option value="" selected disabled> --حدد القسم--</option>
								@foreach ($sections as $section)
									<option value="{{ $section->id }}">{{ $section->section_name }}</option>
								@endforeach
							</select>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                <textarea class="form-control" id="description" name="description" cols="15"
                                    rows="5"></textarea>
                            </div>
							
							<div class="modal-footer">
								<button class="btn ripple btn-primary" type="submit">حفظ المنتج</button>
								<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
		<!-- End Basic modal -->
		
		        {{-- EDIT --}}
				<div class="modal" id="edit_product">
					<div class="modal-dialog" role="document">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title">تعديل منتج </h6><button aria-label="Close" class="close"
									data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
		
							<div class="modal-body">
								<form method="POST" action="products/update" autocomplete="off">
									{{method_field('patch')}}
									@csrf
									<div class="form-group">
										
										<label for="exampleFormControlTextarea1">إسم المنتج</label>
										<input type="hidden" class="form-control" name="id" id="id" value="">
										<input type="text" class="form-control" id="product_name" name="product_name" required>
									</div>

									<label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
							<select name="section_name" id="section_name" class="custom-select my-1 mr-sm-2" required>
								<option value="" selected disabled> --حدد القسم--</option>
								@foreach ($sections as $section)
								<option>{{ $section->section_name }}</option>
							@endforeach
							</select>
		
									<div class="form-group">
										<label for="exampleFormControlTextarea1">ملاحظات</label>
										<textarea class="form-control" id="description" name="description" cols="15"
											rows="5"></textarea>
									</div>
									
									<div class="modal-footer">
										<button class="btn ripple btn-primary" type="submit">حفظ القسم</button>
										<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
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
	$('#edit_product').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var product_name = button.data('product_name')
		var description = button.data('description')
		var section_name = button.data('section_name')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #product_name').val(product_name);
		modal.find('.modal-body #description').val(description);
		modal.find('.modal-body #section_name').val(section_name);
	})
</script>
@endsection
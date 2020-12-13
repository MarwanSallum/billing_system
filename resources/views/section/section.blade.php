@extends('layouts.master')
@section('title')
    الأقسام
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">قائمة الأقسام</h4>
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
                                data-toggle="modal" href="#modaldemo8">إضافة قسم</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    @include('alerts.errors')
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">إسم القسم</th>
                                    <th class="border-bottom-0">الوصف</th>
                                    <th class="border-bottom-0">المستخدم المسئول</th>
                                    <th class="border-bottom-0">الإجراء</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                <tr>
                                <td>{{$section->section_name}}</td>
                                <td>{{$section->description}}</td>
                                <td>{{$section->created_by}}</td>
                                <td>
                                    <div class="btn-icon-list">
                                        <a  href="#modaldemo2" class="btn btn-primary btn-icon"data-effect="effect-scale"
                                    data-id="{{$section->id}}" data-section_name="{{$section->section_name}}" data-description="{{$section->description}}"
                                         data-toggle="modal"><i class="typcn typcn-edit" title="تعديل"></i></a>

                                        <a href="#modaldemo6" class="btn btn-danger btn-icon" data-effect="effect-scale"
                                        data-id="{{$section->id}}" data-section_name="{{$section->section_name}}"
                                        data-toggle="modal"><i class="typcn typcn-document-delete" title="حذف"></i></a>
                                
                                    </div>
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
                        <h6 class="modal-title">إضافة قسم جديد</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('sections.store') }}" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">إسم القسم</label>
                                <input type="text" class="form-control" id="inputName" name="section_name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                <textarea class="form-control" id="inputName" name="description" cols="15"
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

        <!-- Basic modal -->

        {{-- EDIT --}}
        <div class="modal" id="modaldemo2">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">تعديل قسم جديد</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('sections.update', $section->id) }}" autocomplete="off">
                            {{method_field('patch')}}
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="exampleFormControlTextarea1">إسم القسم</label>
                                <input type="text" class="form-control" id="section_name" name="section_name" required>
                            </div>

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

        
        <!-- Basic modal -->

        {{-- DELET --}}
        <div class="modal" id="modaldemo6">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف قسم</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('sections.destroy', $section->id) }}" autocomplete="off">
                            {{method_field('delete')}}
                            @csrf
                            <div class="modal-body">
                                <p>هل انت متاكد من حذف القسم التالي ؟</p><br>
                                <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="section_name" id="section_name" type="text" readonly>
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
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <script>
        $('#modaldemo2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section_name = button.data('section_name')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #description').val(description);
        })
    </script>

<script>
    $('#modaldemo6').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
    })
</script>
@endsection

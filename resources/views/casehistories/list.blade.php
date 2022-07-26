@extends('users.admin.layouts.login')
@section('styles')
    <link href="{{ url('adminpanel/assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor col-12" id="kt_content">

        <!-- begin:: Content Head -->
        <div class="kt-subheader  kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">

                    <h3 class="kt-subheader__title">عرض بيانات العناية بالمريض</h3>

                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>

                    <div class="input-icon col-md-2">
                        <input type="text" class="form-control" placeholder="بحث باستخدام الاسم"
                           name='name_ar' @if( request()->name_ar) value={{request()->name_ar}} @endif/>
                          <span>
                              <i class="flaticon2-search-1 text-muted"></i>
                          </span>
                        </div>
                </div>
            </div>
        </div>
        <!-- end:: Content Head -->

        <!-- begin:: Container -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid col-12">
            <!-- begin:: Alert -->
            @if (session()->has('success'))
                <div class="alert alert-light alert-elevate" role="alert">
                    <div class="alert-icon"><i class="flaticon2-check-mark kt-font-success"></i></div>
                    <div class="alert-text">
                        {{ session()->get('success') }}
                    </div>
                </div>
            @endif
            <!-- end:: Alert -->

            <!-- begin:: Portlet -->
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                <a href="{{ route('casehistories.create') }}"
                                    class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                    إضافة بيانات العناية بمريض جديد
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped table-bordered table-primary text-center table-checkable  kt_table_1"
                        id="kt_table_1">
                        <thead class="bg-primary">
                            <tr>
                                <th>رقم المريض</th>
                                <th>التاريخ</th>
                                <th>التشخيص الحالة </th>
                                <th>مرض قلبي</th>
                                <th>ضغط الدم</th>
                                <th>مريض بالسكر</th>
                                <th>عملية جراحية </th>
                                <th>حادث</th>
                                <th>تأمين صحي</th>
                                <th>الحالة المريض</th>
                                <th colspan="3">الإجراء</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($casehistories as $casehistory)
                                <tr>
                                    <td>{{ $casehistory->patient_id}}  </td>
                                    <td>{{ $casehistory->date }}</td>
                                    <td>{{ $casehistory->title }}</td>
                                    <td>{{ $casehistory->heart_disease }}</td>
                                    <td>{{ $casehistory->blood_pressure }}</td>
                                    <td>{{ $casehistory->diabetic }}</td>
                                    <td>{{ $casehistory->surgery }}</td>
                                    <td>{{ $casehistory->accident }}</td>
                                    <td>{{ $casehistory->health_insurance }}</td>
                                    <td>{{ $casehistory->status }}</td>
                                    <td>
                                        <span class="dropdown">
                                            <a href="#" class="btn btn-sm btn-warning btn-icon btn-icon-md"
                                                data-toggle="dropdown" aria-expanded="true">
                                                الإجراء
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"
                                                    href="{{ route('casehistories.edit', $casehistory->id) }}">
                                                    تعديل <i
                                                        class="fa fa-edit" aria-hidden="true"></i></button>
                                                </a>
                                                <a href="{{ route('casehistories.destroy', $casehistory->id) }}"
                                                    class="dropdown-item"> حذف <i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>
                                                </a>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <!--end: Datatable -->
                </div>
            </div>
            <!-- end:: Portlet -->
        </div>
        <!-- end:: Container -->
    </div>
    <!-- begin:: Content -->
@endsection

@section('scripts')
    <script src="{{ url('adminpanel') }}/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript">
    </script>
    <script src="{{ url('adminpanel') }}/assets/js/demo3/pages/crud/datatables/advanced/multiple-controls.js"
        type="text/javascript"></script>
@endsection

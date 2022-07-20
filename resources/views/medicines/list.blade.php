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

                    <h3 class="kt-subheader__title">قائمة الأدوية</h3>

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
                                <a href="{{ route('medicines.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                    إضافة دواء
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-primary text-center table-checkable  kt_table_1"
                        id="kt_table_1">
                        <thead class="bg-primary">
                            <tr>
                                <th>الإسم</th>
                                <th>التعليمات</th>
                                <th>النوع</th>
                                <th>سعر الشراء</th>
                                <th>سعر البيع</th>
                                <th>الكمية</th>
                                <th>الشركة</th>
                                <th>تاريخ إنتهاء الصلاحية</th>
                                <th colspan="2">الإجراء</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($medicines as $medicine)
                                <tr>
                                    <td>{{ $medicine->name }}</td>
                                    <td>{{ $medicine->instruction }}</td>
                                    <td>{{ $medicine->category_id }}</td>
                                    <td>{{ $medicine->purchase_price }}</td>
                                    <td>{{ $medicine->sale_price }}</td>
                                    <td>{{ $medicine->quantity }}</td>
                                    <td>{{ $medicine->company }}</td>
                                    <td>{{ $medicine->expire_date }}</td>
                                    <td>
                                        <form action="{{ route('medicines.edit', $medicine->id) }}" method="post">
                                            @method('get')
                                            @csrf
                                            <button type="submit" class="btn btn-md btn-warning"> تعديل <i
                                                    class="fa fa-edit" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('medicines.destroy', $medicine->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-md"> حذف <i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
                                        </form>
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
    <script src="{{ url('adminpanel/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('adminpanel/assets/js/demo3/pages/crud/datatables/advanced/multiple-controls.js') }}"
        type="text/javascript"></script>
@endsection

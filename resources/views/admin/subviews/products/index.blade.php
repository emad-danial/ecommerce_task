@extends('admin.main_layout')
@section('header_title',__('admin.products'))
@section('content')
    @include('admin.subviews.products.addEdit')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">{{__('admin.products')}}</h3>
                        <div>
                            <span class="btn btn-primary mt-5" onclick="refreshTable();"> <i class="fa fa-cogs"></i> Refresh Table</span>
                            <span class="btn btn-success mt-5 mr-1 addNewProduct"> <i class="fa fa-plus-circle"></i> {{__('admin.create_new_product')}} </span>
                            <span class="btn btn-info mt-5 mr-1 active_all"> <i class="fa fa-check"></i> {{__('admin.active_all')}} </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-striped">
                            <thead>
                            <tr>
                                <td style="width:5%!important">
                                    <input type="checkbox" id="check_all">
                                </td>
                                <td>{{__('admin.name_ar')}}</td>
                                <td>{{__('admin.name_en')}}</td>
                                <td>{{__('admin.price')}}</td>
                                <td>{{__('admin.main_category')}}</td>
                                <td>{{__('admin.sub_category')}}</td>
                                <td>{{__('admin.image')}}</td>
                                <td>{{__('admin.status')}}</td>
                                <td>{{__('admin.update')}}</td>
                                <td>{{__('admin.delete')}}</td>
                                <td>{{__('admin.created_at')}}</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.subviews.products.scripts')
@endsection

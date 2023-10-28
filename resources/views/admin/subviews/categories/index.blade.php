@extends('admin.main_layout')
@section('header_title',__('admin.categories'))
@section('content')
    @include('admin.subviews.categories.addEditCategory')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">{{__('admin.categories')}}</h3>
                        <div>
                            <span class="btn btn-primary mt-5" onclick="refreshTable();"> <i class="fa fa-cogs"></i> Refresh Table</span>
                            <span class="btn btn-success mt-5 mr-1 addNewCategory"> <i class="fa fa-plus-circle"></i> {{__('admin.create_new_category')}} </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-striped">
                            <thead>
                            <tr>
                                <td>{{__('admin.name_ar')}}</td>
                                <td>{{__('admin.name_en')}}</td>
                                <td>{{__('admin.category_type')}}</td>
                                <td>{{__('admin.parent_category')}}</td>
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
    @include('admin.subviews.categories.scripts')
@endsection

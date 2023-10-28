@extends('admin.main_layout')
@section('header_title',__('admin.admins'))
@section('content')
    @include('admin.subviews.admins.addEditAdmin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">{{__('admin.admins')}}</h3>
                        <div>
                            <span class="btn btn-primary mt-5" onclick="refreshTable();"> <i class="fa fa-cogs"></i> Refresh Table</span>
                            <span class="btn btn-success mt-5 mr-1 addNewUser"> <i class="fa fa-user-plus"></i> {{__('admin.create_new_admin')}} </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-striped">
                            <thead>
                            <tr>
                                <td>{{__('admin.name')}}</td>
                                <td>{{__('admin.phone')}}</td>
                                <td>{{__('admin.email')}}</td>
                                <td>{{__('admin.role')}}</td>
                                <td>{{__('admin.status')}}</td>
                                <td>{{__('admin.update')}}</td>
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
    @include('admin.subviews.admins.scripts')
@endsection

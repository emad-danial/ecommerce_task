@extends('admin.main_layout')
@section('header_title',__('admin.users'))
@section('content')
    @include('admin.subviews.users.components.addEditUser')
    @include('admin.subviews.users.components.userAddressModal')
    @include('admin.subviews.users.components.addEditUserAddress')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">{{__('admin.users')}}</h3>
                        <div>
                            <span class="btn btn-primary mt-5" onclick="refreshTable();"> <i class="fa fa-cogs"></i> Refresh Table</span>
                            <span class="btn btn-success mt-5 mr-1 addNewUser"> <i class="fa fa-user-plus"></i> {{__('admin.create_new_user')}} </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-striped">
                            <thead>
                            <tr>
                                <td>{{__('admin.name')}}</td>
                                <td>{{__('admin.phone')}}</td>
                                <td>{{__('admin.email')}}</td>
                                <td>{{__('admin.avatar')}}</td>
{{--                                <td>{{__('admin.user_addresses')}}</td>--}}
                                <td>{{__('admin.status')}}</td>
{{--                                <td>{{__('admin.add_new_address')}}</td>--}}
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
    @include('admin.subviews.users.indexScripts')
    @include('admin.subviews.users.userAddressScripts')
@endsection

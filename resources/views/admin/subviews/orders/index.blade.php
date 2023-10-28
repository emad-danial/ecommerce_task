@extends('admin.main_layout')
@section('header_title',__('admin.orders'))
@section('content')
    @include('admin.subviews.orders.viewOrder')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">{{__('admin.orders')}}</h3>
                        <div>
                            <span class="btn btn-primary mt-5" onclick="refreshTable();"> <i class="fa fa-cogs"></i> Refresh Table</span>
                            <span class="btn btn-success mt-5 mr-1"> <i class="fa fa-plus-circle"></i> <a class="text-white" href="{{url('/adminPanel/orders/create')}}">{{__('admin.create_new_order')}}</a> </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-striped">
                            <thead>
                            <tr>
                                <td>{{__('website.id')}}</td>
                                <td>{{__('website.total_price')}}</td>
                                <td>{{__('website.Title')}}</td>
                                <td>{{__('admin.status')}}</td>
                                <td>{{__('admin.view')}}</td>
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
    @include('admin.subviews.orders.scripts')
@endsection

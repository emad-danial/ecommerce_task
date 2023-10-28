@if(count($userAddress) == 0)
    <div class="alert alert-danger">لا يوجد عنواين للمستخدم</div>
@else
    <table class="table table-striped table-responsive">
        <thead>
        <tr>
            <th>{{__('admin.area')}}</th>
            <th>{{__('admin.city')}}</th>
            <th>{{__('admin.district')}}</th>
            <th>{{__('admin.street')}}</th>
            <th>{{__('admin.building_no')}}</th>
            <th>{{__('admin.is_default')}}</th>
            <th>{{__('admin.update')}}</th>
            <th>{{__('admin.delete')}}</th>
        </tr>
        </thead>
        <tbody id="user_address_table_body">
            @foreach($userAddress as $item)
                <tr>
                    <td>{{$item->area_ar}}</td>
                    <td>{{$item->city_ar}}</td>
                    <td>{{$item->district_ar}}</td>
                    <td>{{$item->street}}</td>
                    <td>{{$item->building_no}}</td>
                    <td> @if($item->is_default) نعم @else لا @endif</td>
                    <td> <span class="btn btn-primary btn-sm editAddress" data-id="{{$item->id}}">تعديل</span> </td>
                    <td> <span class="btn btn-danger btn-sm deleteAddress" data-id="{{$item->id}}">حذف</span> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

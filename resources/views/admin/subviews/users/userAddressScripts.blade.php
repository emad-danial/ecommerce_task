{{--<script>--}}

{{--    function getAreaCities(areaId, callback = null) {--}}
{{--        let path     = "{{route('admin.cities.getAreaCities',['area_id'])}}";--}}
{{--        let formData = new FormData();--}}
{{--        formData.append('areaId', areaId);--}}
{{--        ajaxRequest(path, formData, function (response) {--}}
{{--            $('#city_id').html('<option>...</option>');--}}
{{--            response.Data.forEach(function (item) {--}}
{{--                $('#city_id').append(`<option value='${item.id}'>${item.name_ar}</option`)--}}
{{--            });--}}

{{--            if (callback != null) callback(response);--}}

{{--        });--}}
{{--    }--}}

{{--    function getDistrictCity(cityId, callback = null) {--}}
{{--        let path     = "{{route('admin.districts.getCityDistricts')}}";--}}
{{--        let formData = new FormData();--}}
{{--        formData.append('cityId', cityId);--}}
{{--        ajaxRequest(path, formData, function (response) {--}}
{{--            $('#district_id').html('<option>...</option>');--}}
{{--            response.Data.forEach(function (item) {--}}
{{--                $('#district_id').append(`<option value='${item.id}'>${item.name_ar}</option`)--}}
{{--            });--}}

{{--            if (callback != null) callback(response);--}}

{{--        });--}}
{{--    }--}}

{{--    $('#area_id').on('change', function () {--}}
{{--        getAreaCities($(this).val());--}}
{{--    });--}}

{{--    $('#city_id').on('change', function () {--}}
{{--        getDistrictCity($(this).val());--}}
{{--    });--}}

{{--    $('body').on('click', '.userAddress', function () {--}}
{{--        let userId   = $(this).data('id');--}}
{{--        let path     = "{{route('admin.user-address.getUserAddressInfo')}}";--}}
{{--        let formData = new FormData();--}}
{{--        formData.append('userId', userId);--}}
{{--        ajaxRequest(path, formData, function (response) {--}}
{{--            $('#user_addresses_modal_body').html(response);--}}
{{--            $('#userAddressModal').modal('show');--}}
{{--        });--}}
{{--    });--}}

{{--    $('body').on('click', '.addUserAddress', function () {--}}
{{--        $('.userAddressForm')[0].reset();--}}
{{--        let userId = $(this).data('id');--}}
{{--        $('#user_address_id').val(userId);--}}
{{--        $('#user_address_action_type').val('create_new_user_addresses');--}}
{{--        $('#addEditUserAddressModalTitle').text('اضافة عنوان جديد');--}}
{{--        $('#addEditUserAddress').modal('show');--}}
{{--    });--}}

{{--    $('#submitUserAddress').on('click', function () {--}}

{{--        let path     = "{{route('admin.user-address.createUserAddress')}}";--}}
{{--        let formData = new FormData($('.userAddressForm')[0]);--}}

{{--        if ($('#user_address_action_type').val() == 'edit_user_address') {--}}
{{--            path = "{{route('admin.user-address.updateUserAddress')}}";--}}
{{--        }--}}
{{--        ajaxRequest(path, formData, function (response) {--}}
{{--            swal("done!", response.Message, "success");--}}
{{--            $('.userAddressForm')[0].reset();--}}
{{--            $('#addEditUserAddress').modal('hide');--}}
{{--        });--}}
{{--    });--}}

{{--    $('body').on('click', '.deleteAddress', function () {--}}
{{--        let userAddressId = $(this).data('id');--}}
{{--        let path          = "{{route('admin.user-address.deleteUserAddress')}}";--}}
{{--        let formData      = new FormData();--}}
{{--        formData.append('addressId', userAddressId);--}}

{{--        swal({--}}
{{--            title: "حذف العنوان",--}}
{{--            text: "هل انت متاكد من اتمامك لعملية لحذف العنوان",--}}
{{--            icon: "warning",--}}
{{--            buttons: true,--}}
{{--            dangerMode: true,--}}
{{--        }).then((willDelete) => {--}}
{{--            if (willDelete) {--}}
{{--                ajaxRequest(path, formData, function (response) {--}}
{{--                    if (response.Status == 410) {--}}
{{--                        swal("warning!", response.Message, "warning");--}}
{{--                        return;--}}
{{--                    }--}}
{{--                    $('#userAddressModal').modal('hide');--}}
{{--                    swal("done!", response.Message, "success");--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}

{{--    });--}}

{{--    $('body').on('click', '.editAddress', function () {--}}
{{--        let userAddressId = $(this).data('id');--}}
{{--        let path          = "{{route('admin.user-address.getUserAddressDetails')}}";--}}
{{--        let formData      = new FormData();--}}
{{--        formData.append('userAddressId', userAddressId);--}}
{{--        ajaxRequest(path, formData, function (response) {--}}
{{--            $('#userAddressModal').modal('hide');--}}
{{--            $('#user_address_action_type').val('edit_user_address');--}}
{{--            $('#address_id').val(userAddressId);--}}
{{--            $('#addEditUserAddressModalTitle').text('تعديل بيانات العنوان');--}}
{{--            $('#addEditUserAddress').modal('show');--}}
{{--            $('#area_id').val(response.Data.selected_area_id);--}}
{{--            getAreaCities(response.Data.selected_area_id, function () {--}}
{{--                $('#city_id').val(response.Data.selected_city_id);--}}
{{--                getDistrictCity(response.Data.selected_city_id, function () {--}}
{{--                    $('#district_id').val(response.Data.selected_district_id)--}}
{{--                })--}}
{{--            });--}}
{{--            $('#street').val(response.Data.user_address_data.street);--}}
{{--            $('#building_no').val(response.Data.user_address_data.building_no);--}}
{{--            $('#is_default').val(response.Data.user_address_data.is_default);--}}
{{--        });--}}
{{--    });--}}


{{--</script>--}}




<div class="modal fade" id="addEditUserAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEditUserAddressModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="userAddressForm" action="#">
                    <input type="hidden" name="user_address_action_type" id="user_address_action_type">
                    <input type="hidden" name="address_id" id="address_id">
                    <input type="hidden" name="user_address_id" id="user_address_id">


                    @component('admin.components.inputs.form_inputs.select')
                        @slot('select_grid','col-md-12')
                        @slot('select_name','area_id')
                        @slot('select_label',__('admin.area'))
                        @slot('select_icon','fa fa-notes-medical')
                        @slot('options')
                             <option>...</option>
{{--                            @foreach(\App\Models\Location\Area::all() as $item)--}}
{{--                                <option value="{{$item->id}}">{{$item->name_ar}}</option>--}}
{{--                            @endforeach--}}
                        @endslot
                    @endcomponent

                    @component('admin.components.inputs.form_inputs.select')
                        @slot('select_grid','col-md-12')
                        @slot('select_name','city_id')
                        @slot('select_label',__('admin.city'))
                        @slot('select_icon','fa fa-notes-medical')
                        @slot('options')

                        @endslot
                    @endcomponent


                    @component('admin.components.inputs.form_inputs.select')
                        @slot('select_grid','col-md-12')
                        @slot('select_name','district_id')
                        @slot('select_label',__('admin.district'))
                        @slot('select_icon','fa fa-notes-medical')
                        @slot('options')

                        @endslot
                    @endcomponent

                    @component('admin.components.inputs.form_inputs.input')
                        @slot('input_grid','col-md-12')
                        @slot('input_name','street')
                        @slot('input_label',__('admin.street'))
                        @slot('input_red_star','yes')
                        @slot('input_icon','fa fa-notes-medical')
                    @endcomponent

                    @component('admin.components.inputs.form_inputs.input')
                        @slot('input_grid','col-md-12')
                        @slot('input_name','building_no')
                        @slot('input_label',__('admin.building_no'))
                        @slot('input_red_star','yes')
                        @slot('input_icon','fa fa-notes-medical')
                    @endcomponent

                    @component('admin.components.inputs.form_inputs.select')
                        @slot('select_grid','col-md-12')
                        @slot('select_name','is_default')
                        @slot('select_label',__('admin.is_default'))
                        @slot('select_icon','fa fa-notes-medical')
                        @slot('options')
                            <option value="1">نعم</option>
                            <option value="0">لا</option>
                        @endslot
                    @endcomponent


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('admin.close')}}</button>
                <button type="button" class="btn btn-primary" id="submitUserAddress">{{__('admin.submit')}}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addEditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="#">
                    <input type="hidden" name="action_type" id="action_type">
                    <input type="hidden" name="user_id" id="user_id">

                    @component('admin.components.inputs.form_inputs.input')
                        @slot('input_grid','col-md-12')
                        @slot('input_name','name')
                        @slot('input_label',__('admin.user_name'))
                        @slot('input_red_star','yes')
                        @slot('input_icon','fa fa-notes-medical')
                    @endcomponent

                    @component('admin.components.inputs.form_inputs.input')
                        @slot('input_grid','col-md-12')
                        @slot('input_name','email')
                        @slot('input_label',__('admin.email'))
                        @slot('input_red_star','yes')
                        @slot('input_type','email')
                        @slot('input_icon','fa fa-mail-bulk')
                    @endcomponent

                    @component('admin.components.inputs.form_inputs.input')
                        @slot('input_grid','col-md-12')
                        @slot('input_name','phone')
                        @slot('input_label',__('admin.phone'))
                        @slot('input_red_star','yes')
                        @slot('input_icon','fa fa-phone')
                    @endcomponent

                    @component('admin.components.inputs.form_inputs.input')
                        @slot('input_grid','col-md-12')
                        @slot('input_name','password')
                        @slot('input_label',__('admin.password'))
                        @slot('input_red_star','yes')
                        @slot('input_icon','fa fa-lock')
                    @endcomponent


                    @component('admin.components.inputs.form_inputs.select')
                        @slot('select_grid','col-md-12')
                        @slot('select_name','role_id')
                        @slot('select_label',__('admin.roles'))
                        @slot('select_red_star','yes')
                        @slot('select_icon','fa fa-cogs')
                        @slot('options')
                            @foreach(\App\Models\RolesPermission\Role::all() as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        @endslot
                    @endcomponent

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('admin.close')}}</button>
                <button type="button" class="btn btn-primary" id="submit">{{__('admin.submit')}}</button>
            </div>
        </div>
    </div>
</div>

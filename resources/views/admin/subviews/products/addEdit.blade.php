<div class="modal fade" id="addEditProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" name="product_id" id="product_id">

                    @component('admin.components.inputs.form_inputs.input')
                        @slot('input_grid','col-md-12')
                        @slot('input_name','name_ar')
                        @slot('input_label',__('admin.name_ar'))
                        @slot('input_red_star','yes')
                        @slot('input_icon','fa fa-notes-medical')
                    @endcomponent

                    @component('admin.components.inputs.form_inputs.input')
                        @slot('input_grid','col-md-12')
                        @slot('input_name','name_en')
                        @slot('input_label',__('admin.name_en'))
                        @slot('input_red_star','yes')
                        @slot('input_icon','fa fa-notes-medical')
                    @endcomponent

                    @component('admin.components.inputs.form_inputs.input')
                        @slot('input_grid','col-md-12')
                        @slot('input_div_class','image_div')
                        @slot('input_name','image')
                        @slot('input_label',__('admin.image'))
                        @slot('input_icon','fa fa-image')
                        @slot('input_type','file')
                    @endcomponent
                    @component('admin.components.inputs.form_inputs.input')
                        @slot('input_grid','col-md-12')
                        @slot('input_div_class','price')
                        @slot('input_name','price')
                        @slot('input_label',__('admin.price'))
                        @slot('input_icon','fa fa-mony')
                        @slot('input_type','number')
                    @endcomponent

                    @component('admin.components.inputs.form_inputs.select')
                        @slot('select_grid','col-md-12')
                        @slot('select_div_class','main_category_div')
                        @slot('select_name','main_category')
                        @slot('select_label',__('admin.main_categories'))
                        @slot('select_icon','fa fa-cogs')
                        @slot('options')
                            @foreach(\App\Models\Product\Category::whereNull('category_id')->get() as $category)
                                <option value="{{$category->id}}">{{$category->name_ar}}</option>
                            @endforeach
                        @endslot
                        @slot('selected_option','first_element')
                    @endcomponent
                    @component('admin.components.inputs.form_inputs.select')
                        @slot('select_grid','col-md-12')
                        @slot('select_div_class','sub_category_div')
                        @slot('select_name','sub_category')
                        @slot('select_label',__('admin.sub_categories'))
                        @slot('select_icon','fa fa-cogs')
                        @slot('options')
                        @endslot
                        @slot('selected_option','first_element')
                    @endcomponent



                    <label>الوصف عربي</label>
                    <textarea name="description_ar" id="description_ar"></textarea>

 <label>الوصف انجليزي</label>
                    <textarea name="description_en" id="description_en"></textarea>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('admin.close')}}</button>
                <button type="button" class="btn btn-primary" id="submit">{{__('admin.submit')}}</button>
            </div>
        </div>
    </div>
</div>

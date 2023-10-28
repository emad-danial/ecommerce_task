@extends('admin.main_layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-header"><h3 class="card-title"> Base Controls </h3></div>
                    <div class="card-body">

                        <div class="row">

                            @include('admin.components.inputs.form_inputs.input',[
                                'input_name'=>"t",
                                'input_label'=>'user name',
                                'input_icon'=>'fas fa-user'
                            ])

                            @include('admin.components.inputs.form_inputs.text_area',[
                                'text_name'=>'test',
                                'text_red_star'=>'yes'
                            ])

                            @include('admin.components.inputs.form_inputs.select',[
                                    'select_name'=>"t",
                                    'select_label'=>'user name',
                                    'select_icon'=>'fas fa-user'
                            ])

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

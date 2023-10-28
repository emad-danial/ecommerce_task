@extends('admin.main_layout')
@section('header_title',__('admin.settings'))
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{trans('admin.settings')}}</h3>
                        </div>
                        <div class="box-body">
                            <div class="box">
                                <div class="message-flash">

                                </div>
                                @include('web.componants.messages')

                                <div class="box-body col-10 setting-box">
                                    <form action="{{route('admin.settings.update')}}" method="POST"
                                          enctype="multipart/form-data">
                                        {{ csrf_field()}}
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="phone">{{trans('admin.phone')}}</label>
                                                    <input type="text" class="form-control" name="phone"
                                                           placeholder="{{trans('admin.phone')}}"
                                                           @if(isset($settings->phone)) value="{{$settings->phone}}" @endif>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="blog_email">{{trans('admin.email')}}</label>
                                                    <input type="text" class="form-control" name="email"
                                                           placeholder="{{trans('admin.email')}}"
                                                           @if(isset($settings->email))  value="{{$settings->email}}" @endif>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">نظرة عامة (عربي)</label>
                                                    <textarea name="overview_ar" id="overview_ar" rows="3">@if(isset($settings->overview_ar))
                                                            {{$settings->overview_ar}}
                                                        @endif</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">نظرة عامة (انجليزي)</label>
                                                    <textarea name="overview_en" id="overview_en" class="form-control"
                                                              rows="3"> @if(isset($settings->overview_en))
                                                            {{$settings->overview_en}}
                                                        @endif</textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">مهمتنا (عربي)</label>
                                                    <textarea name="mission_ar" class="form-control"
                                                              rows="3"> @if(isset($settings->mission_ar))
                                                            {{$settings->mission_ar}}
                                                        @endif</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="mission_en">مهمتنا (انجليزي)</label>
                                                    <textarea name="mission_en" class="form-control"
                                                              rows="3"> @if(isset($settings->mission_en))
                                                            {{$settings->mission_en}}
                                                        @endif</textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">رؤيتنا (عربي)</label>
                                                    <textarea name="vision_ar" class="form-control"
                                                              rows="3"> @if(isset($settings->vision_ar))
                                                            {{$settings->vision_ar}}
                                                        @endif</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">رؤيتنا (انجليزي)</label>
                                                    <textarea name="vision_en" class="form-control"
                                                              rows="3"> @if(isset($settings->vision_en))
                                                            {{$settings->vision_en}}
                                                        @endif</textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">قيمتنا (عربي)</label>
                                                    <textarea name="values_ar" class="form-control"
                                                              rows="3"> @if(isset($settings->values_ar))
                                                            {{$settings->values_ar}}
                                                        @endif</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">قيمتنا (انجليزي)</label>
                                                    <textarea name="values_en" class="form-control"
                                                              rows="3"> @if(isset($settings->values_en))
                                                            {{$settings->values_en}}
                                                        @endif</textarea>
                                                </div>
                                            </div>






                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">وصف الموقع (عربي)</label>
                                                    <textarea name="text" class="form-control"
                                                              placeholder="وصف الموقع (عربي)"
                                                              rows="3">@if(isset($settings->text)){{$settings->text}}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">وصف الموقع (انجليزي)</label>
                                                    <textarea name="text_en" class="form-control"
                                                              placeholder="وصف الموقع (انجليزي)"
                                                              rows="3">@if(isset($settings->text_en)){{$settings->text_en}}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="whats_app">واتس اب</label>
                                                    <input type="text" class="form-control" name="whats_app"
                                                           placeholder="واتس اب"
                                                           @if(isset($settings->whats_app)) value="{{$settings->whats_app}}" @endif>
                                                </div>
                                            </div>



                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="twitter">تويتر</label>
                                                    <input type="text" class="form-control" name="twitter"
                                                           placeholder="تويتر"
                                                           @if(isset($settings->twitter)) value="{{$settings->twitter}}" @endif>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="facebook">فيس بوك</label>
                                                    <input type="text" class="form-control" name="facebook"
                                                           placeholder="فيس بوك"
                                                           @if(isset($settings->facebook)) value="{{$settings->facebook}}" @endif>
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="image">صورة للموقع</label>
                                                    <input type="file" class="form-control-file" name="image">
                                                    @if(isset($settings->image))
                                                        <img src="{{asset($settings->image)}}" alt="000000"
                                                             class="img-thumbnail"
                                                             width="50px" height="50px">
                                                    @endif
                                                </div>
                                            </div>

                                        </div>


                                        <button type="submit"
                                                class="btn btn-primary btn-lg">حفظ</button>
                                    </form>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
@push('js')

    <script>
        $(document).ready(function () {
            $('.message-flash .alert').not('.alert-important').delay(2000).fadeOut(2000);
        })
    </script>
@endpush

@section('scripts')
    @include('admin.subviews.settings.scripts')
@endsection

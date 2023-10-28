@component('admin.components.footer.DataTablesComponents')
    <script type="text/javascript" src="{{url('/')}}/Admin/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description_ar' ) )
            .then( newEditorAr => {
                editorAr = newEditorAr;
            } )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#description_en' ) )
            .then( newEditorEn => {
                editorEn = newEditorEn;
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        var idsArr = [];
        var oTable = new O_Datatable('#table');
        oTable.addColumns([
            {"data": "select", name: "select", "orderable": false},
            {"data": "name_ar", name: "products.name_ar"},
            {"data": "name_en", name: "products.name_en"},
            {"data": "price", name: "products.price"},
            {"data": "main_category", name: "main_category"},
            {"data": "sub_category", name: "sub_category"},
            {"data": "image", name: "products.image"},
            {"data": "is_active", name: "products.is_active"},
            {"data": "update", name: "update"},
            {"data": "delete", name: "delete"},
            {"data": "created_at", name: "products.created_at"},
        ]);
        oTable.orderBy([1, 'desc']);
        oTable.addAjaxUrlWithData('{{route('admin.products.index')}}', function (send) {

        });
        oTable.build();


        $('#check_all').on('click', function(e) {
            if($(this).is(':checked',true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked',false);  }
        });
        $('.active_all').on('click', function(e) {

                idsArr = [];
                $(".checkbox:checked").each(function() {
                    idsArr.push($(this).attr('value'));
                });
                if(idsArr.length <=0)  {
                    alert("Please select atleast one record to pointer.");
                }  else {
                    swal({
                        title: "تفعيل & تعطيل المنتجات",
                        text: "هل انت متاكد من اتمامك لعملية التفعيل او التعطيل ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            var strIds = idsArr.join(",");
                            let formData = new FormData();
                            console.log(strIds);
                            formData.append('ids', strIds);
                            let path     = "{{route('admin.products.active_all')}}";
                            ajaxRequest(path, formData, function (response) {
                                if (response.code == 200) {
                                    swal("done!", response.Message, "success");
                                    $("#check_all").prop('checked',false);
                                    refreshTable();
                                }
                            });
                        }
                    });
                }
        });




        $('body').on('change', '#main_category', function () {

         var main_category_id =  $( "#main_category option:selected" ).val();
            $("#sub_category").html('');
            let formData = new FormData();
            formData.append('main_category_id', main_category_id);
            let path     = "{{route('admin.products.getAllSubCategories')}}";
            ajaxRequest(path, formData, function (response) {
                if (response.code == 200 && response.Data) {
                    if (response.Data.length > 0) {
                        let option='<option value="">إختر قسم</option>';
                        $('#sub_category').append(option);
                        for (let iii = 0; iii < response.Data.length; iii++) {
                            let proObjff = response.Data[iii];
                            let option='<option value="'+proObjff['id']+'">'+proObjff['name_ar']+'</option>';
                            $('#sub_category').append(option);
                        }
                    }
                }
            });

        });

        $('.addNewProduct').on('click', function () {
            resetFormToDefault();
            $('#exampleModalLabel').text('{{__('admin.create_new_product')}}');
            $('#action_type').val('addNewProduct');
            $('#addEditProduct').modal('show');
        });

        $('#submit').on('click', function () {

            let form     = $('.form');
            let formData = new FormData(form[0]);
            formData.append('description_ar', editorAr.getData());
            formData.append('description_en', editorEn.getData());
            var sub_category_id =  $( "#sub_category option:selected" ).val();
            var main_category_id =  $( "#main_category option:selected" ).val();

            if(main_category_id > 0 && main_category_id != 'undefined'){
                formData.append('main_category', main_category_id);
            }else{
                formData.append('main_category', null);
            }
            if(sub_category_id > 0){
                formData.append('sub_category', sub_category_id);
            }else{
                formData.append('sub_category', '');
            }

            let path     = "{{route('admin.products.create')}}";
            if ($('#action_type').val() == 'editProduct') {
                path = "{{route('admin.products.update')}}"
            }
            ajaxRequest(path, formData, function (response) {
                if (response.code == 200) {
                    swal("done!", response.Message, "success");
                    resetFormToDefault();
                    refreshTable();
                    $('#addEditProduct').modal('hide');
                }
            });
        });

        $('body').on('click', '.activation', function () {
            let serviceID = $(this).data('id');
            let formData   = new FormData();
            formData.append('product_id', serviceID);
            let path = "{{route('admin.products.activation')}}";

            swal({
                title: "تفعيل & تعطيل المنتج",
                text: "هل انت متاكد من اتمامك لعملية التفعيل او التعطيل ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    ajaxRequest(path, formData, function (response) {
                        swal("done!", response.Message, "success");
                        oTable.draw();
                    });
                }
            });


        });

        $('body').on('click', '.checkbox', function () {

            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#check_all').prop('checked',true);
            }else{
                $('#check_all').prop('checked',false);
            }
        });

        $('body').on('click', '.deleteItem', function () {
            let categoryId = $(this).data('id');
            let formData   = new FormData();
            formData.append('category_id', categoryId);
            let path = "{{route('admin.products.deleteItem')}}";

            swal({
                title: "حذف",
                text: "هل انت متاكد من اتمامك لعملية الحذف ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    ajaxRequest(path, formData, function (response) {
                        swal("done!", response.Message, "success");
                        oTable.draw();
                    });
                }
            });

        });

        $('body').on('click', '.editProduct', function () {
            resetFormToDefault();
            let serviceID = $(this).data('id');
            let path       = "{{route('admin.products.getProductInfo')}}";
            let formData   = new FormData();
            formData.append('serviceID', serviceID);



            ajaxRequest(path, formData, function (response) {
                $('#name_ar').val(response.Data.name_ar);
                $('#name_en').val(response.Data.name_en);
                editorAr.setData(response.Data.description_ar);
                editorEn.setData(response.Data.description_en);
            });
            $('#product_id').val(serviceID);
            $('#exampleModalLabel').text('{{__('admin.update_product')}}');
            $('#action_type').val('editProduct');
            $('#addEditProduct').modal('show');
        });
    </script>
@endcomponent




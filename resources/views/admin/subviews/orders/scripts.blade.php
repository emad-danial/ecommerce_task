@component('admin.components.footer.DataTablesComponents')

    <script>
        var oTable = new O_Datatable('#table');
        oTable.addColumns([
            {"data": "id", name: "orders.id"},
            {"data": "total_price", name: "orders.total_price"},
            {"data": "address", name: "orders.address"},
            {"data": "status", name: "orders.status"},
            {"data": "view", name: "view"},
            {"data": "delete", name: "delete"},
            {"data": "created_at", name: "orders.created_at"},
        ]);
        oTable.orderBy([1, 'desc']);
        oTable.addAjaxUrlWithData('{{route('admin.orders.index')}}', function (send) {

        });
        oTable.build();


        function initInputsBasedInType() {
            let category_type = $('#category_type').val();
            if (category_type == 'main_category' || category_type == null) {
                $('.main_category_div').hide(400);

            }
            else {
                $('.main_category_div').show(400);

            }
        }

        $('body').on('change', '#category_type', function () {
            initInputsBasedInType();
        });

        $('.addNewCategory').on('click', function () {
            resetFormToDefault();
            initInputsBasedInType();
            $('#exampleModalLabel').text('{{__('admin.create_new_category')}}');
            $('#action_type').val('createNewCategory');
            $('#addEditCategory').modal('show');
        });

        $('#submit').on('click', function () {

            let form     = $('.form');
            let formData = new FormData(form[0]);
            formData.append('description_ar', editorAr.getData());
            formData.append('description_en', editorEn.getData());
            let path     = "{{route('admin.categories.create')}}";
            if ($('#action_type').val() == 'editCategory') {
                path = "{{route('admin.categories.update')}}"
            }
            ajaxRequest(path, formData, function (response) {
                if (response.code == 200) {
                    swal("done!", response.Message, "success");
                    resetFormToDefault();
                    refreshTable();
                    $('#addEditCategory').modal('hide');
                }
            });
        });

        $('body').on('click', '.activation', function () {
            let categoryId = $(this).data('id');
            let formData   = new FormData();
            formData.append('category_id', categoryId);
            let path = "{{route('admin.categories.activation')}}";

            swal({
                title: "تفعيل & تعطيل القسم",
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

        $('body').on('click', '.deleteItem', function () {
            let categoryId = $(this).data('id');
            let formData   = new FormData();
            formData.append('category_id', categoryId);
            let path = "{{route('admin.orders.deleteItem')}}";

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

        $('body').on('click', '.viewOrder', function () {
            resetFormToDefault();
            let categoryId = $(this).data('id');
            let path       = "{{route('admin.orders.getOrdersInfo')}}";
            let formData   = new FormData();
            formData.append('categoryId', categoryId);
            ajaxRequest(path, formData, function (response) {
                console.log(response)
                $('#title').html(response.Data.title);
                $('#description').html(response.Data.description);
            });
            $('#exampleModalLabel').text('{{__('admin.View Order')}}');
            $('#viewOrder').modal('show');
        });
    </script>
@endcomponent




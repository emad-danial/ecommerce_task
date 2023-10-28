<?php $__env->startComponent('admin.components.footer.DataTablesComponents'); ?>
    <script>
        var oTable = new O_Datatable('#table');
        oTable.addColumns([
            {"data": "name", name: "users.name"},
            {"data": "phone", name: "users.phone"},
            {"data": "email", name: "users.email"},
            {"data": "avatar", name: "users.avatar"},
            // {"data": "user_addresses", name: "user_addresses"},
            {"data": "is_active", name: "users.is_active"},
            // {"data": "add_new_address", name: "add_new_address"},
            {"data": "update", name: "update"},
            {"data": "created_at", name: "users.created_at"},
        ]);
        oTable.orderBy([1, 'desc']);
        oTable.addAjaxUrlWithData('<?php echo e(route('admin.users.index')); ?>', function (send) {

        });
        oTable.build();

        $('.addNewUser').on('click', function () {
            resetFormToDefault();
            $('#exampleModalLabel').text('<?php echo e(__('admin.create_new_user')); ?>');
            $('#action_type').val('createNewUser');
            $('#addEditUser').modal('show');
        });

        $('#submit').on('click', function () {

            let form     = $('.form');
            let formData = new FormData(form[0]);
            let path     = "<?php echo e(route('admin.users.create')); ?>";
            if ($('#action_type').val() == 'editUser') {
                path = "<?php echo e(route('admin.users.update')); ?>"
            }
            ajaxRequest(path, formData, function (response) {
                if (response.code == 200) {
                    swal("done!", response.Message, "success");
                    resetFormToDefault();
                    refreshTable();
                    $('#addEditUser').modal('hide');
                }
            });
        });

        $('body').on('click', '.activation', function () {
            let userId   = $(this).data('id');
            let formData = new FormData();
            formData.append('user_id', userId);
            let path = "<?php echo e(route('admin.users.activation')); ?>";

            swal({
                title: "تفعيل & تعطيل المستخدم",
                text: "هل انت متاكد من اتمامك لعملية التفعيل او التعطيل للمستخدم",
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

        $('body').on('click', '.editUser', function () {
            resetFormToDefault();
            let userId   = $(this).data('id');
            let path     = "<?php echo e(route('admin.users.getUserInfo')); ?>";
            let formData = new FormData();
            formData.append('userId', userId);
            ajaxRequest(path, formData, function (response) {
                $('#name').val(response.Data.name);
                $('#phone').val(response.Data.phone);
                $('#email').val(response.Data.email);
            });
            $('#user_id').val(userId);
            $('#exampleModalLabel').text('<?php echo e(__('admin.update_user')); ?>');
            $('#action_type').val('editUser');
            $('#addEditUser').modal('show');
        });
    </script>
<?php echo $__env->renderComponent(); ?>



<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/subviews/users/indexScripts.blade.php ENDPATH**/ ?>
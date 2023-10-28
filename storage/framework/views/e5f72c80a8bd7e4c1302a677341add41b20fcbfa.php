<?php $__env->startComponent('admin.components.footer.DataTablesComponents'); ?>
    <script type="text/javascript" src="<?php echo e(url('/')); ?>/Admin/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#overview_ar' ) )
            .then( newEditorAr => {
                editorAr = newEditorAr;
            } )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#overview_en' ) )
            .then( newEditorEn => {
                editorEn = newEditorEn;
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>

    </script>
<?php echo $__env->renderComponent(); ?>



<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/subviews/settings/scripts.blade.php ENDPATH**/ ?>
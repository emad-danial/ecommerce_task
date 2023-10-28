@component('admin.components.footer.DataTablesComponents')
    <script type="text/javascript" src="{{url('/')}}/Admin/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
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
@endcomponent




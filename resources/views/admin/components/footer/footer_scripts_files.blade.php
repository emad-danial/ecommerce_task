<?php

    $jsList = [
        "Admin/assets/js/config.js",
        "Admin/assets/plugins/global/plugins.bundle.js",
        "Admin/assets/plugins/custom/prismjs/prismjs.bundle.js",
        "Admin/assets/js/scripts.bundle.js",
        "Admin/assets/js/general_scripts.js",
        "Admin/assets/js/datatables_scripts.js",

    ];

    $cdnJs =[
        'https://unpkg.com/sweetalert/dist/sweetalert.min.js'
    ];

?>


<?php foreach($jsList as $key=>$item): ?>
    <script src="{{url('/')}}/{{$item}}"></script>
<?php endforeach; ?>

<?php foreach($cdnJs as $key=>$item): ?>
    <script src="{{$item}}"></script>
<?php endforeach; ?>






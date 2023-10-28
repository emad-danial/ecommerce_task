<?php

    $cssList = [
        "Admin/assets/plugins/global/plugins.bundle.rtl.css",
        "Admin/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css",
        "Admin/assets/css/style.bundle.rtl.css",
        "Admin/assets/css/themes/layout/header/base/light.rtl.css",
        "Admin/assets/css/themes/layout/header/menu/light.rtl.css",
        "Admin/assets/css/themes/layout/brand/dark.rtl.css",
        "Admin/assets/css/themes/layout/aside/dark.rtl.css"
    ];

?>

<?php foreach($cssList as $key=>$item): ?>
    <link rel="stylesheet" href="{{url('/')}}/{{$item}}">
<?php endforeach; ?>

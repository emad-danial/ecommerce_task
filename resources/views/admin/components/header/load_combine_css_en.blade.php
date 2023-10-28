<?php

    $cssList = [
        "Admin/assets/plugins/global/plugins.bundle.css",
        "Admin/assets/plugins/custom/prismjs/prismjs.bundle.css",
        "Admin/assets/css/style.bundle.css",
        "Admin/assets/css/themes/layout/header/base/light.css",
        "Admin/assets/css/themes/layout/header/menu/light.css",
        "Admin/assets/css/themes/layout/brand/dark.css",
        "Admin/assets/css/themes/layout/aside/dark.css",
    ];

?>

<?php foreach($cssList as $key=>$item): ?>
    <link rel="stylesheet" href="{{url('/')}}/{{$item}}">
<?php endforeach; ?>












<link rel="canonical" href="https://keenthemes.com/metronic"/>

<!--begin::Fonts-->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
<!--end::Fonts-->
<style>
    *{
        font-family: 'Cairo', sans-serif;
        font-weight: 700;
    }
    .card.card-custom .card-body{
        max-width: 100%;
        overflow-x: scroll;
    }
    @media (min-width: 992px){
        .header-fixed.subheader-fixed.subheader-enabled .wrapper{
            padding-top: 80px!important;
        }
    }
    .sec-icon {
        position: relative;
        display: inline-block;
        padding: 0;
        margin: 0 auto;
    }

    .sec-icon::before {
        content: "";
        position: absolute;
        height: 1px;
        left: -70px;
        margin-top: -5.5px;
        top: 60%;
        background: #333333;
        width: 50px;
    }

    .sec-icon::after {
        content: "";
        position: absolute;
        height: 1px;
        right: -70px;
        margin-top: -5.5px;
        top: 60%;
        background: #333;
        width: 50px;
    }

    .advertisers-service-sec {
        background-color: #f5f5f5;
    }

    .advertisers-service-sec span {
        color: rgb(255, 23, 131);
    }

    .advertisers-service-sec .col {
        padding: 0 1em 1em 1em;
        text-align: center;
    }

    .advertisers-service-sec .service-card {
        width: 100%;
        height: 100%;
        padding: 2em 1.2em;
        border-radius: 5px;
        box-shadow: 0 0 35px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        transition: 0.5s;
        position: relative;
        z-index: 2;
        overflow: hidden;
        background: #fff;
    }

    .advertisers-service-sec .service-card::after {
        content: "";
        width: 100%;
        height: 100%;
        background: linear-gradient(#0dcaf0, rgb(255, 23, 131));
        position: absolute;
        left: 0%;
        top: -98%;
        z-index: -2;
        transition: all 0.4s cubic-bezier(0.77, -0.04, 0, 0.99);
    }

    .advertisers-service-sec h3 {
        font-size: 20px;
        text-transform: capitalize;
        font-weight: 600;
        color: #1f194c;
        margin: 1em 0;
        z-index: 3;
    }

    .advertisers-service-sec p {
        color: #575a7b;
        font-size: 15px;
        line-height: 1.6;
        letter-spacing: 0.03em;
        z-index: 3;
    }

    .advertisers-service-sec .icon-wrapper {
        background-color: #2c7bfe;
        position: relative;
        margin: auto;
        font-size: 30px;
        height: 2.8em;
        width: 2.8em;
        color: #ffffff;
        border-radius: 50%;
        display: grid;
        place-items: center;
        transition: 0.5s;
        z-index: 3;
    }

    .advertisers-service-sec .service-card:hover:after {
        top: 0%;
    }

    .service-card .icon-wrapper {
        background-color: #ffffff;
        color: rgb(255, 23, 131);
    }

    .advertisers-service-sec .service-card:hover .icon-wrapper {
        color: #0dcaf0;
    }

    .advertisers-service-sec .service-card:hover h3 {
        color: #ffffff;
    }

    .advertisers-service-sec .service-card:hover p {
        color: #f0f0f0;
    }
    /* ADVERTISERS SERVICE CARD ENDED */



</style>
<!--begin::Global Theme Styles(used by all pages)-->

<?php if($Is_Rtl): ?>

    <?php echo $__env->make('admin.components.header.load_combine_css_ar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php else: ?>

    <?php echo $__env->make('admin.components.header.load_combine_css_en', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Admin/assets/css/default.css">

<!--end::Layout Themes-->
<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/components/header/header_components.blade.php ENDPATH**/ ?>
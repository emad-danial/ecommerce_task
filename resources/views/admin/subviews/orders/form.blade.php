@extends('admin.main_layout')
@section('header_title',__('admin.orders'))
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{(isset($code))?route('admin.orders.update',$code):route('admin.orders.store')}}"
                              method="post" enctype="multipart/form-data">
                            @include('web.componants.messages')
                            @csrf
                            <div class="alert alert-primary" role="alert" id="infoMessage" style="display: none">

                            </div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="md-form">


                                            <div class="row">


                                                <div class="col-md-5">
                                                    <h5>السلة (الاجمالى = <span id="totalHeaderAdminCart">0</span> جنية)</h5>
                                                </div>

                                                <div class="col-md-2">
                                                    <button class="btn btn-danger" type="button" onclick="removeAllItems()">
                                                        <i class="fa fa-trash"></i> الكل
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">صورة</th>
                                                            <th scope="col">الاسم</th>
                                                            <th scope="col">السعر</th>
                                                            <th scope="col">الكمية</th>
                                                            <th scope="col">اعدادات</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="cartProductContainer">
                                                        <tr id="nodata">
                                                            <th scope="row" colspan="6" class="text-center">
                                                                لا يوجد
                                                            </th>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="md-form">
                                                     <h3>القسم</h3>
                                                    <select id="category_id" class="form-control">
                                                        <option value="">القسم الرئيسي</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name_ar}}</option>
                                                        @endforeach
                                                    </select>
                                                    <br>
                                                    <br>

                                                </div>
                                            </div>
                                        </div>

                                        @if(count($products) > 0)
                                            <div class="row" style="max-height: 500px;overflow-y: scroll"
                                                 id="productsSearchContainer">
                                                @foreach($products as $product)
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <img class="card-img-top cartimage"
                                                                 src="{{url('/').$product->image}}" alt="image" >
                                                            <div class="card-body">
                                                                <h5 class="product-title">{{$product->name_ar}}</h5>
                                                                <h6> السعر : {{$product->price}}</h6>
                                                                <h6>
                                                                    الكمية &nbsp; <input type="number" min="1"
                                                                                           value="1"
                                                                                           class="border border-primary rounded text-center w-50"
                                                                                           id="product{{$product->id}}">
                                                                </h6>

                                                                <br>
                                                                <button type="button"
                                                                        class="btn btn-primary addToCartButton"
                                                                        id="{{$product->id}}"
                                                                        product_name="{{$product->name_ar}}"
                                                                        product_image="{{$product->image}}"
                                                                        product_price="{{$product->price}}">
                                                                    إضافة الى السلة
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>

                                        @endif
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card-body -->

                            &nbsp; &nbsp;
                            <button id="save_button" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" disabled>
                                حفظ الطلب
                            </button>

                        </form>
                        <br>
                        <br>

                        <div class="row" id="invoice" style="    border: 1px solid #e7e7e7; margin-left: 3px; padding: 10px; border-radius: 5px; display: none">
                            <div class="col-md-12">
                                <h2>Invoice</h2>
                                <hr>
                            </div>
                            <div class="col-md-3">
                                <h3>Total Products: </h3>
                            </div>
                            <div class="col-md-3">
                                <h3 id="totalProducts"></h3>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-3">
                                <h3>Discount Percentage : </h3>
                            </div>
                            <div class="col-md-3">
                                <h3 id="discountPercentage"></h3>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-3">
                                <h3>Shipping : </h3>
                            </div>
                            <div class="col-md-3">
                                <h3 id="shipping"></h3>
                            </div>
                            <div class="col-md-6">
                            </div>


                            <div class="col-md-3">
                                <h3>Total After Discount : </h3>
                            </div>
                            <div class="col-md-3">
                                <h3 id="totalProductsAfterDiscount"></h3>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-3">
                                <h3>Total Order : </h3>
                            </div>
                            <hr>
                            <div class="col-md-3">
                                <h3 id="totalOrder"></h3>
                            </div>
                            <div class="col-md-6">
                            </div>

                            <div class="col-md-3">
                                <h3>Order Id : </h3>
                            </div>
                            <div class="col-md-3">
                                <input type="number" disabled id="order_id"></input>
                            </div>
                            <div class="col-md-6">
                            </div>





                        </div>



                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">حفظ الطلب </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row"><div class="col-md-8">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="address">عنوان التوصيل</label>
                                    <input class="form-control" type="text"  id="address">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="landmark" id="errorindatat" style="color: red ;display: none">
                                خطاء فى العنوان</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="button" class="btn btn-primary" onclick="saveOrderButton()"> حفظ</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCurrentDiscount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCurrentDiscountTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Current Discount</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="new_discount">Discount</label>
                                    <input class="form-control" type="number" min="0" max="100" value="30" id="edit_current_discount">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveCurrentDiscount()">Save</button>
                    </div>
                </div>
            </div>
        </div>

    </section>




@endsection
@section('scripts')
    <script type="text/javascript">


        var total_cart          = 0;
        var base_url            = window.location.origin;
        var url_string          = (window.location).href;
        var url                 = new URL(url_string);
        var message             = url.searchParams.get("message");

        var cartProducts     = [];
        var allProductsArray = [];
        $(document).ready(function () {
            // $("select").select2();

            $('#currentDiscount').html($('#new_discount').val());


            if (message && message != '') {
                $("#infoMessage").show('slow');
                $("#infoMessage").html(message);
                setTimeout(function () {
                    $("#infoMessage").hide('slow');
                }, 5000);

                if (message == 'Operation done successfully') {
                    cartProducts     = [];
                    const myJSONdone = JSON.stringify(cartProducts);
                    localStorage.setItem("admin_cart", myJSONdone);
                }
            }

            var admin_cart = localStorage.getItem('admin_cart');
            let arrLength  = JSON.parse(admin_cart);
            if (!admin_cart || admin_cart == null || admin_cart == '' || admin_cart.length == 0 || arrLength.length == 0) {
                $("#nodata").show();
                $("#totalHeaderAdminCart").html(0);
                $("#totalHeaderAfterDiscount").html(0);
                total_cart = 0;
            }
            else {
                $("#nodata").hide();
                $('#save_button').removeAttr('disabled');
                allProductsArray = JSON.parse(admin_cart);
                cartProducts     = allProductsArray;
                const cartLength = allProductsArray.length;

                for (let iiii = 0; iiii < cartLength; iiii++) {
                    var proObjff = allProductsArray[iiii];
                    $("#cartProductContainer").append(
                        ' <tr id="productparent' + proObjff['id'] + '"> <th scope="row"> ' + proObjff['id'] + ' </th><th scope="row"><img class="card-img-top cartimage" src="' + proObjff['image'] + '" alt="image" width="50" height="50"></th><td> ' + proObjff['name'] + ' </td><td>' + proObjff['price'] + '</td><td><button class="increase-decrease" type="button" onclick="decreaseQuantity(' + proObjff['id'] + ')"> - </button><span id="proQuantity' + proObjff['id'] + '">' + proObjff['quantity'] + '</span><button class="increase-decrease" type="button" onclick="increaseQuantity(' + proObjff['id'] + ')"> + </button></td><td ><button  type="button" onclick="removeFromCart(' + proObjff['id'] + ')" style="border: 0px;color: red;">X</button></td></tr>'
                    );
                    total_cart = (Number(total_cart) + (Number(proObjff['price']) * Number(proObjff['quantity'])));
                }
                $("#totalHeaderAdminCart").html(total_cart);
                var afdis=total_cart-(total_cart * $('#new_discount').val() / 100);
                $("#totalHeaderAfterDiscount").html(afdis);
            }

            $(".addToCartButton").click(function () {

                console.log("fdfdfd 11");
                var productId        = $(this).attr('id');
                var productName      = $(this).attr('product_name');
                var productPrice     = $(this).attr('product_price');
                var productImage     = $(this).attr('product_image');
                var productQuantity  = $('#product' + productId).val();
                if(productQuantity >0){


                    var el_exist_inarray = cartProducts.find((e) => e.id == productId);
                    if (el_exist_inarray) {
                        var mainobj = {
                            'id': productId,
                            'name': productName,
                            'image': productImage,
                            'price': productPrice,
                            'quantity': parseInt(parseInt(el_exist_inarray['quantity']) + parseInt(productQuantity))
                        }
                        removeFromCart(productId)
                    }
                    else {
                        var mainobj = {
                            'id': productId,
                            'name': productName,
                            'image': productImage,
                            'price': productPrice,

                            'quantity': productQuantity
                        }
                    }
                    cartProducts.push(mainobj);
                    const myJSON = JSON.stringify(cartProducts);
                    localStorage.setItem("admin_cart", myJSON);
                    total_cart = (Number(total_cart) + (Number(mainobj['price']) * Number(mainobj['quantity'])));
                    $("#totalHeaderAdminCart").html(total_cart);
                    var afdis=total_cart-(total_cart * $('#new_discount').val() / 100);
                    $("#totalHeaderAfterDiscount").html(afdis);
                    $("#nodata").hide();
                    $('#product' + productId).val(1);
                    $('#save_button').removeAttr('disabled');
                    $("#cartProductContainer").append(
                        ' <tr id="productparent' + productId + '"> <th scope="row"> ' + productId + ' </th><th scope="row"><img class="card-img-top cartimage" src="' + productImage + '" alt="image" width="50" height="50"></th><td> ' + productName + ' </td><td>' + productPrice + '</td><td><button class="increase-decrease" type="button" onclick="decreaseQuantity(' + productId + ')"> - </button><span id="proQuantity' + productId + '">' + mainobj['quantity'] + '</span><button class="increase-decrease" type="button" onclick="increaseQuantity(' + productId + ')"> +</button></td><td ><button type="button" onclick="removeFromCart(' + productId + ')" style="border: 0px;color: red;">X</button></td></tr>'
                    );
                    swal({
                        text: "{{trans('website.Add Product To Cart',[],session()->get('locale'))}}",
                        title: "Successful",
                        timer: 1500,
                        icon: "success",
                        buttons: false,
                    });
                }
            });





            $("#category_id").change(function () {
                getpro();
            });

            function getpro() {
                var category_id = $("#category_id").val();
                var proname     = $("#proname").val();
                var procode     = $("#procode").val();
                var barcode     = $("#barcode").val();
                let formData    = new FormData();
                formData.append('category_id', category_id);
                formData.append('name', proname);
                formData.append('barcode', barcode);
                formData.append('code', procode);
                let path = base_url + "/api/getAllproducts";
                // console.log("path", path);
                $.ajax({
                    url: path,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processData: false,
                    success: function (response) {
                        if (response.data) {

                            $("#productsSearchContainer").html('');
                            // console.log(response.data);
                            if (response.data.length > 0) {
                                for (let ii = 0; ii < response.data.length; ii++) {
                                    let proObj = response.data[ii];
                                    $("#productsSearchContainer").append(
                                        '<div class="col-md-4"><div class="card"> <img class="card-img-top  " src="'+base_url+ proObj['image'] + '" " alt="image"> <div class="card-body"> <h5 class="product-title">' + proObj['name_ar'] +
                                        '</h5><h6> السعر : ' + proObj['price'] + '</h6>  <h6>' + 'الكمية &nbsp; <input type="number" min="1" value="1" class="border border-primary rounded text-center w-50" id="product' + proObj['id'] + '"> </h6>' +
                                        ' <br> <button type="button" class="btn btn-primary addToCartButton" onclick="addToCartFunction(this)" id="' + proObj['id'] + '" product_name="' + proObj['name_ar'] + '" product_flag="' + proObj['flag'] + '" product_price="' + proObj['price'] + '" product_image="' + proObj['image'] + '" >' +
                                        'إضافة الى السلة </button> </div> </div> </div>'
                                        + ' \n'
                                    );
                                }

                                if (barcode && barcode != '' && barcode > '') {

                                    let proObjBar        = response.data[0];
                                    var el_exist_inarray = cartProducts.find((e) => e.id == proObjBar['id']);
                                    if (el_exist_inarray) {
                                        var mainobj = {
                                            'id': proObjBar['id'],
                                            'name': proObjBar['name_ar'],
                                            'image': proObjBar['image'],
                                            'price': proObjBar['price'],
                                            'flag': proObjBar['flag'],
                                            'quantity': parseInt(parseInt(el_exist_inarray['quantity']) + 1)
                                        }
                                        removeFromCart(proObjBar['id'])
                                    }
                                    else {
                                        var mainobj = {
                                            'id': proObjBar['id'],
                                            'name': proObjBar['name_ar'],
                                            'image': proObjBar['image'],
                                            'price': proObjBar['price'],
                                            'flag': proObjBar['flag'],
                                            'quantity': 1
                                        }
                                    }
                                    cartProducts.push(mainobj);
                                    const myJSON = JSON.stringify(cartProducts);
                                    localStorage.setItem("admin_cart", myJSON);
                                    total_cart = (Number(total_cart) + (Number(mainobj['price']) * Number(mainobj['quantity'])));
                                    $("#totalHeaderAdminCart").html(total_cart);
                                    var afdis=total_cart-(total_cart * $('#new_discount').val() / 100);
                                    $("#totalHeaderAfterDiscount").html(afdis);
                                    $("#nodata").hide();
                                    $('#save_button').removeAttr('disabled');
                                    $("#cartProductContainer").append(
                                        ' <tr id="productparent' + proObjBar['id'] + '"> <th scope="row"> ' + proObjBar['id'] + ' </th><th scope="row"><img class="card-img-top cartimage" src="' + proObjBar['image'] + '" alt="image" width="50" height="50"></th><td> ' + proObjBar['name_ar'] + ' </td><td>' + proObjBar['price'] + '</td><td><button class="increase-decrease" type="button" onclick="decreaseQuantity(' + proObjBar['id'] + ')"> - </button><span id="proQuantity' + proObjBar['id'] + '">' + mainobj['quantity'] + '</span><button class="increase-decrease" type="button" onclick="increaseQuantity(' + proObjBar['id'] + ')">+ </button></td><td > <button type="button" onclick="removeFromCart(' + proObjBar['id'] + ')" style="border: 0px;color: red;">X</button> </td></tr>'
                                    );
                                    $("#barcode").val('');

                                }
                            }
                            else {
                                $("#productsSearchContainer").html('');
                                $('#productsSearchContainer').append('<div class="col-md-12"> <h3 class="text-center">لا يوجد</h3></div>');

                            }

                        }
                        else {
                            $("#productsSearchContainer").html('');
                            $('#productsSearchContainer').append('<div class="col-md-12"> <h3 class="text-center">لا يوجد</h3></div>');

                        }
                    },
                    error: function (response) {
                        console.log(response)
                        alert('error');
                    }
                });
            }
        });

        function addToCartFunction(el) {
            console.log("fdfdfd 22");
            var productId       = $(el).attr('id');
            var productName     = $(el).attr('product_name');
            var productPrice    = $(el).attr('product_price');
            var productImage    = $(el).attr('product_image');
            var productFlag     = $(el).attr('product_flag');
            var productQuantity = $('#product' + productId).val();

            var el_exist_inarray = cartProducts.find((e) => e.id == productId);
            if (el_exist_inarray) {
                var mainobj = {
                    'id': productId,
                    'name': productName,
                    'image': productImage,
                    'price': productPrice,
                    'flag': productFlag,
                    'quantity': parseInt(parseInt(el_exist_inarray['quantity']) + parseInt(productQuantity))
                }
                removeFromCart(productId)
            }
            else {
                var mainobj = {
                    'id': productId,
                    'name': productName,
                    'image': productImage,
                    'price': productPrice,
                    'flag': productFlag,
                    'quantity': productQuantity
                }
            }
            cartProducts.push(mainobj);
            const myJSON = JSON.stringify(cartProducts);
            localStorage.setItem("admin_cart", myJSON);
            total_cart = (Number(total_cart) + (Number(mainobj['price']) * Number(mainobj['quantity'])));

            $("#totalHeaderAdminCart").html(total_cart);
            var afdis=total_cart-(total_cart * $('#new_discount').val() / 100);
            $("#totalHeaderAfterDiscount").html(afdis);
            $("#nodata").hide();
            $('#save_button').removeAttr('disabled');
            $("#cartProductContainer").append(
                ' <tr id="productparent' + productId + '"> <th scope="row"> ' + productId + ' </th><th scope="row"><img class="card-img-top cartimage" src="' + productImage + '" alt="image" width="50" height="50"></th><td> ' + productName + ' </td><td>' + productPrice + '</td><td><button class="increase-decrease" type="button" onclick="decreaseQuantity(' + productId + ')"> - </button><span id="proQuantity' + productId + '">' + mainobj['quantity'] + '</span><button class="increase-decrease" type="button" onclick="increaseQuantity(' + productId + ')">+ </button></td><td > <button type="button" onclick="removeFromCart(' + productId + ')" style="border: 0px;color: red;">X</button> </td></tr>'
            );
            swal({
                text: "{{trans('website.Add Product To Cart',[],session()->get('locale'))}}",
                title: "Successful",
                timer: 1500,
                icon: "success",
                buttons: false,
            });
        }

        function removeFromCart(produt_id) {
            const indexOfObject = cartProducts.findIndex(object => {
                return object.id == produt_id;
            });
            total_cart          = (Number(total_cart) - (Number(cartProducts[indexOfObject]['price']) * Number(cartProducts[indexOfObject]['quantity'])));
            $("#totalHeaderAdminCart").html(total_cart);
            var afdis=total_cart-(total_cart * $('#new_discount').val() / 100);
            $("#totalHeaderAfterDiscount").html(afdis);
            cartProducts.splice(indexOfObject, 1);
            const myJSON = JSON.stringify(cartProducts);
            localStorage.setItem("admin_cart", myJSON);
            $("#productparent" + produt_id).remove();
            if (cartProducts.length < 1) {
                $("#nodata").show();
                $("#totalHeaderAdminCart").html(0);

                $("#totalHeaderAfterDiscount").html(0);
                $('#save_button').prop('disabled', true);
            }
        }

        function removeAllItems() {
            $('#save_button').prop('disabled', true);
            cartProducts = [];
            const myJSON = JSON.stringify(cartProducts);
            localStorage.setItem("admin_cart", myJSON);
            $("#cartProductContainer").html('');
            $("#totalHeaderAdminCart").html(0);

            $("#totalHeaderAfterDiscount").html(0);
            $("#nodata").show();
            $("#cartProductContainer").append(
                '<tr id="nodata"><th scope="row" colspan="6" class="text-center">لا يوجد </th> </tr>'
            );
        }

        function increaseQuantity(produt_id) {
            const indexOfObject                     = cartProducts.findIndex(object => {
                return object.id == produt_id;
            });
            total_cart                              = (Number(total_cart) + Number(cartProducts[indexOfObject]['price']));
            cartProducts[indexOfObject]['quantity'] = Number(cartProducts[indexOfObject]['quantity']) + 1;
            $("#totalHeaderAdminCart").html(total_cart);
            var afdis=total_cart-(total_cart * $('#new_discount').val() / 100);
            $("#totalHeaderAfterDiscount").html(afdis);
            $("#proQuantity" + produt_id).html(cartProducts[indexOfObject]['quantity']);
            const myJSON = JSON.stringify(cartProducts);
            localStorage.setItem("admin_cart", myJSON);
        }

        function decreaseQuantity(produt_id) {
            const indexOfObject                     = cartProducts.findIndex(object => {
                return object.id == produt_id;
            });
            total_cart                              = (Number(total_cart) - Number(cartProducts[indexOfObject]['price']));
            cartProducts[indexOfObject]['quantity'] = Number(cartProducts[indexOfObject]['quantity']) - 1;
            $("#totalHeaderAdminCart").html(total_cart);
            var afdis=total_cart-(total_cart * $('#new_discount').val() / 100);
            $("#totalHeaderAfterDiscount").html(afdis);
            $("#proQuantity" + produt_id).html(cartProducts[indexOfObject]['quantity']);

            if (cartProducts[indexOfObject]['quantity'] < 1) {
                $("#productparent" + produt_id).remove();
                cartProducts.splice(indexOfObject, 1);
            }
            if (cartProducts.length < 1) {
                $("#nodata").show();
                $("#totalHeaderAdminCart").html(0);

                $("#totalHeaderAfterDiscount").html(0);
            }
            const myJSON = JSON.stringify(cartProducts);
            localStorage.setItem("admin_cart", myJSON);
        }

        function saveOrderButton() {


            var address            = $('#address').val();
            var total_price        = $("#totalHeaderAdminCart").html();
            total_price=Number(total_price);
            let path = base_url + "/adminPanel/orders/store";

            var ff = {
                "total_price": total_price,
                "address": address,
                "items": cartProducts
            }

            $.ajax({
                url: path,
                type: 'POST',
                cache: false,
                data: JSON.stringify(ff),
                contentType: "application/json; charset=utf-8",
                traditional: true,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                success: function (response) {

                    if (response.code == 200 && response.Data) {
                        $("#exampleModalCenter").modal('hide');
                        $('#save_button').prop('disabled', true);
                        swal("done!", response.Message, "success");
                        cartProducts     = [];
                        const myJSONdone = JSON.stringify(cartProducts);
                        localStorage.setItem("admin_cart", myJSONdone);
                        window.location.reload();
                    }

                    if (response.data) {

                        console.log(response.data);
                        $("#exampleModalCenter").modal('hide');
                        $('#save_button').prop('disabled', true);

                        window.scrollTo({left: 0, top: document.body.scrollHeight, behavior: 'smooth'})
                    }
                },
                error: function (response) {
                    console.log(response)
                    alert('error');
                }
            });
        }

        function saveCurrentDiscount() {
            var current_discount = $('#edit_current_discount').val();
            $('#new_discount').val(current_discount);
            $('#currentDiscount').html(current_discount);
            $("#exampleModalCurrentDiscount").modal('hide');
            var afdis=total_cart-(total_cart * current_discount / 100);
            $("#totalHeaderAfterDiscount").html(afdis);
        }



        function searchfun(nameKey, myArray) {
            for (let i = 0; i < myArray.length; i++) {
                let text = myArray[i].full_name
                if (text.includes(nameKey)) {
                    return true;
                }
            }
            return false;
        }

    </script>
@endsection


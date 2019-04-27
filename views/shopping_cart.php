<!-- include header -->
<?php include 'layout/header.php';?>
    <!-- End HEADER section -->
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb--ys pull-left">
                <li class="home-link">
                    <a href="index.html" class="icon icon-home"></a>
                </li>
                <li><a href="?mod=home">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>
    </div>
    <!-- /breadcrumbs -->
    <!-- CONTENT section -->
    <div id="pageContent">
        <div class="container">
            <!-- title -->
            <div class="title-box">
                <h1 class="text-center text-uppercase title-under">GIỎ HÀNG</h1>
            </div>
            <!-- /title -->
            <!-- Shopping cart table -->
            <div class="container-widget">
                <table class="shopping-cart-table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- /Shopping cart table -->
            <div class="divider divider--xs"></div>
            <div class="clearfix shopping-cart-btns">
                <a id="update-cart" class="btn btn--ys btn--light pull-right" href="javascript:void(0)"><span class="icon icon-autorenew"></span>CẬP NHẬT GIỎ HÀNG</a>
                <div class="divider divider--xs visible-xs"></div>
                <a class="btn btn--ys btn--light" href="#"><span class="icon icon-delete"></span>XÓA GIỎ HÀNG</a>
                <div class="divider divider--xs visible-xs"></div>
                <a class="btn btn--ys btn--light pull-left btn-right" href="?mod=shop"><span class="icon icon-keyboard_arrow_left"></span>Tiếp tục mua sắm </a>
                <div class="divider divider--xs visible-xs"></div>

            </div>
            <div class="divider--md"></div>
            <div class="row">
                <div class="col-md-offset-3 col-md-4">
                    <div class=" card card--padding">
                        <h4>MÃ GIẢM GIÁ</h4>
                        <form>
                            <div class="form-group">
                                <label for="inputDiscountCodes">Điền mã giảm giá nếu có.</label>
                                <input type="text" class="form-control" id="inputDiscountCodes">
                            </div>
                            <button type="submit" class="btn btn--ys btn-top btn--light">Xác nhận</button>
                        </form>
                    </div>
                </div>
                <div class="divider--md visible-sm visible-xs"></div>
                <div class="col-md-5">
                    <div class="card card--padding">
                        <table class="table-total">
                            <tbody>
                                <tr>
                                    <th class="text-left">Tổng tiền:</th>
                                    <td class="text-right total-price1">sss</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Giảm:</th>
                                    <td class="text-right">0 </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Thành tiền:</th>
                                    <td class="total-price2"></td>
                                </tr>
                            </tfoot>
                        </table>
                        <a href="?mod=checkout" class="btn btn--ys btn--full btn--xl">Thanh toán <span class="icon icon--flippedX icon-reply"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End CONTENT section -->
    <!-- FOOTER section -->
    <?php include 'layout/footer.php';?>
        <!-- jQuery 1.10.1-->
        <script src="public/external/jquery/jquery-2.1.4.min.js"></script>
        <script src="public/external/slick/slick.min.js"></script>
        <script src="public/external/colorbox/jquery.colorbox-min.js"></script>
        <script src="public/external/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="public/external/nouislider/nouislider.min.js"></script>
        <!-- Custom -->
        <script src="public/js/custom.js"></script>
<script>
    $(document).ready(function() {
        if(localStorage.getItem('cart') === null) {
            localStorage.setItem('cart', JSON.stringify([]));
        } else {
            var cart = JSON.parse(localStorage.getItem('cart'));
            $('#open-cart .badge--cart').text(cart.length);
            if(cart.length === 0){
                window.location.replace('?mod=empty-cart');
            }
        }
        showCartDetail();
        function showCartDetail() {
            var cart = JSON.parse(localStorage.getItem('cart'));
            $('#open-cart .badge--cart').text(cart.length);
            $('.cart__total span').text('0 ');
            if(cart.length > 0) {
                $('.shopping-cart-table tbody').children().remove();
                var total = 0;
                cart.forEach(function(item) {
                    total += item.product.price * item.quantity;
                    $('.shopping-cart-table tbody').append(
                        '<tr>'
                            +'<td><div class="shopping-cart-table__product-image">'
                                +'<input type="hidden" value="'+item.product.code+'"/>'
                                +'<a href="product.html">'
                                        +'<img class="img-responsive" src="../upload/'+item.product.image+'" alt="">'
                                +'</a></div></td>'
                            +'<td>'
                                +'<h5 class="shopping-cart-table__product-name text-left text-uppercase">'
                                        +'<a href="product.html">'+item.product.name+'</a> </h5>'
                                +'<ul class="shopping-cart-table__list-parameters">'
                                    +'<li> <span>Color:</span> Purple </li>'
                                    +'<li> <span>Quantity:</span> 200 </li>'
                                    +'<li class="visible-xs">'
                                        +'<span>Price:</span>'
                                        +'<span class="price-mobile">'+fomatVND(item.product.price)+'</span>'
                                    +'</li>'
                                    +'<li class="visible-xs">'
                                        +'<span>Qty:</span>'
                                        +'<div class="number input-counter">'
                                            +'<span class="minus-btn"></span>'
                                            +'<input type="text" value="'+item.quantity+'" size="5" />'
                                            +'<span class="plus-btn"></span>'
                                        +'</div>'
                                    +'</li>'
                                +'</ul>'
                            +'</td>'
                            +'<td>'
                            +'</td>'
                            +'<td>'
                                +'<div class="shopping-cart-table__product-price unit-price">'
                                    +fomatVND(item.product.price)+' </div>'
                            +'</td>'
                            +'<td>'
                                +'<div class="shopping-cart-table__input">'
                                    +'<div class="number input-counter">'
                                        +'<span class="minus-btn"></span>'
                                        +'<input type="text" max="'+item.product.quantity+'" value="'+item.quantity+'" size="5" />'
                                        +'<span class="plus-btn"></span>'
                                    +'</div>'
                                +'</div>'
                            +' </td>'
                            +'<td>'
                                +'<div class="shopping-cart-table__product-price subtotal">'
                                    +fomatVND(item.product.price*item.quantity)+' </div>'
                            +'</td>'
                            +'<td>'
                                +'<a class="shopping-cart-table__delete icon icon-clear" href="javascript:void(0)"></a>'
                            +'</td>'
                        +'</tr>'
                        );
                });
                $('.total-price1').text(fomatVND(total));
                $('.total-price2').text(fomatVND(total));
            }else{
                $('.shopping-cart-table tbody').append('Giỏ hàng đang trống!');
            }

        }
        $(document).on('click', '#update-cart', function(){
            var list = $('.shopping-cart-table tbody').children();
            list.each(function(){
                var code = $(this).find('input[type="hidden"]').val();
                var quantity = $(this).find('.shopping-cart-table__input input').val();
                update(code, parseInt(quantity));
            })
            showCartDetail();
        })
        function update(code, quantity){
            var cart = JSON.parse(localStorage.getItem('cart'));
            cart.forEach(function(item) {
                if(item.product.code === code){
                    item.quantity = quantity;
                }
            })
            localStorage.setItem('cart', JSON.stringify(cart));
        }
        $(document).on('click', '.shopping-cart-table__delete', function(){
            var code = $(this).parents('tbody').find('input[type="hidden"]').val();
            var cart = JSON.parse(localStorage.getItem('cart'));
            cart.forEach(function(item, index){
                if(item.product.code === code) {
                    cart.splice(index, 1);
                }
            });
            localStorage.setItem('cart', JSON.stringify(cart));
            showCartDetail();
        });
        function fomatVND(input) {
            return input.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
        }
    })
</script>
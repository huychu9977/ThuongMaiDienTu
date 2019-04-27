<!-- include header -->
<?php include 'layout/header.php';?>
    <!-- End HEADER section -->
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb--ys pull-left">
                <li class="home-link">
                    <a href="?mod=home" class="icon icon-home"></a>
                </li>
                <li><a href="?mod=home">Trang chủ</a></li>
                <li class="active">Shopping</li>
            </ol>
        </div>
    </div>
    <!-- /breadcrumbs -->
    <!-- CONTENT section -->
    <div id="pageContent">
        <div class="container">
            <!-- two columns -->
            <div class="row">
                <!-- left column -->
                <aside class="col-md-4 col-lg-3 col-xl-2" id="leftColumn">
                    <a href="#" class="slide-column-close visible-sm visible-xs"><span class="icon icon-chevron_left"></span>back</a>
                    <div class="filters-block visible-xs">
                        <div class="filters-row__select">
                            <label>Sort by: </label>
                            <div class="select-wrapper">
                                <select class="select--ys">
                                    <option>Position</option>
                                    <option>Price</option>
                                    <option>Rating</option>
                                </select>
                            </div>
                            <a href="#" class="sort-direction icon icon-arrow_back"></a>
                        </div>
                        <div class="filters-row__select">
                            <label>Show: </label>
                            <div class="select-wrapper">
                                <select class="select--ys">
                                    <option>25</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                            </div>
                        </div>
                        <a href="#" class="icon icon-arrow-down active"></a>
                        <a href="#" class="icon icon-arrow-up"></a>
                    </div>
                    <!-- shopping by block -->
                    <div class="collapse-block">
                        <h4 class="collapse-block__title">ĐANG CHỌN:</h4>
                        <div class="collapse-block__content">
                            <ul class="filter-list">
                                <li> Color: <span>White</span>
                                    <a href="#" class="icon icon-clear icon-to-right"></a>
                                </li>
                                <li> Size: <span>S</span>
                                    <a href="#" class="icon icon-clear icon-to-right"></a>
                                </li>
                            </ul>
                            <a href="?mod=shop" class="btn btn--ys btn--sm btn--light">Clear All</a>
                        </div>
                    </div>
                    <!-- /shopping by block -->
                    <!-- type block -->
                    <div class="collapse-block open">
                        <h4 class="collapse-block__title">THỂ LOẠI</h4>
                        <div class="collapse-block__content">
                            <ul class="simple-list">
                                <?php foreach ($types as $au) {
	?>
                                <li <?php
if (isset($_GET['type'])) {
		if ($_GET['type'] == $au['code']) {
			echo "class='active current'";
		}
	}

	?> ><a slug-name="type" slug-code="<?php echo $au['code']; ?>" href="javascript:void(0)"><?php echo $au['name'] . "<b> (" . $au['total'] . ")</b>"; ?> </a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                    <!-- /type block -->
                    <!-- publisher block -->
                    <div class="collapse-block open">
                        <h4 class="collapse-block__title">CÔNG TY PHÁT HÀNH</h4>
                        <div class="collapse-block__content">
                            <ul class="simple-list">
                                <?php foreach ($publishers as $au) {
	?>
                                <li <?php
if (isset($_GET['publisher'])) {
		if ($_GET['publisher'] == $au['code']) {
			echo "class='active current'";
		}
	}

	?> ><a slug-name="publisher" slug-code="<?php echo $au['code']; ?>" href="javascript:void(0)"><?php echo $au['name'] . "<b> (" . $au['total'] . ")</b>"; ?> </a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                    <!-- /publisher block -->
                    <!-- price slider block -->
                    <div class="collapse-block open">
                        <h4 class="collapse-block__title">PRICE</h4>
                        <div class="collapse-block__content">
                            <div id="priceSlider" class="price-slider"></div>
                            <form action="#">
                                <div class="price-input">
                                    <label>From:</label>
                                    <input type="text" id="priceMin" value="<?php echo $prices[0] . '.00'; ?>" />
                                </div>
                                <div class="price-input-divider">-</div>
                                <div class="price-input">
                                    <label>To:</label>
                                    <input type="text" id="priceMax" value="<?php echo $prices[1] . '.00'; ?>"/>
                                </div>
                                <div class="price-input">
                                    <button type="button" class="btn btn--ys btn--md">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /price slider block -->
                    <!-- authors block -->
                    <div class="collapse-block open">
                        <h4 class="collapse-block__title">TÁC GIẢ</h4>
                        <div class="collapse-block__content">
                            <ul class="simple-list">
                                <?php foreach ($authors as $au) {
	?>
                                <li <?php
if (isset($_GET['author'])) {
		if ($_GET['author'] == $au['code']) {
			echo "class='active current'";
		}
	}

	?> ><a slug-name="author" slug-code="<?php echo $au['code']; ?>" href="javascript:void(0)"><?php echo $au['name'] . "<b> (" . $au['total'] . ")</b>"; ?> </a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                    <!-- /authors block -->

                    <!-- featured block -->
                    <div class="collapse-block open coll-products-js">
                        <h4 class="collapse-block__title">Thịnh thành</h4>
                        <div class="collapse-block__content coll-gallery">
                        </div>

                        <div class="coll-gallery-clone" style="display:none">

                            <div class="vertical-carousel vertical-carousel-2 offset-top-10">
                                <?php foreach ($productNew as $val) {?>
                                <div class="vertical-carousel__item">
                                    <div class="vertical-carousel__item__image pull-left">
                                        <a href="?mod=detail&code=<?php echo $val['code']; ?>"><img src="../upload/<?php echo $val['image']; ?>" alt=""></a>
                                    </div>
                                    <div class="vertical-carousel__item__title">
                                        <h2 class="margin0"><a class="p-name" href="?mod=detail&code=<?php echo $val['code']; ?>"><?php echo $val['name']; ?></a></h2>
                                    </div>
                                    <div class="price-box"><?php echo number_format($val['price'], 0) . "&nbsp;₫"; ?></div>
                                    <div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
                                </div>
                                <?php }?>
                            </div>

                        </div>
                    </div>
                    <!-- /featured block -->
                    <!-- tags block -->
                    <div class="collapse-block">
                        <h4 class="collapse-block__title">POPULAR TAGS</h4>
                        <div class="collapse-block__content">
                            <ul class="tags-list">
                                <li><a href="#">Grey</a></li>
                                <li><a href="#">Shirt</a></li>
                                <li><a href="#">suit</a></li>
                                <li><a href="#">Dresses </a></li>
                                <li><a href="#">Outerwear</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /tags block -->
                </aside>
                <!-- /left column -->
                <!-- center column -->
                <aside class="col-md-8 col-lg-9 col-xl-10" id="centerColumn">
                    <div class="title-box">
                        <h1 class="text-center text-uppercase title-under">YOUR STORE</h1>
                    </div>
                    <!-- filters row -->
                    <div class="filters-row">
                        <div class="pull-left">
                            <div class="filters-row__mode">
                                <a href="#" class="btn btn--ys slide-column-open visible-xs visible-sm hidden-xl hidden-lg hidden-md">Filter</a>
                                <a class="filters-row__view active link-grid-view btn-img btn-img-view_module"><span></span></a>
                                <a class="filters-row__view link-row-view btn-img btn-img-view_list"><span></span></a>
                            </div>
                            <div class="filters-row__select hidden-sm hidden-xs">
                                <label>Sort by: </label>
                                <div class="select-wrapper">
                                    <select class="select--ys sort-position">
                                        <option value="null">Defult</option>
                                        <option <?php if ($sort == 'name') {
	echo "selected";
}
?> value="name">Name</option>
                                        <option <?php if ($sort == 'price') {
	echo "selected";
}
?> value="price">Price</option>
                                    </select>
                                </div>
                                <a href="#" class="sort-direction icon icon-arrow_back"></a>
                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="filters-row__items hidden-sm hidden-xs"><?php echo $total; ?> Item(s)</div>
                            <div class="filters-row__select hidden-sm hidden-xs">
                                <label>Show: </label>
                                <div class="select-wrapper">
                                    <select class="select--ys show-qty">
                                        <option>6</option>
                                        <option>12</option>
                                        <option>24</option>
                                    </select>
                                </div>
                                <a href="#" class="icon icon-arrow-down active"></a>
                                <a href="#" class="icon icon-arrow-up"></a>
                            </div>
                        </div>
                    </div>
                    <!-- /filters row -->
                    <div class="product-listing row">

                        <?php foreach ($products as $p) {?>
                        <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4 col-xl-one-fifth">
                            <!-- product -->
                            <div class="product product--zoom">
                                <div class="product__inside">
                                    <!-- product image -->
                                    <div class="product__inside__image">
                                        <a href="?mod=detail&code=<?php echo $p['code']; ?>"> <img src="../upload/<?php echo $p['image']; ?>" alt=""> </a>
                                        <!-- quick-view -->
                                        <a slug-code="<?php echo $p['code']; ?>" href="javascript:void(0)" class="quick-view-detail quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a>
                                        <!-- /quick-view -->
                                    </div>
                                    <!-- /product image -->
                                    <!-- product name -->
                                    <div class="product__inside__name">
                                        <h2><a class="p-name" href="?mod=detail&code=<?php echo $p['code']; ?>"><?php echo $p['name']; ?></a></h2>
                                    </div>
                                    <!-- /product name -->
                                    <!-- product description -->
                                    <!-- visible only in row-view mode -->
                                    <div class="product__inside__description row-mode-visible"> <?php echo $p['description']; ?> </div>
                                    <!-- /product description -->
                                    <!-- product price -->
                                    <div class="product__inside__price price-box"><?php echo number_format($p['price'], 0) . "&nbsp;₫"; ?></div>
                                    <!-- /product price -->
                                    <!-- product review -->
                                    <!-- visible only in row-view mode -->
                                    <div class="product__inside__review row-mode-visible">
                                        <div class="rating row-mode-visible"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
                                        <a href="#">1 Review(s)</a> <a href="#">Add Your Review</a>
                                    </div>
                                    <!-- /product review -->
                                    <div class="product__inside__hover">
                                        <!-- product info -->
                                        <div class="product__inside__info">
                                            <div class="product__inside__info__btns">
                                                <a href="javascript:void(0)" slug-code="<?php echo $p['code']; ?>" class="btn btn--ys btn--xl add-to-cart">
                                                    <span class="icon icon-shopping_basket"></span> Add to cart
                                                </a>
                                                <a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
                                                <a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
                                                <a slug-code="<?php echo $p['code']; ?>" href="javascript:void(0)" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="quick-view-detail icon icon-visibility"></span> Quick view</a>
                                            </div>
                                            <ul class="product__inside__info__link hidden-sm">
                                                <li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
                                                <li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
                                            </ul>
                                        </div>
                                        <!-- /product info -->
                                        <!-- product rating -->
                                        <div class="rating row-mode-hide"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
                                        <!-- /product rating -->
                                    </div>
                                </div>
                            </div>
                            <!-- /product -->
                        </div>
                    <?php }?>
                    </div>
                    <!-- filters row -->
                    <div class="filters-row">

                        <div class="pull-right">

                            <div class="filters-row__pagination">
                                <ul class="pagination">
                                    <?php
for ($i = 1; $i <= ceil($total / 12); $i++) {
	if ($page == $i) {
		?>
                                        <li class="current active"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
                                    <?php } else {?>
                                        <li><a href="javascript:void(0)"> <?php echo $i; ?></a></li>
                                    <?php }}?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /filters row -->
                </aside>
                <!-- center column -->
            </div>
            <!-- /two columns -->
        </div>
    </div>
    <!-- End CONTENT section -->
    <!-- FOOTER section -->

    <?php include 'layout/footer.php';?>

        <!-- Modal (quickViewModal) -->
        <div class="modal  modal--bg fade" id="quickViewModal">
            <div class="modal-dialog white-modal">
                <div class="modal-content container">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                    </div>
                    <!--  -->
                    <div class="product-popup">
                        <div class="product-popup-content">
                            <div class="container-fluid">
                                <div class="row product-info-outer">
                                    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
                                        <div class="product-main-image">
                                            <div class="product-main-image__item pro_image"><img src='../upload/product-big-1.jpg' alt="" /></div>
                                        </div>
                                    </div>
                                    <div class="product-info col-xs-12 col-sm-7 col-md-6 col-lg-6">
                                        <div class="wrapper">
                                            <div class="product-info__sku pull-left">Tác giả: <strong class="pro_aName"></strong></div>
                                            <div class="product-info__availabilitu pull-right">Nhà xuất bản:
                                                <strong class="color pro_pName"></strong></div>
                                        </div>
                                        <div class="product-info__title" >
                                            <h2 class="pro_name">Lorem ipsum dolor sit ctetur</h2>
                                        </div>
                                        <div class="price-box product-info__price"><span class="price-box__new pro_name">$65.00</span> </div>
                                        <div class="divider divider--xs product-info__divider"></div>
                                        <div class="product-info__description">
                                            <div class="product-info__description__brand"><img src="public/images/custom/brand.png" alt=""> </div>
                                            <div class="product-info__description__text pro_description">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                        </div>
                                        <div class="divider divider--xs product-info__divider"></div>
                                        <div class="divider divider--sm"></div>
                                        <div class="wrapper">
                                            <div class="pull-left"><span class="qty-label">Số lượng:</span></div>
                                            <div class="pull-left">
                                                <input type="number" min="1" name="quantity" class="input--ys qty-input pull-left" value="1">
                                            </div>
                                            <div class="pull-left">
                                                <button slug-code="" type="button" id="add-to-cart-modal" class="btn btn--ys btn--xxl"><span class="icon icon-shopping_basket"></span> Add to cart</button>
                                            </div>
                                        </div>
                                        <ul class="product-link">
                                            <li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
                                            <li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#"><span class="text">Add to compare</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / -->
                </div>
            </div>
        </div>
        <!-- / Modal (quickViewModal) -->
        <!-- modalAddToCart -->
        <div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
            <div class="modal-dialog white-modal modal-sm">
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            "<span id="cart-product-name"></span>" added to cart successfully!
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <a href="?mod=cart" class="btn btn--ys btn--full btn--lg">go to cart</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /modalAddToCart -->
        <script src="public/external/nouislider/nouislider.min.js"></script>
        <!-- Custom -->
        <script>
            var startVal = [<?php
echo isset($prices) ? $prices[0] : 0;
?>, <?php
echo isset($prices) ? $prices[1] : 500;
?>];
        </script>
        <script src="public/js/custom.js"></script>
        <script src="public/external/jquery/jquery-2.1.4.min.js"></script>
        <!-- Bootstrap 3-->
        <script src="public/external/bootstrap/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                if(localStorage.getItem('cart') === null) {
                    localStorage.setItem('cart', JSON.stringify([]));
                }
                $(document).on('click', '.add-to-cart', function() {
                    addToCart($(this).attr('slug-code'), 1);
                })
                $(document).on('click', '#add-to-cart-modal', function() {
                    addToCart($(this).attr('slug-code'),
                        parseInt($(this).parents('.product-info').find('input[name="quantity"]').val())
                        );
                })
                function addToCart(code, quantity) {
                    $.ajax({
                        url : '?mod=find-by-code&code=' + code,
                        method : 'get',
                        success : function(res) {
                            if(res) {
                                var product = JSON.parse(res);
                                var cart = JSON.parse(localStorage.getItem('cart'));
                                var check = 0;
                                cart.forEach(function(item){
                                    if(item.product.code === product.code) {
                                        item.quantity += quantity;
                                        check = 1;
                                    }
                                });
                                if (check === 0) {
                                    cart.push({
                                        "product" : product,
                                        "quantity" : quantity
                                    });
                                    $('#open-cart .badge--cart').text(cart.length);
                                }
                                localStorage.setItem('cart', JSON.stringify(cart));
                                $("#cart-product-name").text(product.name);
                                $('#modalAddToCart').modal('show');
                            }
                        },
                        error : function(err) {
                            console.log(err);
                        }
                    })
                }
                $(document).on('click', '.price-input button', function(){
                    replaceUrl(1);
                })
                $('.pagination').find('li').not('.current').click(function() {
                    $(this).parent().find('li.active').removeClass('active');
                    $(this).addClass('active');
                    replaceUrl($(this).children().text().trim());
                })
                $('.simple-list').find('li').click(function() {
                    $(this).parent().find('li.active').not(this).removeClass('active');
                    $(this).toggleClass('active');
                    replaceUrl(1);
                })
                $('.sort-position').change(function() {
                    replaceUrl(1);
                })
                function replaceUrl(page) {
                    var url = '?mod=shop';
                    $('.simple-list').find('li.active').children().each(function() {
                        url += '&' + $(this).attr('slug-name') + '=' +$(this).attr('slug-code');
                    })
                    if($('.sort-position').val() !== 'null') {
                        url += '&sort=' + $('.sort-position').val();
                    }
                    var minP = parseInt($('#priceMin').val());
                    var maxP = parseInt($('#priceMax').val());
                    if (minP === 0 && maxP === 500) {

                    } else {
                        url += '&price=' + minP + '-' + maxP;
                    }
                    if(page !== 1) {
                        url += '&page=' + page;
                    }
                    window.location.replace(url);
                }
                $(document).on('click', '.quick-view-detail', function(){
                    findDetailByCode($(this).attr('slug-code'));
                });

                function findDetailByCode(code) {
                    $('#add-to-cart-modal').parents('.product-info').find('input[name="quantity"]').val(1);
                    $.ajax({
                        url : '?mod=find-detail-by-code&code=' + code,
                        method : 'get',
                        success : function(res) {
                            if(res) {
                                var product = JSON.parse(res);
                                // $('#quickViewModal')
                                for (var key in product) {
                                    if (product.hasOwnProperty(key)) {
                                        if(key === 'image'){
                                            $('.pro_image img').attr('src', '../upload/' + product[key]);
                                        } else if (key === 'code'){
                                            $('#add-to-cart-modal').attr('slug-code', product[key]);
                                        } else if (key === 'quantity'){
                                            $('#add-to-cart-modal').parents('.product-info').find('input[name="quantity"]').attr('max', product[key]);
                                        } else
                                            $('.pro_' + key).text(product[key]);
                                    }
                                }
                                $('#quickViewModal').modal('show');
                            }
                        },
                        error : function(err) {
                            console.log(err);
                        }
                    })
                }
            });
        </script>
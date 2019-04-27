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
                <li><a href="?mod=shop">Shopping</a></li>
                <li class="active">Chi tiết</li>
            </ol>
        </div>
    </div>
    <!-- /breadcrumbs -->
    <!-- CONTENT section -->
    <div id="pageContent">
        <section class="content offset-top-0">
            <div class="container">
                <div class="row product-info-outer">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 hidden-xs">
                                <div class="product-main-image">
                                    <div class="product-main-image__item"><img class="product-zoom" src='../upload/<?php echo $product['image']; ?>' data-zoom-image="../upload/<?php echo $product['image']; ?>" alt="" /></div>
                                    <div class="product-main-image__zoom"></div>
                                </div>
                            </div>
                            <div class="product-info col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="wrapper hidden-xs">
                                    <div class="product-info__sku pull-left">Tác giả: <strong><?php echo $product['aName']; ?></strong></div>
                                    <div class="product-info__availability pull-right">Nhà cung cấp: <strong class="color"><?php echo $product['pName']; ?></strong></div>
                                </div>
                                <div class="product-info__title">
                                    <h2><?php echo $product['name']; ?></h2>
                                </div>
                                <div class="wrapper visible-xs">
                                    <div class="product-info__sku pull-left">Tác giả: <strong><?php echo $product['aName']; ?></strong></div>
                                    <div class="product-info__availability pull-right">Nhà cung cấp: <strong class="color"><?php echo $product['pName']; ?></strong></div>
                                </div>
                                <div class="price-box product-info__price"><span class="price-box__new"><?php echo number_format($product['price'], 0) . "&nbsp;₫"; ?></span> </div>
                                <div class="product-info__review">
                                    <div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
                                    <a href="#">1 Nhận xét(s)</a> <a href="#">Thêm nhận xét</a>
                                </div>
                                <div class="divider divider--xs product-info__divider hidden-xs"></div>
                                <div class="product-info__description hidden-xs">
                                    <div class="product-info__description__brand"><img src="public/images/custom/brand.png" alt="" /> </div>
                                    <div class="product-info__description__text"><?php echo $product['description']; ?>.</div>
                                </div>
                                <div class="divider divider--xs product-info__divider"></div>

                                <div class="divider divider--sm"></div>
                                <div class="wrapper">
                                    <div class="pull-left"><span class="qty-label">Số lượng:</span></div>
                                    <div class="pull-left">
                                        <!--  -->
                                        <div class="number input-counter">
                                            <span class="minus-btn"></span>
                                            <input type="text" name="quantity" value="1" size="5"  min="1" max="<?php echo $product['quantity']; ?>" />
                                            <span class="plus-btn"></span>
                                        </div>
                                        <!-- / -->
                                    </div>
                                    <div class="pull-left">
                                        <button type="button" slug-code="<?php echo $product['code']; ?>" id="add-to-cart-detail" class="btn btn--ys btn--xxl"><span class="icon icon-shopping_basket"></span> Add to cart</button>
                                    </div>
                                </div>
                                <ul class="product-link">
                                    <li class="text-right"><a href="#"><span class="icon icon-favorite_border  tooltip-link"></span><span class="text">Add to wishlist</span></a></li>
                                    <li class="text-left"><a href="#"><span class="icon icon-sort  tooltip-link"></span><span class="text">Add to compare</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs--ys1" role="tablist">
                                <li class="active"><a href="#Tab1" role="tab" data-toggle="tab" class="text-uppercase">DESCRIPTION</a></li>
                                <li><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase">Reviews</a></li>
                                <li><a href="#Tab3" role="tab" data-toggle="tab" class="text-uppercase">Tags</a></li>
                                <li><a href="#Tab4" role="tab" data-toggle="tab" class="text-uppercase">CUSTOM TAB</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tab-content--ys nav-stacked">
                                <div role="tabpanel" class="tab-pane active" id="Tab1">
                                    <p><?php echo $product['description']; ?>. </p>
                                    <div class="divider divider--md"></div>
                                    <table class="table table-params">
                                        <tbody>
                                            <tr>
                                                <td class="text-right"><span class="color">Tên sách</span></td>
                                                <td><?php echo $product['name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">Tác giả</span></td>
                                                <td><?php echo $product['aName']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">Thể loại</span></td>
                                                <td><?php echo $product['tName']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">Nhà cung cấp</span></td>
                                                <td><?php echo $product['pName']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">Đơn giá</span></td>
                                                <td><?php echo number_format($product['price'], 0) . "&nbsp;₫"; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="Tab2">
                                    <h5><strong class="color">CUSTOMER REVIEWS 1 ITEM(S)</strong></h5>
                                    <p> GREAT!</p>
                                    <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                    <div class="divider divider--xs"></div>
                                    <table class="table table-params">
                                        <tbody>
                                            <tr>
                                                <td class="text-right"><span class="color">QUALITY</span></td>
                                                <td>
                                                    <div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">PRICE</span></td>
                                                <td>
                                                    <div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">VALUE</span></td>
                                                <td>
                                                    <div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="color-light">Review by User / (posted on 16/9/2016)</p>
                                    <div class="divider divider--xs"></div>
                                    <h5><strong class="color">WRITE YOUR OWN REVIEW</strong></h5>
                                    <p><span class="color">YOU'RE REVIEWING:</span> Lorem ipsum dolor sit amet conse ctetur</p>
                                    <p><span class="color">HOW DO YOU RATE THIS PRODUCT?</span></p>
                                    <div class="divider divider--xs"></div>
                                    <div class="table-responsive">
                                        <table class="table table-params">
                                            <tbody>
                                                <tr>
                                                    <td class="text-right"></td>
                                                    <td class="text-center">
                                                        <div class="rating"><span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="rating"><span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="rating"><span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="rating"><span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="rating"><span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><span class="color">QUALITY</span></td>
                                                    <td class="text-center"><span class="icon-enable">&#x25cf;</span></td>
                                                    <td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
                                                    <td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
                                                    <td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
                                                    <td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><span class="color">PRICE</span></td>
                                                    <td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
                                                    <td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
                                                    <td class="text-center"><span class="icon-enable">&#x25cf;</span></td>
                                                    <td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
                                                    <td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><span class="color">VALUE</span></td>
                                                    <td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
                                                    <td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
                                                    <td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
                                                    <td class="text-center"><span class="icon-enable">&#x25cf;</span></td>
                                                    <td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="divider divider--xs"></div>
                                    <form action="#" class="contact-form">
                                        <label>Nickname<span class="required">*</span></label>
                                        <input type="text" class="input--ys input--ys--full">
                                        <label>Summary of Your Review<span class="required">*</span></label>
                                        <input type="text" class="input--ys input--ys--full">
                                        <label>Review<span class="required">*</span></label>
                                        <textarea class="textarea--ys input--ys--full"></textarea>
                                        <div class="divider divider--xs"></div>
                                        <button type="submit" class="btn btn--ys text-uppercase">Submit Review</button>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="Tab3">
                                    <h5><strong class="color">OTHER PEOPLE MARKED THIS PRODUCT WITH THESE TAGS:</strong></h5>
                                    <p>Pattern (1)</p>
                                    <div class="divider divider--xs"></div>
                                    <h5><strong class="color">ADD YOUR TAGS:</strong></h5>
                                    <form action="#" class="contact-form">
                                        <input type="text" class="input--ys input--ys--full">
                                        <p>Use spaces to separate tags. Use single quotes (') for phrases.</p>
                                        <div class="divider divider--xs"></div>
                                        <button type="submit" class="btn btn--ys">Add Tags</button>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="Tab4">
                                    <h5><strong class="color text-uppercase">Lorem ipsum dolor sit amet conse ctetur adipisicing elit</strong></h5>
                                    <div class="divider divider--xs"></div>
                                    <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. orem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <ul class="marker-list-circle">
                                        <li><span class="text-uppercase">Lorem ipsum dolor sit amet</span></li>
                                        <li><span class="text-uppercase">Conse ctetur adipisicing</span></li>
                                        <li><span class="text-uppercase">Elit sed do eiusmod tempor</span></li>
                                        <li><span class="text-uppercase">Incididunt ut laborev</span></li>
                                        <li><span class="text-uppercase">Et dolore magna aliqua</span></li>
                                        <li><span class="text-uppercase">Ut enim ad min</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products -->
        <section class="content">
            <div class="container">
                <!-- title -->
                <div class="title-with-button">
                    <div class="carousel-products__center pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
                    <h2 class="text-left text-uppercase title-under pull-left">Khách hàng cũng đặt mua</h2>
                </div>
                <!-- /title -->
                <!-- carousel -->
                <div class="carousel-products row" id="carouselRelated">
                    <?php foreach ($productRecommend as $pr) {?>

                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xl-one-six">
                        <!-- product -->
                        <div class="product">
                            <div class="product__inside">
                                <!-- product image -->
                                <div class="product__inside__image">
                                    <a href="#"> <img src="../upload/<?php echo $pr['image']; ?>" alt=""> </a>
                                </div>
                                <!-- /product image -->
                                <!-- product name -->
                                <div class="product__inside__name">
                                    <h2><a href="?mod=detail&code=<?php echo $pr['code']; ?>" class="p-name"> <?php echo $pr['name']; ?></a></h2>
                                </div>
                                <!-- /product name -->
                                <!-- product description -->
                                <!-- visible only in row-view mode -->
                                <div class="product__inside__description row-mode-visible"> <?php echo $pr['description']; ?>. </div>
                                <!-- /product description -->
                                <!-- product price -->
                                <div class="product__inside__price price-box"><?php echo number_format($pr['price'], 0) . "&nbsp;₫"; ?></div>
                                <!-- /product price -->
                                <!-- product review -->
                                <div class="product__inside__hover">
                                    <!-- product info -->
                                    <div class="product__inside__info">
                                        <div class="product__inside__info__btns"> <a slug-code="<?php echo $pr['code']; ?>" href="javascript:void(0)" class="btn btn--ys btn--xl add-to-cart"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                            <a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
                                            <a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
                                        </div>
                                        <ul class="product__inside__info__link hidden-xs">
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
                <!-- /carousel -->
            </div>
        </section>
        <!-- /related products -->
    </div>
    <!-- End CONTENT section -->
    <!-- FOOTER section -->
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
    <?php include 'layout/footer.php';?>

        <!-- END FOOTER section -->
        <script src="public/external/nouislider/nouislider.min.js"></script>
        <script src="public/external/elevatezoom/jquery.elevatezoom.js"></script>
        <!-- Custom -->
        <script src="public/js/custom.js"></script>
        <script src="public/js/js-product.js"></script>
        <script>
            $(document).ready(function () {
                $(document).on('click', '#add-to-cart-detail', function() {
                    addToCart($(this).attr('slug-code'),
                        parseInt($(this).parents('.wrapper').find('input[name="quantity"]').val()));
                })
                $(document).on('click', '.add-to-cart', function() {
                    addToCart($(this).attr('slug-code'), 1);
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
            })
        </script>
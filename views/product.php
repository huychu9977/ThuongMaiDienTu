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
                                    <div class="product-info__sku pull-left">Hãng: <strong><?php echo $product['b_name']; ?></strong></div>
                                    <div class="product-info__availability pull-right">Trạng thái: <strong class="color"><?php echo $product['pst_name']; ?></strong></div>
                                </div>
                                <div class="product-info__title">
                                    <h2><?php echo $product['name']; ?></h2>
                                </div>
                                <div class="wrapper visible-xs">
                                    <div class="product-info__sku pull-left">Hãng: <strong><?php echo $product['b_name']; ?></strong></div>
                                    <div class="product-info__availability pull-right">Trạng thái: <strong class="color"><?php echo $product['pst_name']; ?></strong></div>
                                </div>
                                <div class="price-box product-info__price"><span class="price-box__new"><?php echo number_format($product['price'], 0) . "&nbsp;₫"; ?></span> </div>
                                <div class="product-info__review">
                                    <div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
                                    <a href="#">1 Nhận xét(s)</a> <a href="#">Thêm nhận xét</a>
                                </div>
                                <div class="product-info__description hidden-xs">
                                    <table class="table table-params table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="text-right"><span class="color">Tên máy</span></td>
                                                <td><?php echo $product['name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">Đơn giá</span></td>
                                                <td><?php echo number_format($product['price'], 0) . "&nbsp;₫"; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">Màu</span></td>
                                                <td><?php echo $product['pc_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">Thể loại</span></td>
                                                <td><?php echo $product['t_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">Hãng sản xuất</span></td>
                                                <td><?php echo $product['b_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">RAM</span></td>
                                                <td><?php echo $product['pr_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">Hệ điều hành</span></td>
                                                <td><?php echo $product['pos_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">Dòng CPU</span></td>
                                                <td><?php echo $product['pu_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><span class="color">Kích thước màn hình</span></td>
                                                <td><?php echo $product['pss_name']; ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

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
                                        <button type="button" slug-code="<?php echo $product['code']; ?>" id="add-to-cart-detail" class="btn btn--ys btn--xxl"><span class="icon icon-shopping_basket"></span> Thêm vào giỏ</button>
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

                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tab-content--ys nav-stacked">
                                <div role="tabpanel" class="tab-pane active" id="Tab1">
                                    <p><?php echo $product['description']; ?>. </p>
                                    <div class="divider divider--md"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="Tab2">
                                    <h5><strong class="color">Đánh giá sản phẩm</strong></h5>
                                    <div class="review-list">

                                    </div>
                                    <div class="divider divider--xs"></div>
                                    <div class="filters-row pagination-reviews">
                                        <div class="pull-right">
                                            <div class="filters-row__pagination">
                                                <ul class="pagination">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['customer'])) {?>
                                    <form class="contact-form">

                                        <input type="hidden" name="product_id" value="<?=$product['id']?>">
                                        <input type="hidden" name="star_rate" value="0">
                                        <section class='rating-widget'>
                                            <label>Đánh giá</label>
                                          <!-- Rating Stars Box -->
                                          <div class='rating-stars text-center'>
                                            <ul id='stars'>
                                              <li class='star' title='Poor' data-value='1'>
                                                <i class='fa fa-star fa-fw'></i>
                                              </li>
                                              <li class='star' title='Fair' data-value='2'>
                                                <i class='fa fa-star fa-fw'></i>
                                              </li>
                                              <li class='star' title='Good' data-value='3'>
                                                <i class='fa fa-star fa-fw'></i>
                                              </li>
                                              <li class='star' title='Excellent' data-value='4'>
                                                <i class='fa fa-star fa-fw'></i>
                                              </li>
                                              <li class='star' title='WOW!!!' data-value='5'>
                                                <i class='fa fa-star fa-fw'></i>
                                              </li>
                                            </ul>
                                          </div>


                                        </section>
                                        <label>Tiêu đề<span class="required">*</span></label>
                                        <input required="" name="title" type="text" class="input--ys input--ys--full">
                                        <label>Nôị dung<span class="required">*</span></label>
                                        <textarea required="" name="content" class="textarea--ys input--ys--full"></textarea>
                                        <div class="divider divider--xs"></div>
                                        <button type="submit" class="btn btn--ys text-uppercase">Gửi đánh giá</button>
                                    </form>
                                <?php }?>
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
                                        <div class="product__inside__info__btns"> <a slug-code="<?php echo $pr['code']; ?>" href="javascript:void(0)" class="btn btn--ys btn--xl add-to-cart"><span class="icon icon-shopping_basket"></span> Thêm vào giỏ</a>
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
                            "<span id="cart-product-name"></span>" - đã được thêm vào giỏ!
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <a href="?mod=cart" class="btn btn--ys btn--full btn--lg">Xem giỏ hàng!</a>
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
        <script src="public/external/jquery/jquery-2.1.4.min.js"></script>
        <!-- Bootstrap 3-->
        <script src="public/external/bootstrap/bootstrap.min.js"></script>
        <script>
            var code = '<?=$product["code"]?>';
        </script>
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
                loadReviews(1);
                getRate();
                $('.contact-form').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        url : '?mod=add-review',
                        type : 'post',
                        data : $(this).serialize(),
                        success : function(res) {
                            if(res) {
                                if(JSON.parse(res) === true)
                                    loadReviews();
                            }
                        }
                    })
                })
                function loadReviews(page){
                    $.ajax({
                        url : '?mod=get-reviews&code=' + code + '&page=' + page,
                        type : 'get',
                        success : function(res){
                            if(res){
                                $('.review-list').children().remove();
                                var datax = JSON.parse(res);
                                var reviews = datax.data;
                                var total = datax.total;
                                reviews.forEach(function(r){
                                    var star = '';
                                    for (var i = 0; i < 5; i++) {
                                        if(i < parseInt(r.star_rate)){
                                            star += '<span class="icon-star"></span> ';
                                        } else {
                                            star += '<span class="icon-star empty-star"></span> ';
                                        }
                                        r.star_rate[i]
                                    }

                                    $('.review-list').append('<div class="item">'
                                        +'    <div class="product-col-1">'
                                        +'        <p class="image">'
                                        +'            <span class="avatar-letter">US</span>'
                                        +'        </p>'
                                        +'        <p class="name">'+r.name+'</p>'
                                        +'    </div>'
                                        +'    <div class="product-col-2">'
                                        +'        <div class="infomation">'
                                        +'            <p class="review">'+r.title+'</p>'
                                        +'            <div class="rating">'
                                        +'                <div>'
                                        +'                    <meta itemprop="ratingValue" content="3">'
                                        +'                </div>'
                                        +'                <p class="rating-content">'
                                        + star
                                        +'                </p>'
                                        +'            </div>'
                                        +'            <p class="buy-already">'+r.created_date+'</p>'
                                        +'            <div class="description js-description">'
                                        +'                <p class="review_detail" itemprop="reviewBody">'
                                        +'                    <span>'
                                        +'                    '+r.content+''
                                        +'                    <br>'
                                        +'                    </span>'
                                        +'                </p>'
                                        +'            </div>'
                                        +'        </div>'
                                        +'    </div>'
                                        +'</div>')
                                    $('.pagination-reviews ul').children().remove();
                                    for (var i = 1; i <= Math.ceil(total/3); i++) {
                                        var selected = '';
                                        if(page === i){
                                            selected = 'active';
                                        }
                                        $('.pagination-reviews ul').append('<li value="'+i+'" class="'+selected+'"><a href="javascript:void(0)"> '+i+'</a></li>');
                                    }
                                })
                            }
                        }
                    })
                }
                $(document).on('click', '.pagination-reviews ul li', function(){
                    var page = $(this).attr('value');
                    loadReviews(parseInt(page));
                })
                function getRate(){
                    /* 1. Visualizing things on Hover - See next part for action on click */
                    $('#stars li').on('mouseover', function () {
                        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                        // Now highlight all the stars that's not after the current hovered star
                        $(this).parent().children('li.star').each(function (e) {
                            if (e < onStar) {
                                $(this).addClass('hover');
                            } else {
                                $(this).removeClass('hover');
                            }
                        });

                    }).on('mouseout', function () {
                        $(this).parent().children('li.star').each(function (e) {
                            $(this).removeClass('hover');
                        });
                    });


                    /* 2. Action to perform on click */
                    $('#stars li').on('click', function () {
                        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                        var stars = $(this).parent().children('li.star');

                        for (i = 0; i < stars.length; i++) {
                            $(stars[i]).removeClass('selected');
                        }

                        for (i = 0; i < onStar; i++) {
                            $(stars[i]).addClass('selected');
                        }
                        // JUST RESPONSE (Not needed)
                        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                        $('input[name="star_rate"]').val(ratingValue);
                    });

                }
            })
        </script>

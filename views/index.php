<!-- include header -->
<?php include 'layout/header.php';?>
    <!-- End HEADER section -->
    <!-- Slider section -->
    <div class="content offset-top-0" id="slider">
        <!--
                #################################
                - THEMEPUNCH BANNER -
                #################################
                -->
        <!-- START REVOLUTION SLIDER 3.1 rev5 fullwidth mode -->
        <h2 class="hidden">Slider Section</h2>
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>

<?php foreach ($sliders as $key => $value) {?>
                    <!-- SLIDE -1 -->
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="Slide">
                        <!-- MAIN IMAGE -->
                        <img src="../upload/<?=$value['image']?>" alt="slide<?=($key + 1)?>" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- TEXT -->
                        <div class="tp-caption lfl stb" data-x="205" data-y="center" data-voffset="60" data-speed="600" data-start="900" data-easing="Power4.easeOut" data-endeasing="Power4.easeIn" style="z-index: 2;">

                            <div class="tp-caption1--wd-2"><?=$value['title']?></div>
                            <div class="tp-caption1--wd-3"><?=$value['content']?> </div>
                            <a href="?mod=shop" class="link-button button--border-thick" data-text="Shop now!">Mua ngay!</a>
                        </div>
                    </li>
                    <!-- /SLIDE -1 -->
<?php }?>




                </ul>
            </div>
        </div>
    </div>
    <!-- END REVOLUTION SLIDER -->
    <!-- CONTENT section -->
    <div id="pageContent">

        <!-- featured products -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-8">
                        <!-- title -->
                        <div class="title-box">
                            <h2 class="text-center text-uppercase title-under">Sản phẩm mới nhất</h2>
                        </div>
                        <!-- /title -->
                        <div class="product-listing carousel-products-mobile row">
                           <?php foreach ($products_hot as $key => $value) {?>
                            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                <!-- product -->
                                <div class="product product--zoom">
                                    <div class="product__inside">
                                        <!-- product image -->
                                        <div class="product__inside__image">
                                            <a href="?mod=detail&code=<?php echo $value['code']; ?>"> <img src="../upload/<?=$value['image']?>" alt=""> </a>
                                            <!-- quick-view -->
                                            <a slug-code="<?php echo $value['code']; ?>" href="javascript:void(0)" class="quick-view-detail quick-view"><b><span class="icon icon-visibility"></span> Xem ngay</b> </a>
                                            <!-- /quick-view -->
                                        </div>
                                        <!-- /product image -->
                                        <!-- product name -->
                                        <div class="product__inside__name">
                                            <h2 style="line-height: 1.3em;" class="p-name"><a href="?mod=detail&code=<?php echo $value['code']; ?>"><?=$value['name']?></a></h2>
                                        </div>
                                        <!-- /product name -->
                                        <!-- product description -->
                                        <!-- visible only in row-view mode -->
                                        <div class="product__inside__description row-mode-visible"> Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </div>
                                        <!-- /product description -->
                                        <!-- product price -->
                                        <div class="product__inside__price price-box"><?php echo number_format($value['price'], 0) . "&nbsp;₫"; ?></div>
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
                                                    <a href="javascript:void(0)" slug-code="<?php echo $value['code']; ?>" class="btn btn--ys btn--xl add-to-cart">
                                                    <span class="icon icon-shopping_basket"></span> Thêm vào giỏ
                                                </a>
                                                    <a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
                                                    <a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
                                                    <a slug-code="<?php echo $value['code']; ?>" href="javascript:void(0)" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="quick-view-detail icon icon-visibility"></span> Xem ngay</a>
                                                </div>
                                                <ul class="product__inside__info__link hidden-xs">
                                                    <li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Thêm vào ua thích</span></a></li>
                                                    <li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Thêm d? so sánh</span></a></li>
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
                    </div>
                    <!-- lookbook -->
                    <div class="col-xl-4 visible-xl">
                        <!-- title -->
                        <div class="title-box">
                            <h2 class="text-left text-uppercase title-under pull-left">LOOKBOOK</h2>
                        </div>
                        <!-- /title -->

                        <a class="link-img-hover" href="lookbook.html"><img src="public/images/custom/lookbook.jpg" class="img-responsive" alt=""></a>

                    </div>
                    <!-- /lookbook -->
                </div>
            </div>
        </div>
        <!-- banners -->
        <div class="content fullwidth indent-col-none">
            <div class="container">
                <div class="row">
                    <div class="banner-carousel">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <a href="?mod=shop" class="banner zoom-in">
                                <span class="figure">
                                    <img src="public/images/custom/banner-01.jpg" alt=""/>
                                    <span class="figcaption">
                                        <span class="block-table">
                                            <span class="block-table-cell">
                                                <span class="banner__title size3">ASUS</span>
                                <span class="text">Giảm giá</span>
                                <span class="text size3">Tới 20%</span>
                                </span>
                                </span>
                                </span>
                                </span>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <a href="?mod=shop" class="banner zoom-in">
                                <span class="figure">
                                        <img src="public/images/custom/banner-02.jpg" alt=""/>
                                        <span class="figcaption">
                                            <span class="block-table">
                                                <span class="block-table-cell">
                                                    <span class="banner__title size3-1">Giảm giá 15%</span>
                                <span class="text size1"><em>Các mẫu laptop mới</em></span>
                                <span class="btn btn--ys btn--xl">Mua ngay!</span>
                                </span>
                                </span>
                                </span>
                                </span>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <a href="?mod=shop" class="banner zoom-in">
                                <span class="figure">
                                        <img src="public/images/custom/banner-03.jpg" alt=""/>
                                        <span class="figcaption">
                                            <span class="block-table">
                                                <span class="block-table-cell">
                                                    <span class="banner__title size4">Mẫu LAPTOP<br></span>
                                <span class="text size2"><em>Được ưa chuộng</em></span>
                                <span class="btn btn--ys btn--xl offset-top">Mua ngay!</span>
                                </span>
                                </span>
                                </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /banners -->
        <!-- news & sale products -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <!-- title -->
                        <div class="title-with-button">
                            <div class="carousel-products__button pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
                            <h2 class="text-left text-uppercase title-under pull-left">Sản phẩm mới nhất</h2>
                        </div>
                        <!-- /title -->
                        <!-- carousel -->
                        <div class="carousel-products row" id="carouselNew">
                            <?php foreach ($products_new as $key => $value) {?>
                                <div class="col-lg-3">
                                <!-- product -->
                                <div class="product">
                                    <div class="product__inside">
                                        <!-- product image -->
                                        <div class="product__inside__image">
                                            <a href="?mod=detail&code=<?php echo $value['code']; ?>"> <img src="../upload/<?php echo $value['image'] ?>"></a>
                                            <!-- quick-view -->
                                            <a slug-code="<?php echo $value['code']; ?>" href="javascript:void(0)" class="quick-view-detail quick-view"><b><span class="icon icon-visibility"></span> Xem ngay</b> </a>
                                            <!-- /quick-view -->
                                        </div>
                                        <!-- /product image -->
                                        <!-- label news -->
                                        <div class="product__label product__label--right product__label--new"> <span>Mới</span> </div>
                                        <!-- /label news -->
                                        <!-- product name -->
                                        <div class="product__inside__name">
                                            <h2 style="line-height: 1.3em;" class="p-name"><a href="?mod=detail&code=<?php echo $value['code']; ?>"><?php echo $value['name']; ?></a></h2>
                                        </div>
                                        <!-- /product name -->
                                        <!-- product price -->
                                        <div class="product__inside__price price-box"><?php echo number_format($value['price'], 0) . "&nbsp;₫"; ?></div>
                                        <!-- /product price -->
                                        <div class="product__inside__hover">
                                            <!-- product info -->
                                            <div class="product__inside__info">
                                                <div class="product__inside__info__btns"> <a href="javascript:void(0)" slug-code="<?php echo $value['code']; ?>" class="btn btn--ys btn--xl add-to-cart">
                                                    <span class="icon icon-shopping_basket"></span> Thêm vào giỏ
                                                </a>
                                                    <a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
                                                    <a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
                                                    <a slug-code="<?php echo $p['code']; ?>" href="javascript:void(0)" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="quick-view-detail icon icon-visibility"></span> Xem ngay</a>
                                                </div>
                                                <ul class="product__inside__info__link hidden-xs">
                                                    <li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Thêm vào uu thích</span></a></li>
                                                    <li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Thêm dể so sánh</span></a></li>
                                                </ul>
                                            </div>
                                            <!-- /product info -->
                                            <!-- product rating -->
                                            <div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
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
                    <!-- promo -->
                    <div class="col-xl-4 visible-xl">
                        <!-- title -->
                        <div class="title-box">
                            <h2 class="text-left text-uppercase title-under pull-left">PROMOS</h2>
                        </div>
                        <!-- /title -->
                        <div class="text-center promos">

                            <div class="promos__image">
                                <a href="lookbook.html" class="link-img-hover">
                                    <img src="public/images/custom/lap2.jpg" class="img-responsive" alt="">
                                    <span class="promos__label">-20%</span>
                                </a>
                            </div>
                            <h2><a href="lookbook.html">Lap ASUS</a></h2> Dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet, nunc. Ut sit amet turpis.
                        </div>
                    </div>
                    <!-- /promo -->

                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="divider--lg visible-sm visible-xs"></div>
                        <!-- title -->
                        <div class="title-with-button">
                            <div class="carousel-products__button pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
                            <h2 class="text-left text-uppercase title-under pull-left">Sản phẩm giảm giá</h2>
                        </div>
                        <!-- /title -->
                        <!-- carousel -->
                        <div class="carousel-products row" id="carouselSale">
                            <?php foreach ($products_sale as $key => $value) {?>
                                <div class="col-lg-3">
                                <!-- product -->
                                <div class="product">
                                    <div class="product__inside">
                                        <!-- product image -->
                                        <div class="product__inside__image">
                                            <a href="?mod=detail&code=<?php echo $value['code']; ?>"> <img src="../upload/<?php echo $value['image'] ?>"> </a>
                                            <!-- quick-view -->
                                            <a slug-code="<?php echo $value['code']; ?>" href="javascript:void(0)" class="quick-view-detail quick-view"><b><span class="icon icon-visibility"></span> Xem ngay</b> </a>
                                            <!-- /quick-view -->
                                        </div>
                                        <!-- /product image -->
                                         <?php if ($value['sale_percent'] != null) {?>
                                        <!-- lable sale -->
                                        <div class="product__label product__label--left product__label--sale">
                                            <span>Sale<br>
                                                    -<?=$value['sale_percent']?>%</span>
                                        </div>
                                        <!-- /lable sale -->
                                        <?php }?>
                                        <!-- product name -->
                                        <div class="product__inside__name">
                                            <h2 style="line-height: 1.3em;" class="p-name"><a href="?mod=detail&code=<?php echo $value['code']; ?>"><?php echo $value['name'] ?></a></h2>
                                        </div>
                                        <!-- /product name -->
                                        <!-- product price -->
                                        <div class="product__inside__price price-box"><?php echo number_format($value['price'] - $value['price'] * ($value['sale_percent'] / 100), 0) . "&nbsp;₫"; ?><span class="price-box__old"><?php echo number_format($value['price'], 0) . "&nbsp;₫"; ?></span></div>
                                        <!-- /product price -->
                                        <div class="product__inside__hover">
                                            <!-- product info -->
                                            <div class="product__inside__info">
                                                <div class="product__inside__info__btns">
                                                    <a href="javascript:void(0)" slug-code="<?php echo $value['code']; ?>" class="btn btn--ys btn--xl add-to-cart">
                                                    <span class="icon icon-shopping_basket"></span> Thêm vào giỏ
                                                </a>
                                                    <a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
                                                    <a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
                                                    <a slug-code="<?php echo $p['code']; ?>" href="javascript:void(0)" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="quick-view-detail icon icon-visibility"></span> Xem ngay</a>
                                                </div>
                                                <ul class="product__inside__info__link hidden-xs">
                                                    <li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
                                                    <li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
                                                </ul>
                                            </div>
                                            <!-- /product info -->
                                            <!-- product rating -->
                                            <div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
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
                </div>
            </div>
        </div>
        <!-- /news & sale products -->
        <!-- blog slider -->
        <div class="content content-bg-1 fixed-bg">
            <div class="container">
                <div class="row">
                    <h2 class="text-center text-uppercase title-under">Một số hãng</h2>
                    <div class="slider-blog slick-arrow-bottom">
                        <!-- slide-->
                        <a href="blog-post-right-column.html" class="link-hover-block">
                            <div class="slider-blog__item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-2 col-sm-offset-3 box-foto">
                                        <img src="../upload/acer1.jpg" alt="">
                                    </div>
                                    <div class="col-xs-12 col-sm-5 col-xl-4 box-data">
                                        <h6>Dell  <em>&nbsp;-&nbsp;  i7</em></h6>
                                        <p>
                                       <p></p>Bộ vi xử lý Intel Core™ i7 8565U (1.8Ghz, 8MB Cache)
                                        Chipset Intel.
                                        Bộ nhớ trong 8GB DDR4 2666MHz.
                                        VGA Nvidia Geforce MX130 2G DDR5.
                                        Ổ cứng 1TB 5400rpm + 128GB M.2 PCIe NVMe SSD.
                                        Ổ quang No.
                                        Card Reader Yes.
                                        Bảo mật, công nghệ  Finger Print.
                                        Màn hình 14.0” FHD (1920 * 1080), LED backlight.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- /slide-->
                        <!-- slide-->
                        <a href="blog-post-right-column.html" class="link-hover-block">
                            <div class="slider-blog__item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-2 col-sm-offset-3 box-foto">
                                        <img src="../upload/laptop_lg_14z980-g.ah52a5_i5-8250u_b_c_-1_1.jpg" alt="">
                                    </div>
                                    <div class="col-xs-12 col-sm-5 box-data">
                                        <h6>ASUS  <em>&nbsp;-&nbsp;  G Gaming</em></h6>
                                        <p>
                                            CPU: AMD Ryzen 5-3550H (2.10 upto 3.70GHz, 4 nhân 8 lu?ng, 4MB) / Ram: 8GB DDR4 2666MHz (2x SO-DIMM socket, up to 32GB SDRAM) / Ổ cứng: 512GB SSD M.2 PCIE G3X2 / VGA: AMD Radeon™ RX560X 4GB DDR5 / Display: 17.3" FHD (1920 x 1080) IPS, 60Hz, Wide View, 200nits, Narrow Bezel, Anti-Glare with 45% NTSC  / Weight: 2.7kg / Pin: 4 Cell , 48 Whr / OS: Windows 10 Home
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- /slide-->
                        <!-- slide-->
                        <!-- thêm slider m?u sp Mới-->
                        <a href="blog-post-right-column.html" class="link-hover-block">
                            <div class="slider-blog__item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-2 col-sm-offset-3 box-foto">
                                        <img src="../upload/1_37_3.jpg" alt="">
                                    </div>
                                    <div class="col-xs-12 col-sm-5 box-data">
                                        <h6>Macbook   <em>&nbsp;-&nbsp;  Pro MPXQ2 128Gb (2017) </em></h6>
                                        <p>
                                            CPU:Core i5 7360U.
                                            RAM/ HDD: 8Gb/ 128Gb SSD.
                                            Màn hình: 13.3Inch.
                                            VGA:  VGA onboard, Iris Plus Graphics 640.
                                            HÐH:  Mac OS X 10.12.5.
                                            Màu sắc/ Chất liệu:Space Gray.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- /slide-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /blog slider -->
        <!-- recent-posts-carousel -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- title -->
                        <div class="title-with-button">
                            <div class="carousel-products__button pull-right">
                                <span class="btn-prev"></span>
                                <span class="btn-next"></span>
                            </div>
                            <h2 class="text-center text-uppercase title-under">Sản phẩm HOT</h2>
                        </div>
                        <!-- /title -->
                        <!-- carousel-new -->
                        <div class="carousel-products row" id="postsCarousel">
                            <!-- slide-->
                            <?php foreach ($products_hot as $key => $value) {?>
                             <div class="col-sm-3 col-xl-6">
                                <!--  -->
                                <div class="recent-post-box">
                                    <div class="col-lg-12 col-xl-6">
                                        <a href="blog-post-right-column.html">
                                            <span class="figure">
                                                    <img src="../upload/<?php echo $value['image'] ?>" alt="">
                                                    <span class="figcaption label-top-left">
                                                        <span>
                                                            <b>26</b>
                                                            <em>jun</em>
                                                        </span>
                                            </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="recent-post-box__text">
                                            <h4 style="font-size: unset;" class="p-name"><a href="?mod=detail&code=<?=$value['code']?>"><?php echo $value['name']; ?></a></h4>
                                            <div class="author">by <b>Admin</b></div>

                                            <a class="link-commet" href="blog-post-right-column.html"><span class="icon icon-message "></span><span class="number">0</span> comment(s)</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- / -->
                            </div>
                             <?php }?>
                        </div>
                        <!-- /carousel-new -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /recent-posts-carousel -->
        <!-- brands-carousel -->
        <div class="content section-indent-bottom">
            <div class="container">
                <div class="row">
                    <div class="brands-carousel">
                        <div>
                            <a href="#"><img src="public/images/custom/brand-01.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-02.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-03.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-04.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-05.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-06.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-07.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-08.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-09.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-10.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-01.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-02.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-03.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-04.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-05.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-06.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-07.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-08.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-09.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="public/images/custom/brand-10.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /brands-carousel -->
        <div class="content fullwidth hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="instafeed-wrapper">
                        <h3 class="title-vertical"><span>INSTAGRAM FEED</span></h3>
                        <div id="instafeed" class="instafeed"></div>
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
<!-- Bootstrap 3-->
<script src="public/external/bootstrap/bootstrap.min.js"></script>
<script src="public/external/slick/slick.min.js"></script>
<script src="public/external/countdown/jquery.plugin.min.js"></script>
<script src="public/external/colorbox/jquery.colorbox-min.js"></script>
<script src="public/external/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="public/external/countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="public/external/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="public/external/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <!-- END FOOTER section -->
        <div id="productQuickView" class="white-popup mfp-hide">
            <h1>Modal dialog</h1>
            <p>You won't be able to dismiss this by usual means (escape or click button), but you can close it programatically based on user choices or actions.
            </p>
        </div>
        <!-- Button trigger modal -->

        <!--================== modal ==================-->
        <!-- modalAddToCart -->
        <div class="modal  fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
            <div class="modal-dialog white-modal modal-sm">
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            "Mauris lacinia lectus" added to cart successfully!
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <a href="?mod=cart" class="btn btn--ys btn--full btn--lg">Xem giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /modalAddToCart -->
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
                                            <div class="product-info__sku pull-left">Hãng : <strong class="pro_b_name"></strong></div>
                                            <div class="product-info__availabilitu pull-right">Trạng thái:
                                                <strong class="color pro_pst_name"></strong></div>
                                        </div>
                                        <div class="product-info__title" >
                                            <h2 class="pro_name">Lorem ipsum dolor sit ctetur</h2>
                                        </div>
                                        <div class="product-info__description">
                                            <table class="table table-params table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-right"><span class="color">Đơn giá</span></td>
                                                        <td class="pro_price"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><span class="color">Màu</span></td>
                                                        <td class="pro_pc_name"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><span class="color">Thể loại</span></td>
                                                        <td class="pro_t_name"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><span class="color">RAM</span></td>
                                                        <td class="pro_pr_name"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><span class="color">Hệ điều hành</span></td>
                                                        <td class="pro_pos_name"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><span class="color">Dòng CPU</span></td>
                                                        <td class="pro_pu_name"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="divider divider--sm"></div>
                                        <div class="wrapper">
                                            <div class="pull-left"><span class="qty-label">Số lượng:</span></div>
                                            <div class="pull-left">
                                                <input type="number" min="1" name="quantity" class="input--ys qty-input pull-left" value="1">
                                            </div>
                                            <div class="pull-left">
                                                <button slug-code="" type="button" id="add-to-cart-modal" class="btn btn--ys btn--xxl"><span class="icon icon-shopping_basket"></span>Thêm vào giỏ</button>
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

        <!-- Modal (newsletter) -->

        <!-- Custom -->
        <script src="public/js/custom.js"></script>
        <script src="public/js/js-index-01.js"></script>
<script>
    $(document).ready(function () {
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
                                if(parseInt(product.quantity) > quantity) {
                                    var cart = JSON.parse(localStorage.getItem('cart'));
                                    var check = 0;
                                    cart.forEach(function(item){
                                        if(item.product.code === product.code) {
                                            item.quantity += quantity;
                                            if(parseInt(product.quantity) < item.quantity){
                                                item.quantity -= quantity;
                                                alert('Bạn đã có '+item.quantity+' sp trong giỏ! \nChỉ có thể mua thêm tối đa ' +(product.quantity - item.quantity)+ ' sản phẩm!');
                                                check = 2;
                                            } else
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
                                    if(check !== 2){
                                        localStorage.setItem('cart', JSON.stringify(cart));
                                        $("#cart-product-name").text(product.name);
                                        $('#modalAddToCart').modal('show');
                                    }

                                } else {
                                    alert('Chỉ có thể mua tối đa ' +product.quantity+ ' sản phẩm!');
                                }
                            }
                        },
                        error : function(err) {
                            console.log(err);
                        }
                    })
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
                                        } else if (key === 'price'){
                                            $('.pro_' + key).text(fomatVND(product[key]));
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
                function fomatVND(input) {
                    return input.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                }
    })
</script>
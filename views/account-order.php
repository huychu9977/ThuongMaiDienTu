<!-- include header -->
<?php include('layout/header.php'); ?>
    <!-- End HEADER section -->
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb--ys pull-left">
                <li class="home-link">
                    <a href="index.html" class="icon icon-home"></a>
                </li>
                <li class="active">Account</li>
            </ol>
        </div>
    </div>
    <!-- /breadcrumbs -->
    <!-- CONTENT section -->
    <div id="pageContent">
        <div class="container">
            <!-- title -->
            <div class="title-box">
                <h1 class="text-center text-uppercase title-under">THÔNG TIN CÁ NHÂN</h1>
            </div>
            <!-- /title -->
            <!--  -->

            <h4 class="text-uppercase">Tài khoản</h4>
            <hr>
            <h4 class="text-uppercase">Lịch sử đặt hàng</h4>
            <table class="table-order-history">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày lập</th>
                        <th>Trạng thái xử lý</th>
                        <th>Chi nhánh</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $order){ ?>
                    <tr>
                        <td>
                            <div class="th-title visible-xs">Order</div><a class="view-order-detail" slug-code="<?php echo $order['code'];?>" href="javascript:void(0)"><?php echo $order['code'];?></a></td>
                        <td>
                            <div class="th-title visible-xs">Date</div><?php echo $order['created_date']->format('Y-m-d H:i:s');?></td>
                        <td>
                            <div class="th-title visible-xs">Payment Status</div>
                            <?php 
                                switch ($order['status']) {
                                    case 1:
                                         echo "Đang xử lý!";
                                         break;
                                    case 2:
                                         echo "Đang vận chuyển!";
                                         break;
                                    case 3:
                                         echo "Đã thanh toán & chờ nhận hàng!";
                                         break;
                                    case 4:
                                         echo "Đã hoàn thành!";
                                         break;
                                     default:
                                         echo "Lỗi!";
                                         break;
                                 } 
                            ?>
                        </td>
                        <td>
                            <div class="th-title visible-xs">Fulfillment Status</div>
                            <?php echo $order['location'];?>
                        </td>
                        <td>
                            <div class="th-title visible-xs">Total</div><?php echo number_format($order['total_price'], 0) . "&nbsp;₫"; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <h4 class="text-uppercase">Chi tiết tài khoản</h4>
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-5">
                    <table class="table table-params">
                        <tbody>
                            <tr>
                                <td class="text-right color-dark"><b>Họ tên:</b></td>
                                <td><?php echo $_SESSION['customer']['name'];?></td>
                            </tr>
                            <tr>
                                <td class="text-right color-dark"><b>E-mail:</b></td>
                                <td><a href="mailto:<?php echo $_SESSION['customer']['email'];?>"><?php echo $_SESSION['customer']['email'];?></a></td>
                            </tr>
                            <tr>
                                <td class="text-right color-dark"><b>Địa chỉ:</b></td>
                                <td><?php echo $_SESSION['customer']['address'];?>,
                                    <br> Việt Nam</td>
                            </tr>
                            <tr>
                                <td class="text-right color-dark"><b>Số điện thoại:</b></td>
                                <td><?php echo $_SESSION['customer']['phone'];?></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="?mod=shop" class="btn btn--ys">Đặt mua sản phẩm ?</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal  modal--lg fade" id="orderDetail">
            <div class="modal-dialog white-modal">
                <div class="modal-content container">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                    </div>
                    <!--  -->
                    <div class="product-popup">
                        <div class="product-popup-content">
                            <div class="container-fluid">
                                <div class="title-box">
                                    <h3 class="text-center text-uppercase title-under">CHI TIẾT HÓA ĐƠN: <span class="color" id="orderCode"></span></h3>
                                </div>
                                <table class="table-order-history">
                                    <thead>
                                        <tr>
                                            <th>Tên sách</th>
                                            <th>Đơn giá</th>
                                            <th>Đã mua</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- / -->
                </div>
            </div>
        </div>
    <?php include('layout/footer.php'); ?>
<!-- jQuery 1.10.1-->
<script src="public/external/jquery/jquery-2.1.4.min.js"></script>
<!-- Bootstrap 3-->
<script src="public/external/bootstrap/bootstrap.min.js"></script>
<!-- Specific Page External Plugins -->
<script src="public/external/slick/slick.min.js"></script>
<script src="public/external/bootstrap-select/bootstrap-select.min.js"></script>
<script src="public/external/countdown/jquery.plugin.min.js"></script>
<script src="public/external/countdown/jquery.countdown.min.js"></script>
<script src="public/external/instafeed/instafeed.min.js"></script>
<script src="public/external/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="public/external/isotope/isotope.pkgd.min.js"></script>
<script src="public/external/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="public/external/colorbox/jquery.colorbox-min.js"></script>
        <!-- Custom -->
        <script src="public/js/custom.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.view-order-detail', function(){
                var code = $(this).attr('slug-code');
                $.ajax({
                    url : '?mod=find-order-detail&code=' + code,
                    type : 'get',
                    success : function(res) {
                        if(res) {
                            var data = JSON.parse(res);
                            $('#orderDetail tbody').children().remove();
                            data.forEach(function(od) {
                                $('#orderDetail tbody').append(
                                    '<tr><td>'+od.name+'</td>'
                                    +'<td>'+fomatVND(od.price)+'</td>'
                                    +'<td>'+od.quantity+'</td>'
                                    +'<td>'+fomatVND(od.total_price)+'</td></tr>'
                                    );
                            });
                            $('#orderCode').text(code);
                            $('#orderDetail').modal('show');
                        }
                    }, error: function(err) {console.log(err);}
                })
            });
            function fomatVND(input) {
            return input.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
        }
        })
    </script>
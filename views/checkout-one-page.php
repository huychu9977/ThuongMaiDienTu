<!-- include header -->
<?php include 'layout/header.php';?>
    <!-- End HEADER section -->
		<!-- breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<ol class="breadcrumb breadcrumb--ys pull-left">
					<li class="home-link"><a href="?mod=home" class="icon icon-home"></a></li>
					<li><a href="?mod=cart">Giỏ hàng</a></li>
					<li class="active">Thanh toán</li>
				</ol>
			</div>
		</div>
		<!-- /breadcrumbs -->
		<!-- CONTENT section -->
		<div id="pageContent">
			<div class="container">
				<!-- title -->
				<div class="title-box">
					<h1 class="text-center text-uppercase title-under">Thanh toán</h1>
				</div>
				<!-- /title -->
				<div class="row">
				</div>
				<hr>
				<div class="row">
					<!--================= col-left =================-->
					<div class="col-md-12 col-lg-4 panel-cart">
						<!-- NAME & ADDRESS -->
						<h2 class="title-checkout">
							<span class="icon icon-person icon-large color"></span>
							Thông tin giao hàng
						</h2>
						<?php if ($shipInfo != null) {?>
						<div class="panel panel-default cart ship-info1">
			                <div class="panel-body">
			                    <div class="order">
			                        <span class="title">Địa chỉ giao hàng</span>
			                        <a href="javascript:void(0)" class="btn btn-default btn-custom1 edit1">Sửa</a>
			                    </div>
			                    <div class="information">
			                        <h6><?php echo $shipInfo['name']; ?></h6>
			                        <p class="end">
			                        	<b>Địa chỉ:</b>
			                        	<?php echo $shipInfo['address']; ?>,
			                        	<?php echo $shipInfo['v_name']; ?>,
			                        	<?php echo $shipInfo['d_name']; ?>,
			                        	<?php echo $shipInfo['c_name']; ?>


			                        	<br><b>Việt Nam</b>
			                        	<br><b>Điện thoại:</b> <?php echo $shipInfo['phone']; ?>
			                        </p>
			                    </div>
			                </div>
			            </div>
			            <?php }?>

			            <div class="panel panel-default cart <?php if ($shipInfo != null) {echo "ship-info1 an-hien";}?>">
			            <?php if (!isset($_SESSION['customer'])) {?>
			            	<div class="row">
			            		<a href="?mod=login&next-page=checkout">Đăng nhập nếu bạn đã là thành viên?</a>
			            	</div>
			            <?php }?>
			                <div class="panel-body">
								<form class="ship-info" action="?mod=update-ship-info" method="post">
									<div class="row">
										<div class="col-md-12 col-lg-12 col-xl-6">
											<div class="form-group">
											    <label for="checkoutFormFirstName">Họ Tên <sup>*</sup></label>
											    <input type="text" name="name" value="<?php echo $shipInfo['name']; ?>" class="form-control" id="checkoutFormFirstName" required="">
											    <span class="note"></span>
											</div>
											<div class="form-group">
											    <label for="checkoutFormCompany">Số điện thoại<sup>*</sup></label>
											    <input type="text" name="phone" value="<?php echo $shipInfo['phone']; ?>" class="form-control" id="checkoutFormCompany" required="">
											    <span class="note"></span>
											</div>
										</div>
									</div>

									<div class="form-group">
									    <label for="checkoutFormAddress12">Email nhận hóa đơn<sup>*</sup></label>
									    <input type="email" class="form-control" name="email" value="<?php echo $shipInfo['email']; ?>" id="checkoutFormAddress12" required="">
									    <span class="note"></span>
									</div>
									<div class="form-group">
									    <label for="checkoutFormAddress13">Thành phố<sup>*</sup></label>
									    <select class="form-control" name="city_code" id="checkoutFormAddress13" required="">
									    	<option value="xx">--Chọn thành phố--</option>
											<?php foreach ($cities as $value) {
	$class = $value['code'] == $shipInfo['c_code'] ? 'selected' : "";
	echo "<option " . $class . " value=" . $value['code'] . ">" . $value['name'] . "</option>";
}?>

									    </select>
									    <span class="note"></span>
									</div>

									<div class="form-group">
									    <label for="checkoutFormAddress14">Quận/Huyện<sup>*</sup></label>
									    <select class="form-control" name="district_code" id="checkoutFormAddress14" required="">
										<?php if ($shipInfo['c_code'] != null) {
	foreach ($districts as $key => $value) {
		?>
											<option <?php if ($value['code'] == $shipInfo['d_code']) {
			echo "selected";
		}?> value="<?=$value['code']?>"><?=$value['name']?></option>
										<?php }}?>
									    </select>
									    <span class="note"></span>
									</div>
									<div class="form-group">
									    <label for="checkoutFormAddress15">Phường/Xã<sup>*</sup></label>
									    <select class="form-control" name="village_code" id="checkoutFormAddress15" required="">
<?php if ($shipInfo['d_code'] != null) {
	foreach ($villages as $key => $value) {
		?>
											<option <?php if ($value['code'] == $shipInfo['village_code']) {
			echo "selected";
		}?> value="<?=$value['code']?>"><?=$value['name']?></option>
										<?php }}?>
									    </select>
									    <span class="note"></span>
									</div>
									<div class="form-group">
									    <label for="checkoutFormAddress11">Địa chỉ <sup>*</sup></label>
									    <textarea class="form-control" name="address" id="checkoutFormAddress11" required=""><?php echo $shipInfo['address']; ?></textarea>
									    <span class="note"></span>
									</div>
									<div class="form-group">
									    <label for="note1">Ghi chú </label>
									    <textarea name="note" class="form-control" id="note1"><?php echo $shipInfo['note']; ?></textarea>
									</div>
								<?php if (isset($_SESSION['customer'])) {?>
									<div class="row">
		                                <div class="col-xs-12">
		                                	<button type="submit" name="register" class="btn btn--ys btn-top pull-right" >Cập nhật</button>
		                                	<a href="javascript:void(0)" class="btn btn--ys btn-top pull-right edit1">Hủy</a>

		                                </div>
		                            </div>
		                        <?php }?>
								</form>
							</div>
						</div>

						<div class="divider--xl"></div>
						<!-- /NAME & ADDRESS  -->
					</div>
					<!--================= /col-left =================-->

					<!--================= col-right =================-->
					<div class="col-md-12 col-lg-5">
						<!-- Payment Method -->
						<h2 class="title-checkout">
							<span class="icon icon-account_balance_wallet color"></span>
							Hình thức thanh toán
						</h2>
						<!-- /Payment Method -->
						<div class="panel panel-default cart">
							<div class="panel-body">
								<div class="form-group form-group-top clearfix">
							     	<label class="radio">
			                       		<input id="radio1" type="radio" value="offline" name="radios" checked>
			                        	<span class="outer">
			                        		<span class="inner"></span>
			                        	</span>
			                        	Thanh toán khi nhận hàng
			                        </label>
							    </div>
							    <div class="form-group clearfix">
			                          <label class="radio pull-left">
			                            <input id="radio2" type="radio" value="online" name="radios">
			                            <span class="outer">
			                            	<span class="inner"></span>
			                            </span>
			                            Thanh toán qua thẻ
			                          </label>
			                          <label class="new-group card-credit-list pull-left" for="new-card">
		                                <span class="card-credit card-visa is-active"></span>
		                                <span class="card-credit card-mastercard is-active"></span>
		                                <span class="card-credit card-jcb is-active"></span>
		                            </label>
							    </div>
							    <form action="" id="form-card">
									<div class="form-group row">
									    <span class="credit-card-guide pull-right"></span>
									</div>
								    <div class="form-group">
									    <label for="checkoutFormCreditCartNumber">Số thẻ  <sup>*</sup></label>
									    <input type="text" class="form-control" id="checkoutFormCreditCartNumber" required="">
									    <span class="note"></span>
									</div>
								    <div class="form-group">
									    <label for="checkoutFormNameOnCard">Tên in trên thẻ <sup>*</sup></label>
									    <input type="text" class="form-control" id="checkoutFormNameOnCard" required="">
									    <span class="note"></span>
									</div>

									<div class="form-group">
									    <label for="checkoutDateOnCard">Ngày hết hạn <sup>*</sup></label>
									    <input type="date" class="form-control" id="checkoutDateOnCard" required="">
									    <span class="note"></span>
									</div>
									<!-- row-col-2 -->
									<!-- /row-col-2 -->
									<div class="form-group row">
									    <div class="col-md-6">
									    	<label for="checkoutFormCardVerificationNumber">Mã bảo mật   <sup>*</sup></label>
									    	<input type="text" class="form-control" id="checkoutFormCardVerificationNumber" required="">
									    	<span class="note"></span>
									    </div>
									    <div class="col-md-6">
									    	<i class="cvc-hint-icon"></i>
									    </div>
									</div>
									<a class="link-underline" href="#">What is this?</a>

								</form>
								<div class="divider--xl"></div>
									<!-- GRAND TOTAL -->
								<div class="card card--padding fill-bg">
									<table class="table-total-checkout">
										<tbody>
											<tr>
												<th>Thanh toán:</th>
												<td class="total-checkout">$0.00</td>
											</tr>
										</tbody>
									</table>
									<a id="accept-order" href="javascript:void(0)" class="<?php if (isset($_SESSION['customer']) && $shipInfo == null) {echo "disabled";}?> btn btn--ys btn--full btn--xl">Đặt hàng ngay<span class="icon icon-reply icon--flippedX"></span></a>
								</div>
							</div>
						</div>
						<!-- /GRAND TOTAL -->
					</div>
					<!--================= /col-right =================-->
					<!--================= col-center =================-->
					<div class="col-md-12 col-lg-3">
						<h2 class="title-checkout">
							<span class="icon icon-shopping_basket color"></span>
							Giỏ hàng
						</h2>
						<div class="panel-cart" id="cart-checkout-info">
					    <div class="panel panel-default cart">
					        <div class="panel-body">
					            <div class="order">
					                <span class="title">Đơn Hàng</span>
					                <span class="title" id="total-quantity"> (7 sản phẩm)</span>
									<a href="?mod=cart" class="btn btn-default btn-custom1">Sửa</a>
					            </div>
					            <div class="product">

					            </div>

					            <p class="list-info-price">
					                <b>Tạm tính</b>
					                <span class="total-checkout">0.000&nbsp;₫</span>
					            </p>
					            <p class="list-info-price">
					                <b>Phí vận chuyển</b>
					                <span>0.000&nbsp;₫</span>
					            </p>

					            <p class="total2">
					                Thành tiền:
					                <span class="color total-checkout">0.000&nbsp;₫ </span>
					            </p>
					            <p class="text-right">
					                <i>(Đã bao gồm VAT)</i>
					            </p>
					        </div>
					    </div>

					    </div>
					</div>
					<!--================= /col-center =================-->
				</div>
			</div>
		</div>
		<!-- End CONTENT section -->
		 <!-- FOOTER section -->
    <?php include 'layout/footer.php';?>
        <!-- END FOOTER section -->
        <!-- jQuery 1.10.1-->
<script src="public/external/jquery/jquery-2.1.4.min.js"></script>
<!-- Bootstrap 3-->
<script src="public/external/bootstrap/bootstrap.min.js"></script>
<!-- Specific Page External Plugins -->
<script src="public/external/slick/slick.min.js"></script>
<script src="public/external/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="public/external/colorbox/jquery.colorbox-min.js"></script>
        <!-- Custom -->
        <script src="public/js/custom.js"></script>
        <script>
        	var customer_status = "<?php echo isset($_SESSION['customer']) ? 1 : 0 ?>";
        </script>
<script>
	$(document).ready(function () {
		if(localStorage.getItem('cart') === null){
			localStorage.setItem('cart', JSON.stringify([]));
		} else {
			var cart = JSON.parse(localStorage.getItem('cart'));
			if(cart.length === 0){
				window.location.replace('?mod=empty-cart');
			}
		}
		$('#form-card').hide();
		$('input[name="radios"]').change(function(){
			var val = $(this).val();
			val === 'online' ? $('#form-card').show() : $('#form-card').hide();
		});
		updateCartCheckout();
		function updateCartCheckout() {
			if(localStorage.getItem('cart') === null){
				localStorage.setItem('cart', JSON.stringify([]));
			} else {
				var cart = JSON.parse(localStorage.getItem('cart'));
				$('#total-quantity').text(' ( '+cart.length+' sản phẩm )')
				$('#cart-checkout-info .product').children().remove();
				var total = 0;
				cart.forEach(function(item) {
					total += item.product.price * item.quantity;
					$('#cart-checkout-info .product').append(
						'<div class="item">'
		                +'    <p class="title">'
		                +'        <strong>'+item.quantity+' x</strong>'
		                +'        <a href="?mod=detail&code='+item.product.code+'">'+item.product.name+'</a>'
		                +'        <span class="seller-by"> Đơn giá: '
		                +'        	<strong class="firm">'+fomatVND(item.product.price)+'</strong>'
		                +'        </span>'
		                +'   	</p>'
						+'	<p class="price text-right">'
		                +'        <span>'+fomatVND(item.product.price * item.quantity)+' </span>'
		                +'    </p>'
		                +'</div>')
				});
				$('.total-checkout').text(fomatVND(total));
			}
		}
		$(document).on('click', '.edit1', function(){
			$('.ship-info1').toggleClass('an-hien');
		});
		$(document).on('click', '#accept-order', function(){
			var _data;
			var check1 = 0;
			if(customer_status === "0") {
				$('.ship-info .form-control').not('textarea[name="note"]').each(function() {
					if($(this).val() === '' || $(this).val() === null || $(this).val() === 'xx'){
						$(this).next('span.note').html('<i>Trường bắt buộc!</i>');
			 				check1 = 1;
					} else {
						if($(this).context.name === 'email') {
							if(!isValidEmailAddress($(this).val())) {
								$(this).next('span.note').html('<i>Nhập đúng định dạng!</i>');
								check1 = 1;
							} else
		 						$(this).next('span.note').html('');
						} else
		 					$(this).next('span.note').html('');
		 			}
				});
			}
			if (check1 === 0) {
				if(localStorage.getItem('cart') === null){
					localStorage.setItem('cart', JSON.stringify([]));
				} else {
					var paymentType = $('input[name="radios"]:checked').val();
					var check = 0;
					if(paymentType === 'online') {
						$('#form-card input').each(function(element){
							if(!$(this).val()) {
								$(this).next('span.note').html('<i>Trường bắt buộc!</i>');
								check = 1;
							} else{
								$(this).next('span.note').html('');
							}
						});
					}
					if(check === 0){
						var cart = localStorage.getItem('cart');
						if(cart.length > 0){
							if(customer_status === "0") {
								_data = JSON.stringify({
									'ship_info' : $('form.ship-info').serializeArray(),
									'cart' : JSON.parse(cart)
								})
							} else {
								_data = cart;
							}
							$.ajax({
								url : '?mod=create-order&payment-type=' + paymentType,
								method : 'post',
								dataType: 'json',
								contentType: 'application/json',
				    			data: _data,
				    			success : function(r) {
				    				if(r.status === true){
				    					alert(r.title);
				    					localStorage.setItem('cart', JSON.stringify([]));
				    					//window.location.replace('?mod=account');
				    				} else {
				    					alert(r.title);
				    					if(r.code === 'over_product') {
				    						var product_code = r.product_code;
				    						console.log(product_code);
				    					}
				    				}
				    			}, error: function(err){console.log(err);}
							})
						}
					}

				}
			}

		});
		function isValidEmailAddress(emailAddress) {
		    var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
		    return pattern.test(emailAddress);
		}
		function fomatVND(input) {
            return input.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
        }
        $(document).on('change', 'select[name="city_code"]', function(){
        	var city_code = $(this).val();
        	if(city_code === 'xx'){
        		$('select[name="district_code"]').children().remove();
        		$('select[name="village_code"]').children().remove();
        	}else {
        		$.ajax({
	        		url : '?mod=map&action=get-district&city_code='+city_code,
	        		type : 'get',
	        		success : function(res){
	        			if(res){
	        				var data = JSON.parse(res);
	        				$('select[name="district_code"]').children().remove();
	        				$('select[name="village_code"]').children().remove();
	        				$('select[name="district_code"]').append('<option value="xx">--Chọn quận/huyện--</option>')
	        				data.forEach(function(item){
	        					$('select[name="district_code"]').append('<option value="'+item.code+'">'+item.name+'</option>')
	        				})
	        			}
	        		}
	        	})
        	}

        });
        $(document).on('change', 'select[name="district_code"]', function(){
        	var city_code = $(this).val();
        	if(city_code === 'xx'){
        		$('select[name="village_code"]').children().remove();
        	} else {
        		$.ajax({
	        		url : '?mod=map&action=get-village&district_code='+city_code,
	        		type : 'get',
	        		success : function(res){
	        			if(res){
	        				var data = JSON.parse(res);
	        				$('select[name="village_code"]').children().remove();
	        				$('select[name="village_code"]').append('<option value="xx">--Chọn phường/xã--</option>')
	        				data.forEach(function(item){
	        					$('select[name="village_code"]').append('<option value="'+item.code+'">'+item.name+'</option>')
	        				})
	        			}
	        		}
	        	})
        	}

        });
	})
</script>
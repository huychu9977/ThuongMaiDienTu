<!-- include header -->
<?php include('layout/header.php'); ?>
    <!-- End HEADER section -->
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb--ys pull-left">
                <li class="home-link">
                    <a href="?mod=home" class="icon icon-home"></a>
                </li>
                <li class="active">Đăng nhập</li>
            </ol>
        </div>
    </div>
    <!-- /breadcrumbs -->
    <!-- CONTENT section -->
    <div id="pageContent">
        <div class="container">
            <!-- title -->
            <div class="title-box">
                <h1 class="text-center text-uppercase title-under">ĐĂNG NHẬP HOẶC ĐĂNG KÝ MỚI</h1>
            </div>
            <!-- /title -->
            <div class="row">
                <section class="col-sm-12 col-md-6 col-lg-6 col-xl-4 col-xl-offset-2">
                    <div class="login-form-box">
                        <h3 class="color small">TÀI KHOẢN</h3>
                        <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                        <br>
                        <button slug-name="register" class="btn btn--ys btn--xl" type="button"><span class="icon icon-person_add"></span>CREATE AN ACCOUNT</button>
                    </div>
                </section>
                <div class="divider divider--md visible-sm visible-xs"></div>
                <section slug-name="login" class="form col-sm-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="login-form-box">
                        <h3 class="color small">Đăng nhập</h3>
                        <form id="login-form">
                            <div class="form-group">
                                <label for="username1">Tài khoản<sup>*</sup></label>
                                <input type="text" class="form-control" name="username" id="username1">
                            </div>
                            <div class="form-group">
                                <label for="password1">Mật khẩu <sup>*</sup></label>
                                <input type="password" name="password" class="form-control" id="password1">
                            </div>
                            <p class="note" id="error-login"> <i></i> </p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <button type="submit" class="btn btn--ys btn-top btn--xl"><span class="icon icon-vpn_key"></span>Đăng nhập</button>
                                </div>
                                <div class="divider divider--md visible-xs"></div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="pull-right note btn-top">* Trường bắt buộc</div>
                                </div>
                            </div>
                            <p class="btn-top">
                                <a class="link-color" href="#">Quên mật khẩu?</a>
                            </p>
                        </form>
                    </div>
                </section>
                <section slug-name="register" class="form col-sm-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="login-form-box">
                        <h3 class="color small">Đăng ký tài khoản</h3>
                        <form id="register-form">
                            <div class="form-group">
                                <label for="name">Họ và tên <sup>*</sup></label>
                                <input type="text" name="name" class="form-control" id="name" required="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email </label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ </label>
                                <input type="text" name="address" class="form-control" id="address">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại </label>
                                <input type="text" name="phone" class="form-control" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="username">Tài khoản <sup>*</sup></label>
                                <input type="text" name="username" class="form-control" id="username" minlength="6" required="">
                            </div>
                            <p class="note" id="error-register"> <i></i> </p>
                            <div class="form-group">
                                <label for="password">Mật khẩu <sup>*</sup></label>
                                <input type="password" name="password" class="form-control" id="password" minlength="6" required="">
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <button type="submit" name="register" class="btn btn--ys btn-top btn--xl" ><span class="icon icon-vpn_key"></span>Đăng ký</button>
                                </div>
                                <div class="divider divider--md visible-xs"></div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="pull-right note btn-top">* Trường bắt buộc</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- End CONTENT section -->
    <?php include('layout/footer.php'); ?>
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
        <script type="text/javascript">
            var next_page = '<?php if(isset($_GET['next-page'])) echo $_GET['next-page']; else echo "home";?>';
        </script>
<script>
    $(document).ready(function () {
       $('#register-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url : "?mod=login&act=register",
            method : "post",
            data : $(this).serialize(),
            success : function(res) {
                var data = JSON.parse(res);
                if (data === false) {
                    $('#error-register i').text('Tài khoản đã được sử dụng!!');
                } else {
                    $('#error-register i').text('');
                    window.location.replace('?mod=home');
                }
            }, error : function(err) {console.log(res);}
        })
       })
       $('#login-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url : "?mod=login&act=login",
            method : "post",
            data : $(this).serialize(),
            success : function(res) {
                var data = JSON.parse(res);
                if (data === false) {
                    $('#error-login i').text('Đăng nhập thất bại!!');
                } else {
                    $('#error-login i').text('');
                    window.location.replace('?mod=' + next_page);
                }
            }, error : function(err) {console.log(res);}
        })
       })
       show('login');
       $('section:first-child button').click(function() {
        var name = $(this).attr('slug-name');
        var newName = $(this).attr('slug-name') === 'login' ? 'register' : 'login';
        $(this).attr('slug-name', newName);
        show(name);
       });
       function show(name) {
        var title = $('section:first-child button').attr('slug-name') === 'login' ? 'Đã có tài khoản?' : 'Tạo tài khoản mới?';
        $('section:first-child button').text(title);
        $('section.form').hide();
        $('section[slug-name="'+name+'"]').show();
       }
    });
</script>
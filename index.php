<?php
	session_start();
	if(isset($_GET['mod'])) {
		$mod = $_GET['mod'];
	} else{
		$mod = 'page-404';
	}
	require_once 'controllers/ProductController.php';
	$pc = new ProductController();
	include_once 'controllers/CustomerController.php';
	$cus = new CustomerController();
	switch ($mod) {
		case 'page-404':{
			$pc->page_404();
			break;
		}
		case 'home': {
			$pc->page_home();
			break;
		}
		case 'shop': {
			$pc->page_shop();
			break;
		}
		case 'cart': {
			$pc->page_cart();
			break;
		}
		case 'empty-cart': {
			$pc->page_empty_cart();
			break;
		}
		case 'detail': {
			if(isset($_GET['code'])){
				$pc->page_detail();
			} else {
				header("location: ?mod=page-404");
			}
			break;
		}
		case 'checkout': {
			if(isset($_SESSION['customer']) && $_SESSION['customer'] != null) {
				$pc->page_checkout();
			} else {
				header("location: ?mod=login&next-page=checkout");
			}
			break;
		}
		case 'account': {
			if(isset($_SESSION['customer']) && $_SESSION['customer'] != null) {
				$pc->page_account();
			} else {
				header("location: ?mod=login&next-page=account");
			}
			break;
		}
		case 'login': {
			if(!isset($_SESSION['customer']) || $_SESSION['customer'] == null) {
				if (isset($_GET['act'])) {
					if ($_GET['act'] == 'login') {
						$cus->login($_POST['username'], $_POST['password']);
					} else if($_GET['act'] == 'register') {
						$cus->register();
					}
				} else {
					$pc->page_login();
				}
			} else {
				header("location: ?mod=home");
			}
			break;
		}
		case 'logout': {
			if(isset($_SESSION['customer']) && $_SESSION['customer'] != null) {
				$cus->logout();
			}
			break;
		}
		case 'find-by-code': {
			$pc->findByCode();
			break;
		}
		case 'find-detail-by-code': {
			$pc->findDetailByCode();
			break;
		}
		case 'update-ship-info': {
			$cus->updateShipInfo();
			break;
		}
		case 'create-order': {
			$cus->createOrder();
			break;
		}
		case 'find-order-detail' : {
			$cus->findOrderDetail();
			break;
		}
		case 'set-site': {
			$cus->setSite();
			break;
		}
		default:
			$pc->page_404();
			break;
	}
?>
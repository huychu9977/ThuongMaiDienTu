<?php
include_once 'models/Customer.php';
include_once 'models/Product.php';
class CustomerController {
	var $customer;
	var $product;
	function __construct() {
		$this->customer = new Customer();
		$this->product = new Product();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	function login($username, $password) {
		if ($this->customer->login($username, $password) == null) {
			echo json_encode(false);
		} else {
			$_SESSION['customer'] = $this->customer->login($username, $password);
			echo json_encode($this->customer->login($username, $password));
		}
	}
	function register() {
		$username = $_POST['username'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		if ($this->customer->findByUsername($username) != null) {
			echo json_encode(false);
		} else {
			$code = "KH_" . date('Ymdhis');
			$this->customer->register($code, $username, $password, $name, $address, $phone, $email);
			//$_SESSION['customer'] = $this->customer->login($username, $password);
			echo json_encode(true);
		}
	}
	function updateShipInfo() {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$description = $_POST['description'];
		if ($this->customer->getShipInfo($_SESSION['customer']['id'])) {
			if ($this->customer->updateShipInfo($_SESSION['customer']['id'], $name, $address, $phone, $description)) {
				header("location: ?mod=checkout");
			} else {
			}
		} else {
			if ($this->customer->insertShipInfo($_SESSION['customer']['id'], $name, $address, $phone, $description)) {
				header("location: ?mod=checkout");
			} else {
			}
		}

	}
	function createOrder() {
		$siteId = isset($_SESSION['site']) ? $_SESSION['site']['id'] : 1;
		$data = json_decode(file_get_contents('php://input'), true);
		$check = 0;
		foreach ($data as $value) {
			if ($this->product->checkQuantity($value['product']['code'], $value['quantity'], $siteId) == 0) {
				$check = 1;
			}
		}
		if ($check == 1) {
			echo json_encode(false);
			return;
		} else {
			$code = "HD_" . date('Ymdhis');
			$createdDate = date('Y-m-d H:i:s');
			$customerId = $_SESSION['customer']['id'];
			$status = $_GET['payment-type'] == 'online' ? 3 : 1;
			$createdBy = null;
			$saleType = 2;
			if ($this->customer->createOder($code, $customerId, $status, $createdDate, $createdBy, $saleType, $siteId)) {
				foreach ($data as $key => $value) {
					$this->customer->createOderDetail($code, $value['product']['id'], $value['quantity'], $value['product']['price']);
					$this->product->updateProduct($value['product']['code'], $value['product']['quantity'] - $value['quantity'], $siteId);
				}
			} else {}
			echo json_encode(true);
		}

	}
	function findOrderDetail() {
		$code = $_GET['code'];
		echo json_encode($this->customer->findOrderDetail($code));
	}
	function setSite() {
		$code = $_POST['code'];
		$_SESSION['site'] = $this->customer->findSiteByCode($code);
		echo json_encode(true);
	}
	function logout() {
		session_destroy();
		echo json_encode(true);
	}
}
?>
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
		if ($this->customer->login($username, md5($password)) == null) {
			echo json_encode(false);
		} else {
			$_SESSION['customer'] = $this->customer->login($username, md5($password));
			echo json_encode($this->customer->login($username, md5($password)));
		}
	}
	function isValidEmail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
	}
	function register() {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		if (!$this->isValidEmail($email)) {
			echo json_encode(false);
			return;
		}
		if ($this->customer->findByEmail($email) != null) {
			echo json_encode(false);
		} else {
			$code = "KH_" . date('Ymdhis');
			$this->customer->register($code, md5($password), $name, $address, $phone, $email);
			//$_SESSION['customer'] = $this->customer->login($username, $password);
			echo json_encode(true);
		}
	}
	function updateShipInfo() {
		$data = $_POST;
		if ($this->customer->getShipInfo($_SESSION['customer']['id'])) {
			if ($this->customer->updateShipInfo($_SESSION['customer']['id'], $data)) {
				header("location: ?mod=checkout");
			} else {
			}
		} else {
			if ($this->customer->insertShipInfo($_SESSION['customer']['id'], $data)) {
				header("location: ?mod=checkout");
			} else {
			}
		}

	}
	function createOrder() {
		$data = json_decode(file_get_contents('php://input'), true);
		$check = 0;
		$product_fail = array();
		foreach ($data['cart'] as $value) {
			$code = $this->product->checkQuantity($value['product']['code'], $value['quantity']);
			if ($code == null) {
				$check = 1;

			} else {
				array_push($product_fail, $code);
			}
		}
		if ($check == 1) {
			echo json_encode([
				'status' => false,
				'code' => 'over_product',
				'title' => 'Số lượng sản phẩm đã vượt quá!',
				'product_code' => $product_fail,
			]);
			return;
		} else {
			if (!isset($_SESSION['customer'])) {
				$id_ship_info = $this->customer->insertShipInfo(null, $data['ship_info']);

				if ($id_ship_info) {
					$code = "HD_" . date('Ymdhis');
					$createdDate = date('Y-m-d H:i:s');
					$status = $_GET['payment-type'] == 'online' ? 3 : 1;
					$order_id = $this->customer->createOder($code, $id_ship_info, $status, $createdDate);
					if ($order_id) {
						foreach ($data['cart'] as $key => $value) {
							$this->customer->createOderDetail($order_id, $value['product']['id'], $value['quantity'], $value['product']['price']);
							$this->product->updateProduct($value['product']['code'], $value['quantity']);
						}
					} else {}
					echo json_encode([
						'status' => true,
						'title' => 'Thanh toán thành công!',
					]);
				}

			} else {
				if ($this->customer->getShipInfo($_SESSION['customer']['id']) == null) {
					echo json_encode([
						'status' => false,
						'code' => 'ship_info_empty',
						'title' => 'Vui lòng cập nhật thông tin giao hàng!',
					]);
					return;
				}
			}
		}

	}
	function findOrderDetail() {
		$code = $_GET['code'];
		echo json_encode($this->customer->findOrderDetail($code));
	}
	function getReviews() {
		$code = $_GET['code'];
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$reviews = $this->customer->getReviews($page, $code);
		$review_count = $this->customer->getReviewsCount($code);
		echo json_encode([
			'data' => $reviews,
			'total' => $review_count,
		]);
	}
	function addReview() {
		$data = $_POST;
		$data['customer_id'] = $_SESSION['customer']['id'];
		$data['created_date'] = date('Y-m-d H:i:s');
		if ($this->customer->addReview($data)) {
			echo json_encode(true);
		} else {
			echo json_encode(false);
		}
	}
	function logout() {
		session_destroy();
		echo json_encode(true);
	}
}
?>
<?php
include_once 'models/Product.php';
include_once 'models/Customer.php';
include_once 'models/Map.php';
class ProductController {
	var $product;
	var $customer;
	var $map;
	function __construct() {
		$this->product = new Product();
		$this->customer = new Customer();
		$this->map = new Map();
	}
	function findByCode() {
		$code = $_GET['code'];
		echo json_encode($this->product->findByCode($code));
	}
	function findDetailByCode() {
		$code = $_GET['code'];
		echo json_encode($this->product->findDetailByCode($code));
	}
	function page_home() {
		$sliders = $this->product->getSliders();
		$products_sale = $this->product->getProductSales();
		$products_new = $this->product->getProductNews();
		$products_hot = $this->product->getProductHots();
		require_once 'views/index.php';
	}
	function page_404() {
		require_once 'views/page-404.php';
	}
	function page_shop() {
		$category_name = array('branch' => 'Thương hiệu', 'color' => 'Màu sắc', 'cpu' => 'Series CPU', 'operating_system' => 'Hệ điều hành', 'ram' => 'Dung lượng RAM', 'screen_size' => 'Kích thước màn hình', 'type' => 'Thể loại', 'price' => 'Giá');
		$categories = array();
		foreach ($category_name as $key => $value) {
			if ($key != 'price') {
				array_push($categories, array(
					"code" => $key,
					"name" => $value,
					"data" => $this->product->getProperties($key),
				));
			}

		}
		//echo '<pre>' . var_export($categories, true) . '</pre>';

		$columns = $this->product->getColumns();
		$query = array();
		foreach ($_GET as $key => $value) {
			if (in_array($key, $columns)) {
				if ($key == 'price') {
					$prices = explode("-", $_GET['price']);
					array_push($query, array(
						"name" => "price",
						"from" => $prices[0],
						"to" => $prices[1],
					));
				} else {
					array_push($query, array(
						"name" => $key,
						"code" => $value,
					));
				}

			}

		}
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		$page_size = isset($_GET['page_size']) ? $_GET['page_size'] : 12;
		$products = $this->product->search($query, $page, $sort, $page_size);
		//echo '<pre>' . var_export($products, true) . '</pre>';
		$total = $this->product->count($query);
		$productNew = $this->product->findNew();
		require_once 'views/listing.php';
	}
	function page_cart() {
		require_once 'views/shopping_cart.php';
	}
	function page_empty_cart() {
		require_once 'views/empty-cart.php';
	}
	function page_detail() {
		$code = $_GET['code'];
		$product = $this->product->findDetailByCode($code);
		if ($product == null) {
			header("location: ?mod=page-404");
		} else {
			$productRecommend = $this->product->findRecommend($product['type_id']);

			require_once 'views/product.php';
		}

	}

	function getDistrict() {
		$city_code = $_GET['city_code'];
		$districts = $this->map->getDistrict($city_code);
		echo json_encode($districts);
	}
	function getVillage() {
		$district_code = $_GET['district_code'];
		$villages = $this->map->getVillage($district_code);
		echo json_encode($villages);
	}
	function page_checkout() {

		$shipInfo = isset($_SESSION['customer']['id']) ? $this->customer->getShipInfo($_SESSION['customer']['id']) : null;
		$cities = $this->map->getCity();
		if ($shipInfo != null) {
			if ($shipInfo['c_code'] != null) {
				$districts = $this->map->getDistrict($shipInfo['c_code']);
			}
			if ($shipInfo['d_code'] != null) {
				$villages = $this->map->getVillage($shipInfo['d_code']);
			}
		}
		require_once 'views/checkout-one-page.php';
	}
	function page_account() {
		$orders = $this->customer->getOrders($_SESSION['customer']['id']);
		require_once 'views/account-order.php';
	}
	function page_login() {
		require_once 'views/login_form.php';
	}

}
?>
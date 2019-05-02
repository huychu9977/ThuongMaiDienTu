<?php
include_once 'Connection.php';
class Customer {
	var $cus;
	function __construct() {
		$conn = new Connection();
		$this->cus = $conn->getConnect();
	}
	function login($email, $password) {
		$sql = "select c.id, c.name, c.address, c.phone, c.email from customer c where c.email = ? and c.password = ?";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('ss', $email, $password);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_assoc();
		return $result;
	}
	function findByEmail($email) {
		$sql = "select * from customer where email = ?";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_assoc();
		return $result;
	}
	function register($code, $password, $name, $address, $phone, $email) {
		$sql = "insert into customer (code, name, address, phone, email, password) values(?,?,?,?,?,?)";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('ssssss', $code, $name, $address, $phone, $email, $password);
		$stmt->execute();
		return $stmt;
	}
	function getShipInfo($id) {
		$sql = "select csi.*, md.`code` as d_code, mc.`code` as c_code, md.`name` as d_name, mc.`name` as c_name, mv.`name` as v_name from customer_ship_info csi
				join map_village mv ON mv.`code` = csi.village_code
				join map_district md ON md.`code` = mv.district_code
				join map_city mc ON mc.`code` = md.city_code where customer_id = ?";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_assoc();
		return $result;
	}
	function insertShipInfo($id, $data) {

		$ship = array();
		foreach ($data as $key => $value) {
			$ship[$value['name']] = $value['value'];
		}
		$sql = "insert into customer_ship_info (name, address, phone, note, email, village_code, customer_id) values(?,?,?,?,?,?,?)";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('ssssssi', $ship['name'], $ship['address'], $ship['phone'], $ship['note'], $ship['email'], $ship['village_code'], $id);
		$stmt->execute();
		$result = $stmt->insert_id;
		return $result;
	}
	function updateShipInfo($id, $data) {
		$sql = "update customer_ship_info set name = ?, address = ?, phone = ?, note = ?, email = ?, village_code = ? where customer_id = ?";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('ssssssi', $data['name'], $data['address'], $data['phone'], $data['note'], $data['email'], $data['village_code'], $id);
		$stmt->execute();
		return $stmt;
	}
	function createOder($code, $shipId, $status, $createdDate) {
		$sql = "insert into `order` (`code`, ship_info_id, `status`, created_date) values(?,?,?,?)";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('siis', $code, $shipId, $status, $createdDate);
		$stmt->execute();
		$result = $stmt->insert_id;
		return $result;
	}
	function createOderDetail($order_id, $product_id, $quantity, $product_price) {
		$sql = "insert into order_detail (order_id, product_id, quantity, product_price) values(?,?,?,?)";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('iiii', $order_id, $product_id, $quantity, $product_price);
		$stmt->execute();
		return $stmt;
	}
	function getOrders($customerId) {
		$sql = "SELECT
					o.`code`,
					o.`status`,
					o.created_date,
					sum(od.product_price * od.quantity) AS total_price
				FROM `order` o
				JOIN order_detail od ON o.id = od.order_id
				JOIN customer_ship_info csi ON csi.id = o.ship_info_id
				WHERE csi.customer_id = ?
				GROUP BY
					o.`code`,
					o.`status`,
					o.created_date";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('i', $customerId);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	function findOrderDetail($code) {
		$sql = "SELECT
					b.`name`,
					od.quantity,
					od.product_price as price,
					(od.quantity * od.product_price) AS total_price
				FROM
					order_detail od
				JOIN product b ON od.product_id = b.id
				JOIN `order` o ON o.id = od.order_id
				WHERE
					o.`code` = ? ";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('s', $code);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	function getReviews($page, $product_code) {
		$sql = "select cr.star_rate, cr.title, cr.content, cr.created_date, c.name from customer_reviews cr JOIN customer c ON c.id = cr.customer_id join product p on p.id=cr.product_id where p.code = ?
			ORDER BY cr.created_date desc limit ?, 3";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('si', $product_code, $p);
		$p = ($page - 1) * 3;
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	function getReviewsCount($product_code) {
		$sql = "select count(1) as total from customer_reviews cr JOIN customer c ON c.id = cr.customer_id join product p on p.id=cr.product_id where p.code = ?";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('s', $product_code);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data['total'];
	}
	function addReview($data) {
		$sql = "insert into customer_reviews(product_id, star_rate, title, content, customer_id, created_date) values (?,?,?,?,?,?)";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('iissis', $data['product_id'], $data['star_rate'], $data['title'], $data['content'], $data['customer_id'], $data['created_date']);
		$stmt->execute();
		return $stmt;
	}
}
?>
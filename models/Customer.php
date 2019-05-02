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
	// function findByUsername($username) {
	// 	$sql = "select * from dbo.[customer] where username = '" . $username . "'";
	// 	$stmt = mysqli_query($this->cus, $sql);
	// 	$result = $stmt->fetch_assoc();
	// 	return $result;
	// }
	// function register($code, $username, $password, $name, $address, $phone, $email) {
	// 	$sql = "insert into dbo.[customer] (code, name, address, phone, email, username, password) values(?,?,?,?,?,?,?)";
	// 	$stmt = mysqli_query($this->cus, $sql, array($code, $name, $address, $phone, $email, $username, $password));
	// 	$result = $stmt->fetch_assoc();
	// 	return $result;
	// }
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
		$sql = "insert into customer_ship_info (name, address, phone, note, email, village_code, customer_id) values(?,?,?,?,?,?,?)";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('ssssssi', $data['name'], $data['address'], $data['phone'], $data['note'], $data['email'], $data['village_code'], $id);
		$stmt->execute();

		return $stmt;
	}
	function updateShipInfo($id, $data) {
		$sql = "update customer_ship_info set name = ?, address = ?, phone = ?, note = ?, email = ?, village_code = ? where customer_id = ?";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('ssssssi', $data['name'], $data['address'], $data['phone'], $data['note'], $data['email'], $data['village_code'], $id);
		$stmt->execute();
		return $stmt;
	}
	// function createOder($code, $customerId, $status, $createdDate, $createdBy, $saleType, $siteId) {
	// 	$sql = "insert into [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[order] (code, customer_id, status, created_date, created_by, sale_type, site_id) values(?,?,?,?,?,?,?)";
	// 	$stmt = mysqli_query($this->cus, $sql, array($code, $customerId, $status, $createdDate, $createdBy, $saleType, $siteId));
	// 	return $stmt;
	// }
	// function createOderDetail($code, $bookId, $quantity, $price) {
	// 	$sql = "insert into [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[order_detail] (order_code, book_id, quantity, price) values(?,?,?,?)";
	// 	$stmt = mysqli_query($this->cus, $sql, array($code, $bookId, $quantity, $price));
	// 	return $stmt;
	// }
	// function getOrders($customerId) {
	// 	$sql = "select o.code, o.status, o.created_date, s.location, sum(od.price * od.quantity) as total_price from [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[order] o
	// 			left join dbo.[site] s on o.site_id = s.id
	// 			inner join [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[order_detail] od on o.code = od.order_code
	// 			where o.sale_type = 2 and customer_id = " . $customerId . "
	// 			group  by o.code, o.status, o.created_date, s.location";
	// 	$stmt = mysqli_query($this->cus, $sql);
	// 	$data = array();
	// 	while ($row = $stmt->fetch_assoc()) {
	// 		$data[] = $row;
	// 	}
	// 	return $data;
	// }
	// function findOrderDetail($code) {
	// 	$sql = "SELECT b.name, od.quantity, od.price, (od.quantity * od.price) as total_price FROM [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[order_detail] od inner join dbo.book b on od.book_id = b.id where od.order_code = '" . $code . "'";
	// 	$stmt = mysqli_query($this->cus, $sql);
	// 	$data = array();
	// 	while ($row = $stmt->fetch_assoc()) {
	// 		$data[] = $row;
	// 	}
	// 	return $data;
	// }
	// function getSites() {
	// 	$sql = "select * from dbo.[site]";
	// 	$stmt = mysqli_query($this->cus, $sql);
	// 	$data = array();
	// 	while ($row = $stmt->fetch_assoc()) {
	// 		$data[] = $row;
	// 	}
	// 	return $data;
	// }
	// function findSiteByCode($code) {
	// 	$sql = "select * from dbo.[site] where code = '" . $code . "'";
	// 	$stmt = mysqli_query($this->cus, $sql);
	// 	$result = $stmt->fetch_assoc();
	// 	return $result;
	// }
	function getReviews($page, $product_code) {
		$sql = "select cr.star_rate, cr.title, cr.content, cr.created_date, c.name from customer_reviews cr JOIN customer c ON c.id = cr.customer_id join product p on p.id=cr.product_id where p.code = ?";
		$stmt = $this->cus->prepare($sql);
		$stmt->bind_param('s', $product_code);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
}
?>
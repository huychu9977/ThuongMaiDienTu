<?php
include_once 'Connection.php';
class Customer {
	var $cus;
	function __construct() {
		$conn = new Connection();
		$this->cus = $conn->getConnect();
	}
	function login($username, $password) {
		$sql = "select c.id, c.username, c.name, c.address, c.phone, c.email from dbo.[customer] c where c.username = ? and c.password = ?";
		$stmt = sqlsrv_query($this->cus, $sql, array($username, md5($password)));
		$result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		return $result;
	}
	function findByUsername($username) {
		$sql = "select * from dbo.[customer] where username = '" . $username . "'";
		$stmt = sqlsrv_query($this->cus, $sql);
		$result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		return $result;
	}
	function register($code, $username, $password, $name, $address, $phone, $email) {
		$sql = "insert into dbo.[customer] (code, name, address, phone, email, username, password) values(?,?,?,?,?,?,?)";
		$stmt = sqlsrv_query($this->cus, $sql, array($code, $name, $address, $phone, $email, $username, $password));
		$result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		return $result;
	}
	function getShipInfo($id) {
		$sql = "select * from dbo.[ship_info] where customer_id = '" . $id . "'";
		$stmt = sqlsrv_query($this->cus, $sql);
		$result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		return $result;
	}
	function insertShipInfo($id, $name, $address, $phone, $description) {
		$sql = "insert into dbo.[ship_info] (name, [address], phone, description, customer_id) values(?,?,?,?,?)";
		$stmt = sqlsrv_query($this->cus, $sql, array($name, $address, $phone, $description, $id));
		return $stmt;
	}
	function updateShipInfo($id, $name, $address, $phone, $description) {
		$sql = "update dbo.[ship_info] set name = ?, [address] = ?, phone = ?, description = ? where [customer_id] = ?";
		$stmt = sqlsrv_query($this->cus, $sql, array($name, $address, $phone, $description, $id));
		return $stmt;
	}
	function createOder($code, $customerId, $status, $createdDate, $createdBy, $saleType, $siteId) {
		$sql = "insert into [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[order] (code, customer_id, status, created_date, created_by, sale_type, site_id) values(?,?,?,?,?,?,?)";
		$stmt = sqlsrv_query($this->cus, $sql, array($code, $customerId, $status, $createdDate, $createdBy, $saleType, $siteId));
		return $stmt;
	}
	function createOderDetail($code, $bookId, $quantity, $price) {
		$sql = "insert into [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[order_detail] (order_code, book_id, quantity, price) values(?,?,?,?)";
		$stmt = sqlsrv_query($this->cus, $sql, array($code, $bookId, $quantity, $price));
		return $stmt;
	}
	function getOrders($customerId) {
		$sql = "select o.code, o.status, o.created_date, s.location, sum(od.price * od.quantity) as total_price from [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[order] o
				left join dbo.[site] s on o.site_id = s.id
				inner join [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[order_detail] od on o.code = od.order_code
				where o.sale_type = 2 and customer_id = " . $customerId . "
				group  by o.code, o.status, o.created_date, s.location";
		$stmt = sqlsrv_query($this->cus, $sql);
		$data = array();
		while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	function findOrderDetail($code) {
		$sql = "SELECT b.name, od.quantity, od.price, (od.quantity * od.price) as total_price FROM [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[order_detail] od inner join dbo.book b on od.book_id = b.id where od.order_code = '" . $code . "'";
		$stmt = sqlsrv_query($this->cus, $sql);
		$data = array();
		while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	function getSites() {
		$sql = "select * from dbo.[site]";
		$stmt = sqlsrv_query($this->cus, $sql);
		$data = array();
		while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	function findSiteByCode($code) {
		$sql = "select * from dbo.[site] where code = '" . $code . "'";
		$stmt = sqlsrv_query($this->cus, $sql);
		$result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		return $result;
	}
}
?>
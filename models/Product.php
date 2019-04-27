<?php
include_once 'Connection.php';
class Product {
	var $connect;
	function __construct() {
		$connection = new Connection();
		$this->connect = $connection->getConnect();
	}
	function findByCode($code, $site_id) {
		$sql = "select b.*, sb.quantity from dbo.[book] b join [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[site_book] sb on b.id = sb.book_id
				where b.code = '" . $code . "' and sb.site_id = " . $site_id;
		$stmt = sqlsrv_query($this->connect, $sql);
		$result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		return $result;
	}
	function findDetailByCode($code, $site_id) {
		$sql = "select b.*, sb.quantity, a.name as aName, t.name as tName, p.name as pName from dbo.[book] b inner join dbo.[author] a on a.id = b.author_id inner join dbo.[type] t on t.id = b.type_id inner join dbo.[publisher] p on p.id = b.publisher_id join [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[site_book] sb on b.id = sb.book_id where b.code = '" . $code . "' and sb.site_id = " . $site_id;
		$stmt = sqlsrv_query($this->connect, $sql);
		$result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		return $result;
	}
	function findNew() {
		$sql = "SELECT TOP 3 [code], [name], [price], [image] FROM [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[book] order by id";
		$stmt = sqlsrv_query($this->connect, $sql);
		$data = array();
		while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	function findRecommend($typeId, $site_id) {
		$sql = "select b.*, sb.quantity from dbo.[book] b join [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[site_book] sb on b.id = sb.book_id where b.type_id = " . $typeId;
		$sql .= " and sb.site_id = " . $site_id;
		$stmt = sqlsrv_query($this->connect, $sql);
		$data = array();
		while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	function search($query, $page, $sort, $site_id) {
		$sql = "select b.*, sb.quantity from dbo.[book] b";
		$tmp_sql = "";
		foreach ($query as $key => $value) {
			if ($value["name"] != 'price') {
				$sql .= " inner join dbo.[" . $value["name"] . "] a_" . $key . " on a_" . $key . ".id = b." . $value["name"] . "_id" . " and a_" . $key . ".code = '" . $value["code"] . "'";
			} else {
				$tmp_sql .= " and b.price >= " . $value["from"] . "000 and b.price <= " . $value["to"] . "000";
			}
		}
		$sql .= " inner join [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[site_book] sb on sb.book_id = b.id where 1 = 1";
		$sql .= $tmp_sql;
		$sql .= " and sb.site_id = " . $site_id;
		$sql .= " order by b." . $sort . " desc OFFSET " . ($page - 1) * 12 . " ROWS FETCH NEXT 12 ROWS ONLY";
		$stmt = sqlsrv_query($this->connect, $sql);
		$data = array();
		while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	function count($query, $site_id) {
		$sql = "select count(1) as total from dbo.[book] b";
		$tmp_sql = "";
		foreach ($query as $key => $value) {
			if ($value["name"] != 'price') {
				$sql .= " inner join dbo.[" . $value["name"] . "] a_" . $key . " on a_" . $key . ".id = b." . $value["name"] . "_id" . " and a_" . $key . ".code = '" . $value["code"] . "'";
			} else {
				$tmp_sql .= " and b.price >= " . $value["from"] . "000 and b.price <= " . $value["to"] . "000";
			}
		}
		$sql .= " inner join [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[site_book] sb on sb.book_id = b.id where 1 = 1";
		$sql .= $tmp_sql;
		$sql .= " and sb.site_id = " . $site_id;
		$stmt = sqlsrv_query($this->connect, $sql);
		$total = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		return $total['total'];
	}
	function getAuthor($site_id) {
		$sql = "select t.id, t.code, t.name, count(t.id) as total
				from dbo.[author] t left join dbo.[book] b on b.author_id = t.id
				left join [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[site_book] sb on sb.book_id = b.id
				where sb.site_id = " . $site_id . "
				GROUP BY t.id, t.code, t.name";
		$stmt = sqlsrv_query($this->connect, $sql);
		$data = array();
		while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	function getType($site_id) {
		$sql = "select t.id, t.code, t.name, count(t.id) as total
				from dbo.[type] t left join dbo.[book] b on b.type_id = t.id
				left join [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[site_book] sb on sb.book_id = b.id
				where sb.site_id = " . $site_id . "
				GROUP BY t.id, t.code, t.name";
		$stmt = sqlsrv_query($this->connect, $sql);
		$data = array();
		while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	function getPublisher($site_id) {
		$sql = "select t.id, t.code, t.name, count(t.id) as total
				from dbo.[publisher] t left join dbo.[book] b on b.publisher_id = t.id
				left join [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[site_book] sb on sb.book_id = b.id
				where sb.site_id = " . $site_id . "
				GROUP BY t.id, t.code, t.name";
		$stmt = sqlsrv_query($this->connect, $sql);
		$data = array();
		while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	function checkQuantity($code, $quantity, $site_id) {
		$sql = "select count(1) as total from dbo.[book] b join [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[site_book] sb on sb.book_id = b.id where b.code = ? and sb.quantity >= ? and sb.site_id  = ?";
		$stmt = sqlsrv_query($this->connect, $sql, array($code, $quantity, $site_id));
		$total = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		return $total['total'];
	}
	function updateProduct($code, $quantity, $site_id) {
		$sql = "update [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[site_book] set quantity = ? where book_id = (select b.id from dbo.book b where b.code = ?) and site_id = ?";
		$stmt = sqlsrv_query($this->connect, $sql, array($quantity, $code, $site_id));
		return $stmt;
	}
}
?>
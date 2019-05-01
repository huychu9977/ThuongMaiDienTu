<?php
include_once 'Connection.php';
class Product {
	var $connect;
	function __construct() {
		$connection = new Connection();
		$this->connect = $connection->getConnect();
	}
	function getColumns() {
		$sql = "select COLUMN_NAME as c_name
				from INFORMATION_SCHEMA.COLUMNS
				WHERE TABLE_NAME = 'product' and TABLE_SCHEMA = 'a_thuongmai_dientu'";
		$stmt = $this->connect->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = explode("_id", $row['c_name'])[0];
		}
		return $data;
	}
	function findByCode($code) {
		$sql = "select b.* from product b where b.code = ? ";

		$stmt = $this->connect->prepare($sql);
		$stmt->bind_param('s', $code);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_assoc();
		return $result;
	}
	function findDetailByCode($code) {
		$sql = "SELECT
				p.id,
				p.`code`,
				p.`name`,
				p.quantity,
				p.price,
				p.description,
				p.image,
				p.created_date,
				p.type_id,
				t.`name` AS t_name,
				b.`name` AS b_name,
				pc.`name` AS pc_name,
				pr.`name` AS pr_name,
				pos.`name` AS pos_name,
				pu.`name` AS pu_name,
				pss.`name` AS pss_name,
				pst.`name` AS pst_name
			FROM
				product p
			LEFT JOIN product_type t ON t.id = p.type_id
			LEFT JOIN product_branch b ON b.id = p.branch_id
			LEFT JOIN product_color pc ON pc.id = p.color_id
			LEFT JOIN product_ram pr ON pr.id = p.ram_id
			LEFT JOIN product_operating_system pos ON pos.id = p.operating_system_id
			LEFT JOIN product_cpu pu ON pu.id = p.cpu_id
			LEFT JOIN product_screen_size pss ON pss.id = p.screen_size_id
			LEFT JOIN product_status pst ON pst.id = p.status_id
			WHERE
				p.`code` = ?";
		$stmt = $this->connect->prepare($sql);
		$stmt->bind_param('s', $code);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_assoc();
		return $result;
	}
	function findNew() {
		$sql = "SELECT id, code, name, image, price FROM product order by id LIMIT 0,3";
		$stmt = $this->connect->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	function findRecommend($typeId) {
		$sql = "select p.* from product p where p.type_id = ?";
		$stmt = $this->connect->prepare($sql);
		$stmt->bind_param('i', $typeId);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	function search($query, $page, $sort, $page_size) {
		$sql = "select b.id, b.code, b.name, b.description, b.image, b.quantity, b.price, rate.star_rate, rate.count from product b";
		$tmp_sql = "";
		foreach ($query as $key => $value) {
			if ($value["name"] != 'price' && $value["name"] != 'name') {
				$sql .= " inner join product_" . $value["name"] . " a_" . $key . " on a_" . $key . ".id = b." . $value["name"] . "_id" . " and a_" . $key . ".code = '" . $value["code"] . "'";
			} else if ($value["name"] == 'price') {
				$tmp_sql .= " and b.price >= " . $value["from"] . "000 and b.price <= " . $value["to"] . "000";
			} else if ($value["name"] == 'name') {
				$tmp_sql .= " and b.name like '%" . $value["code"] . "%'";
			}
		}
		$sql .= " LEFT JOIN (
					SELECT
						product_id,
						star_rate,
						COUNT(star_rate) count
					FROM
						customer_reviews
					GROUP BY
						product_id,
						star_rate
					ORDER BY count, star_rate
				) rate ON rate.product_id = b.id where 1 = 1";
		$sql .= $tmp_sql;

		$sql .= " GROUP BY b.id order by b." . $sort . " desc limit " . ($page - 1) * $page_size . ", " . $page_size;

		$stmt = $this->connect->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	function count($query) {
		$sql = "select count(1) as total from product b";
		$tmp_sql = "";
		foreach ($query as $key => $value) {
			if ($value["name"] != 'price' && $value["name"] != 'name') {
				$sql .= " inner join product_" . $value["name"] . " a_" . $key . " on a_" . $key . ".id = b." . $value["name"] . "_id" . " and a_" . $key . ".code = '" . $value["code"] . "'";
			} else if ($value["name"] == 'price') {
				$tmp_sql .= " and b.price >= " . $value["from"] . "000 and b.price <= " . $value["to"] . "000";
			} else if ($value["name"] == 'name') {
				$tmp_sql .= " and b.name like '%" . $value["code"] . "%'";
			}
		}
		$sql .= " LEFT JOIN (
					SELECT
						product_id,
						star_rate,
						COUNT(star_rate) count
					FROM
						customer_reviews
					GROUP BY
						product_id,
						star_rate
					ORDER BY count
				) rate ON rate.product_id = b.id where 1 = 1";
		$sql .= $tmp_sql;
		$stmt = $this->connect->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$total = $result->fetch_assoc();
		return $total['total'];
	}
	// lấy thông tin theo tên bảng
	function getProperties($table_name) {
		$sql = "select t.id, t.code, t.name, count(t.id) as total
				from product_" . $table_name . " t left join product b on b." . $table_name . "_id = t.id
				GROUP BY t.id, t.code, t.name";
		$stmt = $this->connect->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	// function checkQuantity($code, $quantity, $site_id) {
	// 	$sql = "select count(1) as total from dbo.[book] b join [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[site_book] sb on sb.book_id = b.id where b.code = ? and sb.quantity >= ? and sb.site_id  = ?";
	// 	$stmt = mysqli_query($this->connect, $sql, array($code, $quantity, $site_id));
	// 	$total = $stmt->fetch_assoc();
	// 	return $total['total'];
	// }
	// function updateProduct($code, $quantity, $site_id) {
	// 	$sql = "update [DESKTOP-BMK7D2Q].[QuanLyBanSach].[dbo].[site_book] set quantity = ? where book_id = (select b.id from dbo.book b where b.code = ?) and site_id = ?";
	// 	$stmt = mysqli_query($this->connect, $sql, array($quantity, $code, $site_id));
	// 	return $stmt;
	// }
}
?>
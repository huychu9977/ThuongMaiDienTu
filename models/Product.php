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
					pst.`name` AS pst_name,
					cr.star_rate,
					count(cr.star_rate) count
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
				LEFT JOIN customer_reviews cr ON cr.product_id = p.id
				WHERE
					p.`code` = ?
				GROUP BY
					cr.star_rate
				ORDER BY
					count DESC
				LIMIT 1";
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
		$sql = "SELECT
					p.id,
					p.image,
					p.description,
					p.name,
					p.code,
					p.price,
					p.quantity,
					rate.star_rate,
					rate.count
				FROM
					product p
				LEFT JOIN (
					SELECT
						cr.product_id,
						cr.star_rate,
						COUNT(cr.star_rate) count
					FROM
						customer_reviews cr
					GROUP BY
						cr.product_id,
						cr.star_rate
					ORDER BY
						count,
						cr.star_rate
				) rate ON rate.product_id = p.id
				WHERE
					p.type_id = ?
				GROUP BY
					p.id";
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
		$sql = "select b.id, b.code, b.name, b.description, b.image, b.quantity, b.price, rate.star_rate, rate.count, ps.sale_percent from product b";
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
				) rate ON rate.product_id = b.id LEFT JOIN product_sale ps ON ps.product_id = b.id where 1 = 1";
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
		$sql .= " where 1 = 1";
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
	function getSliders() {
		$sql = "select * from slider";
		$stmt = $this->connect->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	function getProductSales() {
		$sql = "SELECT p.*, ps.sale_percent FROM product p JOIN product_sale ps ON ps.product_id = p.id ORDER BY p.created_date DESC LIMIT 0,5";
		$stmt = $this->connect->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	function getProductNews() {
		$sql = "SELECT p.* FROM product p ORDER BY p.created_date DESC LIMIT 0,5";
		$stmt = $this->connect->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	function getProductHots() {
		$sql = "SELECT
					od.product_id,
					p.id,
					p.`code`,
					p.`name`,
					p.price,
					p.image,
					o.`code` AS o_code,
					ps.sale_percent,
					sum(od.quantity) AS quantity
				FROM
					`order` o
				JOIN order_detail od ON od.order_id = o.id
				JOIN product p ON p.id = od.product_id
				LEFT JOIN product_sale ps ON p.id = ps.product_id
				GROUP BY
					od.product_id
				ORDER BY
					quantity DESC
				LIMIT 0,
				 5";
		$stmt = $this->connect->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	function checkQuantity($code, $quantity) {
		$sql = "SELECT
					p.`code`
				FROM
					product p
				WHERE
					p.`code` = ?
				AND p.quantity >= ?";
		$stmt = $this->connect->prepare($sql);
		$stmt->bind_param('si', $code, $quantity);
		$stmt->execute();
		$total = $stmt->get_result()->fetch_assoc();
		return $total;
	}
	function updateProduct($code, $quantity) {
		$sql = "update product set quantity = quantity - ? where code = ?";
		$stmt = $this->connect->prepare($sql);
		$stmt->bind_param('is', $quantity, $code);
		$stmt->execute();
		return $stmt;
	}
}
?>
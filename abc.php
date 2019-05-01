<?php
include_once 'models/Connection.php';
function abc($a, $table_name) {
	$conn = new Connection();
	$cus = $conn->getConnect();
	$sql = "select t.id, t.code, t.name, count(t.id) as total
				from product_" . $table_name . " t left join product b on b." . $table_name . "_id = t.id
				GROUP BY t.id, t.code, t.name";
	$stmt = mysqli_query($cus, $sql);
	$data = array();
	while ($row = $stmt->fetch_assoc()) {
		$data[] = $row;
	}
	var_dump($data);
}
$a1 = 'huy@gmail.com';
$b1 = 'branch';
abc($a1, $b1);
?>
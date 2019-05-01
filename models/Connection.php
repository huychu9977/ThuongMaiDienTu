<?php
/**
 *
 */
class Connection {
	var $conn;
	function getConnect() {
		$servername = "localhost";
		$database = "a_thuongmai_dientu";
		$username = "root";
		$password = "";
		$this->conn = mysqli_connect($servername, $username, $password, $database);
		$this->conn->set_charset('utf8');
		if (!$this->conn) {
			die("Lỗi kết nối database" .
				mysqli_connect_error());
		}
		return $this->conn;
	}
}
?>
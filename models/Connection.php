<?php
/**
 *
 */
class Connection {
	var $conn;
	function getConnect() {
		$serverName = "DESKTOP-BMK7D2Q"; //serverName\instanceName
		$connectionInfo = array(
			"Database" => "QuanLyBanSach",
			"UID" => "sa",
			"PWD" => "123456",
			"CharacterSet" => "UTF-8",
		);
		$this->conn = sqlsrv_connect($serverName, $connectionInfo);

		if (!$this->conn) {
			echo "Connection could not be established.<br />";
			die(print_r(sqlsrv_errors(), true));
		}
		return $this->conn;
	}
}
?>
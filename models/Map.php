<?php
include_once 'Connection.php';
/**
 *
 */
class Map {
	var $map_con;
	function __construct() {
		$connect = new Connection();
		$this->map_con = $connect->getConnect();
	}
	function getCity() {
		$sql = "select * from map_city order by name";
		$stmt = $this->map_con->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	function getDistrict($city_code) {
		$sql = "select * from map_district where city_code = ? order by name";
		$stmt = $this->map_con->prepare($sql);
		$stmt->bind_param('s', $city_code);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	function getVillage($district_code) {
		$sql = "select * from map_village where district_code = ? order by name";
		$stmt = $this->map_con->prepare($sql);
		$stmt->bind_param('s', $district_code);
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
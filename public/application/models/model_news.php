<?php
	
class Model_News extends Model {
	public function get_data() {
		$link = mysqli_connect("localhost", "db_name", "db_password", "db_name");
		if ($link == false) {
			print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
		}
		else {
			mysqli_set_charset($link, "utf8");
			$sql = 'SELECT date, title, announce, content, image FROM news WHERE id = '.$_GET['id'];
			$result = mysqli_query($link, $sql);
			$array;
			while($row = mysqli_fetch_array($result)) {
				$array[] = $row;
			}
			return $array;
		}
	}
}
	
?>

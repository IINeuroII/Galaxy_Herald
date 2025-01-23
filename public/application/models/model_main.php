<?php

class Model_Main extends Model
{
	public function get_data() {
		$link = mysqli_connect("MySQL-8.0", "root", "", "task_db");
		if ($link == false) {
			print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
		}
		else {
			mysqli_set_charset($link, "utf8");
			
			$id = 0;
			if (isset($_GET['id']))
				$id = $_GET['id'];
			
			$data = array(
				"news" => array(),
				"fon" => array(),
				"pagination" => array()
			);
			
			$result = mysqli_query($link, "SELECT title, announce, image FROM news ORDER BY Date DESC LIMIT 1");
			foreach ($result as $fon) {
				$data["fon"]["title"] = $fon['title'];
				$data["fon"]["announce"] = $fon['announce'];
				$data["fon"]["image"] = $fon['image'];
			}
			
			$sql = 'SELECT id, title, announce, date FROM news ORDER BY date DESC LIMIT '.($id * 4).', 4';
			$result = mysqli_query($link, $sql);
			while($row = mysqli_fetch_array($result)) {
				$data["news"][] = $row;
			}
			
			$count_db = mysqli_query($link, 'SELECT COUNT(*) AS count FROM news');
			$count_sql = mysqli_fetch_array($count_db);
			$count = $count_sql['count'];
			
			$page_links = [ $id > 0 ? 1 : 0,
							0, 0, 0,
							($id + 1) < ceil($count / 4) ? 1 : 0];
			
			$first_page = intdiv($id, 3) * 3;
			for ($page = 0; $page < 3; $page++) {
				if (($first_page + $page) < ceil($count / 4)) {
					$page_links[$page + 1] = $page + $first_page + 1;
				}
			}
			$data["pagination"] = $page_links;
			
			return $data;
		}
	}
}

?>

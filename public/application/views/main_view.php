<script>
	function ScrollY() {
		let news = document.getElementById("news");
		window.onbeforeunload = () => sessionStorage.setItem('scrollPos', news.offsetTop);
	}
	window.onload = () => window.scrollTo({
		top: sessionStorage.getItem('scrollPos') || 0,
		behavior: "smooth"
	});
</script>
<?php
	echo '<link async rel="stylesheet" type="text/css" href="/css/main.css?ver='.filemtime('css/main.css').'" />';
	echo '<div class = "fon" style = "background: url(\'/images/'.$data["fon"]["image"].'\') no-repeat center center; background-size: cover">';
		echo '<div class = "fon_text">';
			echo '<div class = "fon_title">'.$data["fon"]["title"].'</div>';
			echo '<div class = "fon_announce">'.$data["fon"]["announce"].'</div>';
		echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '<div class = "news_title indent">Новости</div>';
	$news = $data["news"];
	echo '<div id = "news" class = "cards indent">';
		foreach ($news as $row)
		{
			echo '<a class = "card" href = "/news?id='.$row['id'].'">';
				echo '<div class = "card_date">'.date('d.m.Y', strtotime($row['date'])).'</div>';
				echo '<div class = "card_head">'.$row['title'].'</div>';
				echo '<div class = "card_description">'.$row['announce'].'</div>';
				echo '<div class = "card_button"> ПОДРОБНЕЕ <div class="arrow-right"> <div> </div> </div> </div>';
			echo '</a>';
		}
	echo '</div>';
	echo '<div class = "pagination indent">';
		$pagination = $data["pagination"];
		$id = 0;
		if (isset($_GET['id']))
			$id = $_GET['id'];
		if ($pagination[0] == 1)
			echo '<a onClick="return ScrollY();" href="/main?id='.($_GET["id"] - 1).'"> <div class = "pagination_arrow">
						<div class="arrow-left"> <div> </div> </div>
					</div>
				</a>';
		for ($page = 1; $page < 4; $page++) {
			if (($pagination[$page] - 1) == $id)
				echo '<div class = "pagination_active_page">'.$pagination[$page].'</div>';
			else if ($pagination[$page] != 0) {
				echo '<div class = "pagination_page">'.$pagination[$page].'</div>';
			}
		}
		if ($pagination[4] == 1)
			echo '<a onClick="return ScrollY(this);" href="/main?id='.($id + 1).'">
					<div class = "pagination_arrow">
						<div class="arrow-right"> <div> </div> </div>
					</div>
				</a>';
	echo '</div>';
?>
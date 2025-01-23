<?php
	echo '<link async rel="stylesheet" type="text/css" href="/css/news.css?ver='.filemtime('css/news.css').'" />';
	foreach ($data as $row) {
		echo '<div class = "indent">';
			echo '<div class = "news_head"> Главная / '.$row['title'].'</div>';
			echo '<div class = "news_title">'.$row['title'].'</div>';
			echo '<div class = "card_date">'.date('d.m.Y', strtotime($row['date'])).'</div>';
		echo '</div>';
		echo '<div class = "news indent">';
			echo '<div class = "news_image">';
				echo '<image src = "/images/'.$row['image'].'">';
			echo '</div>';
			echo '<div class = "card_head">'.$row['announce'].'</div>';
			echo '<div class = "card_description">'.$row['content'].'</div>';
			echo '<a href = "main">';
			echo '<div class = "news_button"> <div class = "arrow-left"> <div> </div> </div> Назад к новостям </div>';
			echo '</a>';
		echo '</div>';
	}
?>
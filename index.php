<?php
	// simple_html_dom.phpをインクルード
	include_once('simplehtmldom_1_5/simple_html_dom.php');
	$filename = "count.txt";

	// スクレイピングしたいURLを指定
	$html = file_get_html( 'http://blogs.yahoo.co.jp/minamihata55/35579205.html' );
	//echo $html;
	
	$people = $html->find('div.moduleTableArea table tbody tr td');

	$date = date('Y / m / d ');
	file_put_contents($filename, $date.' ' , FILE_APPEND);

	foreach ($people as $key => $varlue) {
		if ($key >= 8) {
			break;
		}else if($key%2 == 0){
			echo($varlue);
			file_put_contents($filename, $varlue->plaintext.' ' , FILE_APPEND);

		}

	}
	file_put_contents($filename,"\n" , FILE_APPEND);
	
	$html->clear();
?>
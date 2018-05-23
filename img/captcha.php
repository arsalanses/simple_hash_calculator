<?php
	session_start();
	$code = rand(1000,9999);
	$_SESSION["code"] = $code;

	$image = imagecreatetruecolor(50, 20);

	$white = imagecolorallocate($image, 255, 255, 255);
	$black = imagecolorallocate($image, 0, 0, 0);
	$red = imagecolorallocate($image, 255, 0, 0);
	$green = imagecolorallocate($image, 0, 255, 0);

	$text = imagecolorallocate($image, 12, 5, 120);
	$background = imagecolorallocate($image, 198, 198, 198);

	imagefill($image, 0, 0, $background);
	/*
	imagettftext($image, 14, 10, 10, 20, $text, 'times.ttf', $code);
	*/
	imagestring($image, 5, 5, 3,  $code, $text);
	header("Content-type: image/png");
	imagepng($image);
	imagedestroy($image);
?>
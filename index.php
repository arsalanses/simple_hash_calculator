<!DOCTYPE html>
<html>
	<head>
		<title>Hash Calculator</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="img/favicon.ico" rel="shortcut icon">
		<style>
			body {
				font-family: Verdana, Arial, Helvetica, sans-serif;
				font-size: 11px;
				color: #aaaaaa;
				background-color: #000000;
				background-image: url(img/footsteps-tile.gif);
				background-repeat: repeat;
			}
			.captcha {
				padding-top:5px;
				padding-right:5px;
			}
			textarea, input {
				font-family: Verdana, Arial, Helvetica, sans-serif;
				font-size: 11px;
				padding: 2px;
				background-color: #333344;
				color: #cccccc;
				border: solid 2px #2271e2;
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				-khtml-border-radius: 4px;
				border-radius: 4px;
			}
			a:link {
				text-decoration: none;
				color: #FFCC00;
			}
			a:visited {
				text-decoration: none;
				color: #FFCC00;
			}
			a:hover, a:active {
				text-decoration: underline;
				color: #66CCFF;
			}
			.qr {
				font-family: "Courier New", Courier, monospace;
				font-size: 11px;
				padding: 2px;
				background-color: #333344;
				background-image: none;
				color: #cccccc;
				border: solid 2px #666666;
				width: auto;
				min-height: auto;
				display: block;
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				-khtml-border-radius: 4px;
				border-radius: 4px;
			}
			.fauxbutton {
				font-family: Verdana, Arial, Helvetica, sans-serif;
				font-size: 11px;
				border: 1px solid #1f54bc;
				background: url(img/btn-tile-dblue.gif);
				background-color: #c3e1f7;
				background-repeat: repeat-x;
				background-position: center;
				color: #000000;
				outline: none;
				padding: 2px 4px 2px 4px;
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				-khtml-border-radius: 4px;
				border-radius: 4px;
			}
			.fauxbutton:active, .fauxbutton:hover {
				border: 1px solid #dea303;
				background: url(img/btn-tile-over.gif);
				background-color: #c3e1f7;
				background-repeat: repeat-x;
				background-position: center;
				outline: none;
				cursor: pointer;
				padding: 2px 4px 2px 4px;
			}
			.red-box {
				background-color: #663333;
				border: solid 1px #ff6666;
				padding: 3px;
				color: #ff6666;
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				-khtml-border-radius: 4px;
				border-radius: 4px;
				width: 480px;
			}
			.grey-box {
				background-color: #333333;
				border: solid 1px #999999;
				padding: 3px;
				color: #cccccc;
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				-khtml-border-radius: 4px;
				border-radius: 4px;
				width: 480px;
			}
			.blue-box {
				background-color: #333366;
				border: solid 1px #9999ff;
				padding: 3px;
				color: #9999ff;
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				-khtml-border-radius: 4px;
				border-radius: 4px;
				width: 480px;
			}
			.green-box {
				background-color: #336633;
				border: solid 1px #33ff33;
				padding: 3px;
				color: #33ff33;
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				-khtml-border-radius: 4px;
				border-radius: 4px;
				width: 480px;
			}
			.main {
				padding-left:64px;
				padding-right:64px;
			}
			.md5-side {
				background-image: url(img/side-tile.gif);
				background-repeat: repeat-x;
				line-height: 32px;
			}
			.md5-side-left {
				background-image: url(img/side-left.gif);
				background-repeat: no-repeat;
				background-position: left;
			}
			.md5-side-right {
				background-image: url(img/side-right.gif);
				background-repeat: no-repeat;
				background-position: right;
				padding-left: 32px;
			}
			.textarea {
				width:480px;
				margin: 0px;
				resize: none;
				outline: none;
				overflow: auto;
				background-image: url(img/ash.png) right;
				/*opacity: 0.2;*/
			}
		</style>
	</head>
	<body>
		<div class="main">
			<img border="0" src="img/left-logo.gif" width="185" height="73" alt="left-logo-img">
			<img border="0" src="img/logo.png" width="301" height="28" alt="Hash Calculator" style="padding:20px;"><br><br>
			<div class="md5-side"><div class="md5-side-left"><div class="md5-side-right"><strong>Hash:</strong></div></div></div><br>
			<form method="POST" action="">
				Word: <input type="text" name="word" value="Hash"><br>
				Sec.Code: <img src="img/captcha.php" class="captcha"><input name="captcha" type="text" style="width:58px;"><br>
				<input name="submit" type="submit" value="Hash It !" class="fauxbutton"/>
			</form>
			<br>
			<textarea class="textarea" cols="20" rows="8" readonly>
				<?php
					session_start();
					if(isset($_POST['captcha'])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"]) {
						$word = $_POST['word'];
						echo "Word = ".$word."\r\n";
						echo "MD5 Hash = ".md5($word)."\r\n";
						echo "SHA1 Hash = ".sha1($word)."\r\n";
						echo "rot13 = ".str_rot13($word)."\r\n";
						echo "Base64_Encode = ".base64_encode($word)."\r\n";
						echo "Base64_Decode = ".base64_decode($word)."\r\n";
						echo "Hash Calculator";
					} else {
						echo "[ Enter Security Code ]"."\r\n";
						echo "Word = "."\r\n";
						echo "MD5 Hash = "."\r\n";
						echo "SHA1 Hash = "."\r\n";
						echo "rot13 = "."\r\n";
						echo "Base64_Encode = "."\r\n";
						echo "Base64_Decode = "."\r\n";
						echo "Hash Calculator";
					}
				?>
			</textarea>
			<br><br>
			<div class="md5-side"><div class="md5-side-left"><div class="md5-side-right"><strong>QR-Code:</strong></div></div></div><br>
			<form method="POST" action="">
				Word: <input type="text" name="qr-code" value="qr-code">
				Size: <input type="text" name="qr-size" value="qr-Size ( 1-10 )"><br>
				<input name="qr" type="submit" value="QR It !" class="fauxbutton">
			</form>
			<?php
				if(isset($_POST['qr'])) {
					$code = $_POST['qr-code'];
					$size = $_POST['qr-size'];
					echo "<p align=\"left\" class=\"qr\">";
					echo "Word = ".$code."<br/>";
					echo "Size = ".$size."<br/><br/>";
					echo "<a href=\"\" target=\"_blank\"><img border=\"0\" src=\"http://qr-code.ir/api/api-qrcode.php?s=$size&d=$code\" title=\"My QR-Code\" alt=\"My QR-Code\"></a></p>";
				}
			?>
			<br><hr><br>
			<center>
				<div class="grey-box" align="center">
					<strong>Hash Calculator - v1.0<br>Css Style: md5decrypter.co.uk<br>By: arsalanse</strong><br><br>
				</div>
			</center>
		</div>
	</body>
</html>
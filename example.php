<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class.detectbrowser.php');
$endorphin = new DetectBrowser();
$browser = $endorphin->get_browser();
$os = $endorphin->get_os();
$device = $endorphin->get_device();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Endorphin PHP lib Example</title>
		<style>
			html
			{
				background: url("/images/bg.png");
				font-size: 12px;
				font-family: Segoe UI,Ubuntu,Tahoma;
			}
			.container
			{
				width: 400px;
				margin: 10% auto;
			}
			.block
			{
				background-color: #000;
				overflow: auto;
				opacity: 0.7;
				-webkit-border-radius: 10px;
				-moz-border-radius: 10px;
				border-radius: 10px;
				margin: 10px 0px;
			}
			.block *
			{
				opacity: 1;
			}

			.icon
			{
				width: 96px;
				height: 96px;
				padding: 15px;
				float: left;
			}
			.info
			{
				float: left;
				vertical-align: center;
				padding: 30px 25px;
				color: #fff;
				height: 100%;
				margin: auto 20px;
				width: 170px;
				min-height: 40px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="block">
				<div class="icon">
					<img src="/images/<? echo $browser['name'];?>.png" />
				</div>
				<div class="info">
					<div>Your Browser is: <? echo $browser['name']; ?></div>
					<div>Browser version: <? echo $browser['version']; ?></div>
					<div>Browser type: <? echo $browser['type']; ?></div>
				</div>
			</div>
			<div class="block">
				<div class="icon">
					<img src="/images/<? echo $device['type'];?>.png" />
				</div>
				<div class="info">
					<div>Your Device is: <? echo $device['name']; ?></div>
					<div>Device type: <? echo $device['type']; ?></div>
				</div>
			</div>
			<div class="block">
				<div class="icon">
					<img src="/images/<? echo $os['name'];?>.png" />
				</div>
				<div class="info">
					<div>Your OS is: <? echo $os['name']; ?></div>
					<? if(isset($os['version']))
					{?>
					<div>OS version: <? echo $os['version']; ?></div>
					<?}?>
					<div>OS type: <? echo $os['type']; ?></div>
					<div>OS family: <? echo $os['family']; ?></div>
				</div>
			</div>
		</div>
	</body>
</html>

##EN
	Author: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	Current Version: 1.1.1
	Last Update: 21.12.2012
	License: GPL

Demo: http://endorphinua.ru/

How to use:

	<?php
		include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class.detectbrowser.php'); //including lib
		$detector = new DetectBrowser(); // detection
	?>

Methods:

	get_os() - get information about user Operating System
	get_device() - get information about user Device
	get_browser() - get information about user Browser
	
Example:

	<?
		$os = $detector->get_os();
		print_r($os);
		$device = $detector->get_device();
		print_r($device);
		$browser = $detector->get_browser();
		print_r($browser);
	?>
OS structure:

	Array
	(
		[name] => Ubuntu
		[family] => unix
		[type] => desktop
	)

DEVICE structure:

	Array
	(
		[name] => PC
		[type] => pc
	)

BROWSER structure:

	Array
	(
		[name] => Firefox
		[version] => 15.0
		[type] => desktop
	)
##RU
	Автор: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	Текущая версия: 1.1.1
	Последнее обновление: 21.12.2012
	Лицензия: GPL

Демо: http://endorphinua.ru/

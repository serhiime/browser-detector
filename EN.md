
	Author: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	Current Version: 1.1.9
	Last Update: 13.03.2015
	License: GPL
	Last Readme Fix: 03.06.2015

Demo: http://detector.endorphinua.ru/

**How to use:**

	<?php
		include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class.detectbrowser.php'); //including lib
		$detector = new DetectBrowser(); // detection
	?>

**Methods:**

	getOs() - Get information about user Operating System
	getDevice() - Get information about user Device
	getBrowser() - Get information about user Browser
	getUa() - Get User Agent string
	getAll() - Get All information (browser,device,os)
	printAll() - Print All information (for debug)
	
**Example:**

	<?
		$os = $detector->getOs();
		print_r($os);
		$device = $detector->getDevice();
		print_r($device);
		$browser = $detector->getBrowser();
		print_r($browser);
	?>
**OS structure:**

	Array
	(
		[name] => Ubuntu
		[family] => unix
		[type] => desktop
	)

**DEVICE structure:**

	Array
	(
		[name] => PC
		[type] => pc
	)

**BROWSER structure:**

	Array
	(
		[name] => Firefox
		[version] => 15.0
		[type] => desktop
	)

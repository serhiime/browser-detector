##EN
	Author: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	Current Version: 1.1.6
	Last Update: 06.04.2012
	License: GPL

Demo: http://endorphinua.ru/

Browser screenshot from Desktop:

![Demo](http://endorphinua.ru/images/demo.png)

Browser screenshot from iPhone (Opera Mini):

![Demo](http://endorphinua.ru/images/iPhone-Screenshot.png)

Browser screenshot from iPhone (Safari):

![Demo](http://endorphinua.ru/images/iPhone-Safari.png)

**How to use:**

	<?php
		include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class.detectbrowser.php'); //including lib
		$detector = new DetectBrowser(); // detection
	?>

**Methods:**

	get_os() - get information about user Operating System
	get_device() - get information about user Device
	get_browser() - get information about user Browser
	
**Example:**

	<?
		$os = $detector->get_os();
		print_r($os);
		$device = $detector->get_device();
		print_r($device);
		$browser = $detector->get_browser();
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
##RU
	РђРІС‚РѕСЂ: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	РўРµРєСѓС‰Р°СЏ РІРµСЂСЃРёСЏ: 1.1.2
	РџРѕСЃР»РµРґРЅРµРµ РѕР±РЅРѕРІР»РµРЅРёРµ: 22.12.2012
	Р›РёС†РµРЅР·РёСЏ: GPL

Р”РµРјРѕ: http://endorphinua.ru/


**Р�СЃРїРѕР»СЊР·РѕРІР°РЅРёРµ:**

	<?php
		include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class.detectbrowser.php'); //РїРѕРґРєР»СЋС‡Р°РµРј Р±РёР±Р»РёРѕС‚РµРєСѓ
		$detector = new DetectBrowser(); // РѕРїСЂРµРґРµР»РµРЅРёРµ РѕСЃ, СѓСЃС‚СЂРѕР№СЃС‚РІР° Рё Р±СЂР°СѓР·РµСЂР°
	?>

**РњРµС‚РѕРґС‹:**

	get_os() - РїРѕР»СѓС‡РµРЅРёРµ Р°СЃСЃРѕС†РёР°С‚РёРІРЅРѕРіРѕ РјР°СЃСЃРёРІР° СЃ РёРЅС„РѕСЂРјР°С†РёРµР№ Рѕ РћРЎ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ
	get_device() - РїРѕР»СѓС‡РµРЅРёРµ Р°СЃСЃРѕС†РёР°С‚РёРІРЅРѕРіРѕ РјР°СЃСЃРёРІР° СЃ РёРЅС„РѕСЂРјР°С†РёРµР№ Рѕ СѓСЃС‚СЂРѕР№СЃС‚РІРµ СЃ РєРѕС‚РѕСЂРѕРіРѕ
	РїРѕР»СЊР·РѕРІР°С‚РµР»СЊ РїСЂРѕСЃРјРѕС‚СЂРёРІР°РµС‚ СЃС‚СЂР°РЅРёС†Сѓ
	get_browser() - РїРѕР»СѓС‡РµРЅРёРµ Р°СЃСЃРѕС†РёР°С‚РёРІРЅРѕРіРѕ РјР°СЃСЃРёРІР° СЃ РёРЅС„РѕСЂРјР°С†РёРµР№ Рѕ Р±СЂР°СѓР·РµСЂРµ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ
	
**РџСЂРёРјРµСЂ:**

	<?
		$os = $detector->get_os(); // РїРѕР»СѓС‡Р°РµРј РёРЅС„РѕСЂРјР°С†РёСЋ Рѕ РћРЎ
		print_r($os); // РІС‹РІРѕРґРёРј СЃС‚СЂСѓРєС‚СѓСЂСѓ РћРЎ
		$device = $detector->get_device(); // РїРѕР»СѓС‡Р°РµРј РёРЅС„РѕСЂРјР°С†РёСЋ Рѕ СѓСЃС‚СЂРѕР№СЃС‚РІРµ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ
		print_r($device); // РІС‹РІРѕРґРёРј СЃС‚СЂСѓРєС‚СѓСЂСѓ СѓСЃС‚СЂРѕР№СЃС‚РІР°
		$browser = $detector->get_browser(); // РїРѕР»СѓС‡Р°РµРј РёРЅС„РѕСЂРјР°С†РёСЋ Рѕ Р±СЂР°СѓР·РµСЂРµ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ
		print_r($browser); // РІС‹РІРѕРґРёРј СЃС‚СЂСѓРєС‚СѓСЂСѓ Р±СЂР°СѓР·РµСЂР°
	?>
**РЎС‚СЂСѓРєС‚СѓСЂР° РћРЎ:**

	Array
	(
		[name] => Ubuntu
		[family] => unix
		[type] => desktop
	)

**РЎС‚СЂСѓРєС‚СѓСЂР° СѓСЃС‚СЂРѕР№СЃС‚РІР°:**

	Array
	(
		[name] => PC
		[type] => pc
	)

**РЎС‚СЂСѓРєС‚СѓСЂР° Р±СЂР°СѓР·РµСЂР°:**

	Array
	(
		[name] => Firefox
		[version] => 15.0
		[type] => desktop
	)

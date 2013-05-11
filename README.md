##EN
	Author: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	Current Version: 1.1.7
	Last Update: 11.05.2013
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

	getOs() - get information about user Operating System
	getDevice() - get information about user Device
	getBrowser() - get information about user Browser
	
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
##RU
	Автор: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	Последняя версия: 1.1.7
	Последнее обновление: 11.05.2013
	Лицензия: GPL

Демо: http://endorphinua.ru/


**Как использовать:**

	<?php
		include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class.detectbrowser.php'); //подключаем библиотеку
		$detector = new DetectBrowser(); // инициализируем объект
	?>

**Методы:**

	getOs() - Получение данных о операционной системе пользователя
	getDevice() - Получение данных о устройстве пользователя
	getBrowser() - Получение данных о браузере пользователя
	
**Пример:**

	<?
		$os = $detector->getOs(); // получаем данные о операционной системе
		print_r($os); // выводим структуру массива
		$device = $detector->getDevice(); // получаем данные о устройтве
		print_r($device);  // выводим структуру массива
		$browser = $detector->getBrowser(); // Получаем данны о браузере
		print_r($browser);  // выводим структуру массива
	?>
**Структура $os:**

	Array
	(
		[name] => Ubuntu
		[family] => unix
		[type] => desktop
	)

**Структура $device:**

	Array
	(
		[name] => PC
		[type] => pc
	)

**Структура $browser:**

	Array
	(
		[name] => Firefox
		[version] => 15.0
		[type] => desktop
	)

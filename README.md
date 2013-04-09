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
	Автор: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	Последняя версия: 1.1.6
	Последнее обновление: 06.04.2012
	Лицензия: GPL

Демо: http://endorphinua.ru/


**Как использовать:**

	<?php
		include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class.detectbrowser.php'); //подключаем библиотеку
		$detector = new DetectBrowser(); // инициализируем объект
	?>

**Методы:**

	get_os() - Получение данных о операционной системе пользователя
	get_device() - Получение данных о устройстве пользователя
	get_browser() - Получение данных о браузере пользователя
	
**Пример:**

	<?
		$os = $detector->get_os(); // получаем данные о операционной системе
		print_r($os); // выводим структуру массива
		$device = $detector->get_device(); // получаем данные о устройтве
		print_r($device);  // выводим структуру массива
		$browser = $detector->get_browser(); // Получаем данны о браузере
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

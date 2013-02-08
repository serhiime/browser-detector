##EN
	Author: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	Current Version: 1.1.2
	Last Update: 22.12.2012
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
	Текущая версия: 1.1.2
	Последнее обновление: 22.12.2012
	Лицензия: GPL

Демо: http://endorphinua.ru/


**Использование:**

	<?php
		include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class.detectbrowser.php'); //подключаем библиотеку
		$detector = new DetectBrowser(); // определение ос, устройства и браузера
	?>

**Методы:**

	get_os() - получение ассоциативного массива с информацией о ОС пользователя
	get_device() - получение ассоциативного массива с информацией о устройстве с которого
	пользователь просмотривает страницу
	get_browser() - получение ассоциативного массива с информацией о браузере пользователя
	
**Пример:**

	<?
		$os = $detector->get_os(); // получаем информацию о ОС
		print_r($os); // выводим структуру ОС
		$device = $detector->get_device(); // получаем информацию о устройстве пользователя
		print_r($device); // выводим структуру устройства
		$browser = $detector->get_browser(); // получаем информацию о браузере пользователя
		print_r($browser); // выводим структуру браузера
	?>
**Структура ОС:**

	Array
	(
		[name] => Ubuntu
		[family] => unix
		[type] => desktop
	)

**Структура устройства:**

	Array
	(
		[name] => PC
		[type] => pc
	)

**Структура браузера:**

	Array
	(
		[name] => Firefox
		[version] => 15.0
		[type] => desktop
	)

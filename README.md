	Author: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	Current Version: 1.1.9
	Last Update: 13.03.2015
	License: GPL
	Last Readme Fix: 19.07.2013
	
Документация: ![ru](http://detector.endorphinua.ru/images/ru.png) [Русский](https://github.com/endorphinua/browser-os-device-detect#ru)
Documentation: ![en](http://detector.endorphinua.ru/images/en.png) [English](https://github.com/endorphinua/browser-os-device-detect#en)

##EN
	Author: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	Current Version: 1.1.9
	Last Update: 13.03.2015
	License: GPL
	Last Readme Fix: 19.07.2013

Demo: http://detector.endorphinua.ru/

Browser screenshot from Desktop:

![Demo](http://detector.endorphinua.ru/images/demo.png)

Browser screenshot from iPhone (Opera Mini):

![Demo](http://detector.endorphinua.ru/images/iPhone-Screenshot.png)

Browser screenshot from iPhone (Safari):

![Demo](http://detector.endorphinua.ru/images/iPhone-Safari.png)

Browser screenshot from Nokia Lumia 620:

![Demo](http://detector.endorphinua.ru/images/Lumia-620.png)

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
##RU
	Автор: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	Последняя версия: 1.1.8
	Последнее обновление: 28.05.2013
	Лицензия: GPL

Демо: http://detector.endorphinua.ru/

Скриншот из браузера на ПК:

![Demo](http://detector.endorphinua.ru/images/demo.png)

Скриншот из браузера на iPhone (Opera Mini):

![Demo](http://detector.endorphinua.ru/images/iPhone-Screenshot.png)

Скриншот из браузера на iPhone (Safari):

![Demo](http://detector.endorphinua.ru/images/iPhone-Safari.png)

Скриншот браузера на Nokia Lumia 620:

![Demo](http://detector.endorphinua.ru/images/Lumia-620.png)



**Как использовать:**

	<?php
		include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class.detectbrowser.php'); //подключаем библиотеку
		$detector = new DetectBrowser(); // инициализируем объект
	?>

**Методы:**

	getOs() - Получение данных о операционной системе пользователя
	getDevice() - Получение данных о устройстве пользователя
	getBrowser() - Получение данных о браузере пользователя
	getUa() - Возвращает User Agent строку браузера
	getAll() - Получение всех данных (Браузер,Устройство,ОС)
	printAll() - Выводит всю информацию (можно использовать для отладки)
	
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

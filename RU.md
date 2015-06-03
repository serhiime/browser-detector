
	Автор: Sergey Nehaenko <sergey.nekhaenko@gmail.com>
	Последняя версия: 1.1.9
	Последнее обновление: 13.03.2015
	Лицензия: GPL

Демо: http://detector.endorphinua.ru/

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

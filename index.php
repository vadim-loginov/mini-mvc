<?php

namespace minimvc;

require_once 'minimvc/Config.php';

/*
 * Автозагрузка классов
 */

spl_autoload_register(function ($className) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $className) . '.php';
});

/*
 * Маршрутизация
 * Все запросы приходят сюда благодаря RewriteEngine (см .htaccess)
 */

// Из URL определим названия контроллера, его метода, передаваемые параметры
$url = explode('/', $_SERVER['REQUEST_URI']);
//var_dump($url);
$controllerName = (!empty($url[1])) ? ucfirst(strtolower($url[1])) . 'Ctrl' : '';
$actionName = (!empty($url[2])) ? 'action' . ucfirst(strtolower($url[2])) : '';
$params = (!empty($url[3])) ? $url[3] : null;               // ДОРАБОТАТЬ!

// Создаём контроллер
$controllerPath = 'minimvc/controllers/' . $controllerName . '.php';
if (file_exists($controllerPath)) {
    // Если существует файл с классом контроллера, создаём контроллер
    $controllerName = 'minimvc\\controllers\\' . $controllerName;
    $controller = new $controllerName;
} else {
    // В случае когда контроллер просто не указан, работаем по умолчанию
    if (empty($url[1])) {
        // Отобразим главную страницу сайта
        $controllerName = 'minimvc\\controllers\\' . Config::$defaultCtrl;
        $controller = new $controllerName;
        $actionName = Config::$defaultAction;
    } else {
        echo 'Not Found';
        http_response_code(404);
        exit;
    }
}
// Вызываем метод контроллера
if (method_exists($controller, $actionName)) {
    // Если у контроллера существует указанный метод, вызываем его
    $controller->$actionName($params);
} else {
    // Иначе ошибка (пусть контроллер сам решит как её выводить)
    $controller->error(404);
}

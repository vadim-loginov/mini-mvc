<?php

namespace minimvc\controllers;

use minimvc\core\BaseCtrl;

/*
 * Контроллер для работы со страницами вебсайта
 */

class PageCtrl extends BaseCtrl
{

    public function actionHome() {
        $this->view->renderPage('home', 'default');
    }

    // Переопределим метод базового класса для вывода ошибки в шаблоне
    public function error($errorCode) {
        switch ($errorCode) {
            case 404:
                http_response_code($errorCode);
                $this->view->renderPage('404', 'default');
                break;
        }
    }

}

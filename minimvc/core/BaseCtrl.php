<?php

namespace minimvc\core;




/*
 * Контроллер для работы со страницами вебсайта
 */

class BaseCtrl
{
    protected $view;
    
    public function __construct() {
        $this->view = new View;
    }
    
    public function error($errorCode) {
        switch ($errorCode) {
            case 404:
                http_response_code($errorCode);
                echo 'Not Found';
                break;
        }
    }

}

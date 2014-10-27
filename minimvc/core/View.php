<?php

namespace minimvc\core;

use minimvc\Config;

/*
 * Объект Вида
 */

class View
{

    public $view;
    private $viewContent;
    private $pageTitle;
    private $headLinks = array();

    private function renderView($viewName) {
        $viewName = $_SERVER['DOCUMENT_ROOT'] . '/minimvc/views/' . $viewName . '.php';
        if (is_file($viewName)) {
            ob_start();
            include $viewName;
            return ob_get_clean();
        }
        return false;
    }

    public function renderPage($viewName, $layoutName) {
        $this->viewContent = $this->renderView($viewName);
        include $_SERVER['DOCUMENT_ROOT'] . '/minimvc/views/layouts/' . $layoutName . '.php';
    }

    public function headLinks(array $links = null) {
        if (empty($links)) {
            // Если не задан $link, выводим всё
            foreach ($this->headLinks as $value) {
                echo "$value\n";
            }
        } else {
            $this->headLinks = array_merge($this->headLinks, $links);            
        }
    }
    
    public function pageTitle($title = null) {
        if (empty($title)) {
            // Если не задан $title, выводим всё
            echo $this->pageTitle;
        } else {
            $this->pageTitle = $title;
        }
    }

}

<?php

namespace core\base;

class View
{
    public $route = [];
    public $view;
    public $layout;
    public $scripts = [];

    public function __construct($route, $layout = '', $view = '') {
        $this->route = $route;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    public function render($vars) {
        extract($vars);
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view)) {
            require $file_view;
        } else {
            echo "<p>View <b>{$file_view}</b> not found</p>";
        }
        $content = ob_get_clean();

        if ($this->layout !== false) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)) {
                $content = $this->getScripts($content);
                require $file_layout;
            } else {
                echo "<p>Layout <b>{$file_layout}</b> not found</p>";
            }
        } else {
            echo $content;
        }
    }

    protected function getScripts($content) {
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content, $this->scripts);
        if (!empty($this->scripts)) {
            $content = preg_replace($pattern, '', $content);
        }
        return $content;
    }

    public function showScripts() {
        $scripts = [];
        if (!empty($this->scripts[0])) {
            $scripts = $this->scripts[0];
        }
        foreach ($scripts as $script) {
            echo $script;
        }
    }
}

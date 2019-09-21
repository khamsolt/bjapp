<?php


namespace App\View;


class Manager
{
    private $layoutDir = 'layout';
    private $viewName;
    private $viewPath;
    private $data;
    private $layout = 'app';
    private $path = ROOT . '/resources/views';

    /**
     * Manager constructor.
     * @param string $viewName
     * @param string $ViewPath
     */
    public function __construct(string $viewName, string $ViewPath)
    {
        $this->data = [];
        $this->viewName = $viewName;
        $this->viewPath = $ViewPath;
    }

    /**
     * @param string $viewName
     * @param string $ViewPath
     * @return static
     */
    public static function make(string $viewName, string $ViewPath): self
    {
        $instance = new self($viewName, $ViewPath);
        return $instance;
    }

    /**
     * @param string $key
     * @param $data
     */
    public function with(string $key, $data): self
    {
        $this->data[$key] = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->makeTemplate();
    }

    /**
     * @return false|string
     */
    private function makeTemplate()
    {
        if (is_file($layout = $this->makeLayoutPath())) {
            ob_start();
            if (is_file($view = $this->makeViewPath())) {
                if (count($this->data)) {
                    extract($this->data);
                }
                include_once $view;
                $content = ob_get_clean();
            }
            ob_start();
            include_once $layout;
            return ob_get_clean();
        }
        return '';
    }

    /**
     * @return string
     */
    private function makeLayoutPath(): string
    {
        return $path = $this->path . DIRECTORY_SEPARATOR . $this->layoutDir . DIRECTORY_SEPARATOR . $this->layout . '.php';
    }

    /**
     * @return string
     */
    private function makeViewPath(): string
    {
        return $this->path . DIRECTORY_SEPARATOR . $this->viewPath . DIRECTORY_SEPARATOR . $this->viewName . '.php';
    }
}
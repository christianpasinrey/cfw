<?php

namespace Cfw\Html;

class Component
{
    private $dir;
    public function __construct()
    {
    }

    /**
     * Get the path to the html pages directory
     * @return string
     */
    public static function getDir(): string
    {
        return dirname(__DIR__, 2) . '/src/html/components/';
    }

    /**
     * Render the html component
     * @param string $component_name
     * @return string
     */
    public static function render(string $component_name): string
    {
        $file = self::getDir() . $component_name . '.html';
        if (file_exists($file)) {
            require_once $file;
        } else {
            echo "
            <div style='display:grid;place-items:center;height:100vh;'>
                <h1 style='color:red;text-align:center'>The html cannot be found, please check the file name<br/> '$file'</h1>
            </div>";
        }
        return ob_get_clean();
    }
}

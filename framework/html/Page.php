<?php

namespace Cfw\Html;

class Page
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
        return dirname(__DIR__, 2) . '/src/html/pages/';
    }

    /**
     * Render the html page
     * @param string $page_name
     * @return string
     */
    public static function render(string $page_name, array $variables): string
    {
        $file = self::getDir() . $page_name . '.html';
        if (file_exists($file)) {
            ob_start();
            extract($variables);
            require_once $file;
        } else {
            echo "
            <div style='display:grid;place-items:center;height:100dvh;'>
                <h1 style='color:red;text-align:center'>The html cannot be found, please check the file name<br/> '$file'</h1>
            </div>";
        }
        return ob_get_clean();
    }
}

<?php

defined('ABSPATH') || exit;

if (!function_exists('mxsfwnDebug')) {
    /**
     * Debug anything. The result will be collected 
     * in \wp-content\plugins\stuff-for-wpp2/mx-debug/mx-debug.txt file
     * 
     * @param string $content   List of parameters (coma separated).
     *
     * @return void
     */
    function mxsfwnDebug(...$content)
    {

        $content = mxsfwnContentToString(...$content);

        $dir = MXSFWN_PLUGIN_ABS_PATH . 'mx-debug';

        $file = $dir . '/mx-debug.txt';

        $dateLine = '>>>' . date('Y/m/d H:i:s', time()) . ':' . "\n";

        $current = "{$dateLine}{$content}\n_____________________________________\n";

        if (!file_exists($dir)) {

            mkdir($dir, 0777, true);
        } else {

            $current .= file_get_contents($file) . "\n";
        }

        file_put_contents($file, $current);
    }
}

if (!function_exists('mxsfwnContentToString')) {
    /**
     * This function is a part of the
     * mxsfwnDebug function.
     * 
     * @param string $content   List of parameters (coma separated).
     *
     * @return string
     */
    function mxsfwnContentToString(...$content)
    {

        ob_start();

        var_dump(...$content);

        return ob_get_clean();
    }
}

if (!function_exists('mxsfwnView')) {
    /**
     * This function allow you to connect view to controller.
     * Use this function in \includes\admin\controllers\{file}.php
     * 
     * @param string $view       File name in the \includes\admin\views\ folder.
     *                           Use without ".view.php".
     * 
     * @param array $attributes  Here you can pass any number of variables
     *                           to use them in the view file.
     *
     * @return view
     */

    function mxsfwnView($view, $attributes = [])
    {
        extract($attributes);

        $path = MXSFWN_PLUGIN_ABS_PATH . "includes/admin/views/{$view}.view.php";

        if (!file_exists($path)) return;

        require $path;
    }
}

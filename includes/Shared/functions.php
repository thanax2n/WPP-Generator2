<?php

defined('ABSPATH') || exit;

if (!function_exists('mxsfwnDebug')) {
    /**
     * Debug anything. The result will be collected 
     * in \wp-content\plugins\wpp-generator-v2/mx-debug/mx-debug.txt file
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
     * Use this function in \includes\Admin\controllers\{file}.php
     * 
     * @param string $view       File name in the \includes\Admin\views\ folder.
     *                           Use without ".view.php".
     * 
     * @param array $attributes  Here you can pass any number of variables
     *                           to use them in the view file.
     *
     * @return void              require a PHP file
     */

    function mxsfwnView($view, $attributes = [])
    {
        
        extract($attributes);

        $path = MXSFWN_PLUGIN_ABS_PATH . "includes/Admin/views/{$view}.view.php";

        if (!file_exists($path)) return false;

        return require $path;
    }
}

if (!function_exists('mxsfwnGoBack')) {
    /**
     * This function can be used for redirect purpose.
     * 
     * @param string $defaultUrl   This is a default url if HTTP_REFERER
     *                             didn't specified.
     *
     * @return void     redirect to previous page or to default one.
     */

    function mxsfwnGoBack($defaultUrl)
    {

        $backLink = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $defaultUrl;

        printf('<script>;window.location.href="%s";</script>', $backLink);
    }
}

if (!function_exists('mxsfwnRedirectTo')) {
    /**
     * This function can be used for redirect purpose.
     * 
     * @param string $defaultUrl   This is a default url if HTTP_REFERER
     *                             didn't specified.
     *
     * @return void     redirect to previous page or to default one.
     */

    function mxsfwnRedirectTo($url)
    {

        printf('<script>;window.location.href="%s";</script>', $url);
    }
}

if (!function_exists('mxsfwnRequireGutenbergComponent')) {
    /**
     * This function allow you to connect a component to a 
     * Gutenberg block.
     * Use this function to requite 
     * \includes\Features\Gutenberg\components\{$file}.php
     * 
     * @param string $file       File name in the 
     * \includes\Features\Gutenberg\components\ folder.
     *                           Use without ".php".
     * 
     * @param array $attributes  Here you can pass any number of variables
     *                           to use them in the component.
     *
     * @return void              require a PHP file
     */

    function mxsfwnRequireGutenbergComponent($file, $attributes = [])
    {
        
        extract($attributes);

        $path = MXSFWN_PLUGIN_ABS_PATH . "includes/Features/Gutenberg/components/{$file}.php";

        if (!file_exists($path)) return false;

        return require $path;
    }
}
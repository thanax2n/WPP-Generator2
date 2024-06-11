<?php

defined( 'ABSPATH' ) || exit;

/*
* Debugging
*/
if (!function_exists('mxsfwnDebugToFile')) {
    /**
     * Debug anything. The result will be collected 
     * in \wp-content\plugins\stuff-for-wpp2/mx-debug/mx-debug.txt file in the root of
     * the plugin.
     * 
     * @param string $content   List of parameters (coma separated).
     *
     * @return void
     */
    function mxsfwnDebugToFile( ...$content ) {

        $content = mxsfwnContentToString( ...$content );

        $dir = MXSFWN_PLUGIN_ABS_PATH . 'mx-debug';

        $file = $dir . '/mx-debug.txt';

        if (!file_exists($dir)) {

            mkdir($dir, 0777, true);

            $current = '>>>' . date('Y/m/d H:i:s', time()) . ':' . "\n";

            $current .= $content . "\n";

            $current .= '_____________________________________' . "\n";

            file_put_contents($file, $current);
        } else {

            $current = '>>>' . date('Y/m/d H:i:s', time()) . ':' . "\n";

            $current .= $content . "\n";
            
            $current .= '_____________________________________' . "\n";          

            $current .= file_get_contents($file) . "\n";

            file_put_contents($file, $current);
        }
    }
}

if (!function_exists('mxsfwnContentToString')) {
    /**
     * This function is a part of the
     * mxsfwnDebugToFile function.
     * 
     * @param string $content   List of parameters (coma separated).
     *
     * @return string
     */
    function mxsfwnContentToString( ...$content ) {

        ob_start();

        var_dump( ...$content );

        return ob_get_clean();
    }
}
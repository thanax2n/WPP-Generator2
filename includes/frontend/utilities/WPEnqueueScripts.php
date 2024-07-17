<?php

namespace MXSFWNWPPGNext\Frontend\Utilities;

class WPEnqueueScripts
{

    protected $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    protected $assetsPath   = MXSFWN_PLUGIN_URL . 'assets/frontend/';

    protected $assetsPath2   = MXSFWN_PLUGIN_URL . 'build/frontend/';


    protected $version      = MXSFWN_PLUGIN_VERSION;

    public function enqueue()
    {

        add_action("wp_enqueue_scripts", [$this, 'scripts']);
    }

    public function scripts()
    {

        // Add main frontend scripts
        $frontendHandler = "{$this->uniqueString}-feature1-scripts";
        wp_enqueue_script(
            $frontendHandler,
            "{$this->assetsPath2}feature1/index.js",
            [],
            $this->version,
            true
        );


        // // Add Vue.js 2
        // $vueJsHandle = "{$this->uniqueString}-vue";
        // wp_enqueue_script(
        //     $vueJsHandle,
        //     MXSFWN_PLUGIN_URL . 'assets/packages/vue/development.js',
        //     // MXSFWN_PLUGIN_URL . 'assets/packages/vue/production.js',
        //     [],
        //     $this->version,
        //     true
        // );

        // // Add main frontend scripts
        // $frontendHandler = "{$this->uniqueString}-frontend-scripts";
        // wp_enqueue_script(
        //     $frontendHandler,
        //     "{$this->assetsPath}js/scripts.js",
        //     [$vueJsHandle, 'jquery'],
        //     $this->version,
        //     true
        // );

        // wp_localize_script(
        //     $frontendHandler,
        //     "{$this->uniqueString}FrontendLocalizer",
        //     [
        //         'ajaxURL'   => admin_url('admin-ajax.php'),
        //     ]
        // );

        // Add Font Awesome
        $fontAwesomeHandle = "{$this->uniqueString}-font-awesome";
        wp_enqueue_style(
            $fontAwesomeHandle,
            MXSFWN_PLUGIN_URL . 'assets/packages/font-awesome-4.6.3/css/font-awesome.min.css',
            [],
            $this->version
        );

        // Add main frontend styles
        wp_enqueue_style(
            "{$this->uniqueString}-frontend-styles",
            "{$this->assetsPath}css/styles.css",
            [$fontAwesomeHandle],
            $this->version
        );
    }
}

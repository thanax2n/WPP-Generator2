<?php

namespace MXSFWNWPPGNext\Frontend\Utilities;

class WPEnqueueScripts
{

    protected $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    protected $assetsPath   = MXSFWN_PLUGIN_URL . 'assets/frontend/';

    protected $assetsPath2   = MXSFWN_PLUGIN_URL . 'build/';


    protected $version      = MXSFWN_PLUGIN_VERSION;

    public function enqueue()
    {

        add_action("wp_enqueue_scripts", [$this, 'scripts']);
    }

    public function scripts()
    {

        // dependencies
        wp_enqueue_script(
            "{$this->uniqueString}-dependencies",
            "{$this->assetsPath2}dependencies/vendors/index.js",
            [],
            $this->version,
            true
        );

        // Feature 1
        $feature1Handler = "{$this->uniqueString}-feature1-scripts";
        wp_enqueue_script(
            $feature1Handler,
            "{$this->assetsPath2}frontend/feature1/index.js",
            ["{$this->uniqueString}-dependencies"],
            $this->version,
            true
        );

        // Localizer
        wp_localize_script(
            $feature1Handler,
            "{$this->uniqueString}Feature1Localizer",
            [
                'ajaxURL'   => admin_url('admin-ajax.php'),
            ]
        );

        // Add Font Awesome
        $fontAwesomeHandle = "{$this->uniqueString}-font-awesome";
        wp_enqueue_style(
            $fontAwesomeHandle,
            MXSFWN_PLUGIN_URL . 'assets/packages/font-awesome-4.6.3/css/font-awesome.min.css',
            [],
            $this->version
        );

        // Feature 1 style
        wp_enqueue_style(
            "{$this->uniqueString}-feature1-style",
            "{$this->assetsPath2}frontend/feature1/index.css",
            [$fontAwesomeHandle],
            $this->version
        );
    }
}

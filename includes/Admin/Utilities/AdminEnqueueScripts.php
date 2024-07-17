<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

class AdminEnqueueScripts
{

    public $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    public $assetsPath   = MXSFWN_PLUGIN_URL . 'assets/admin/';

    public $version      = MXSFWN_PLUGIN_VERSION;

    public function enqueue()
    {

        add_action("admin_enqueue_scripts", [$this, 'scripts']);
    }

    public function scripts()
    {

        // wp_enqueue_script(
        //     'meta-box-image-upload',
        //     MXSFWN_PLUGIN_URL . 'assets/admin/js/meta-box-image-upload.js',
        //     ['jquery'],
        //     MXSFWN_PLUGIN_VERSION,
        //     true
        // );

        // dependencies
        $dependenciesHandler = "{$this->uniqueString}-dependencies";
        wp_enqueue_script(
            $dependenciesHandler,
            MXSFWN_PLUGIN_URL . 'build/dependencies/vendors/index.js',
            [],
            $this->version,
            true
        );

        wp_enqueue_script(
            'meta-box-image-upload',
            MXSFWN_PLUGIN_URL . 'build/admin/meta-box-image-upload/index.js',
            [$dependenciesHandler, 'jquery'],
            MXSFWN_PLUGIN_VERSION,
            true
        );

        // add main admin script
        wp_enqueue_script(
            "{$this->uniqueString}-admin-scripts",
            "{$this->assetsPath}js/scripts.js",
            ['jquery'],
            $this->version,
            true
        );

        // add main admin style
        wp_enqueue_style(
            "{$this->uniqueString}-admin-styles",
            "{$this->assetsPath}css/styles.css",
            [],
            $this->version
        );
    }
}

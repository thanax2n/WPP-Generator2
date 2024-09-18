<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

class AdminEnqueueScripts
{

    protected $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    protected $version      = MXSFWN_PLUGIN_VERSION;

    protected $pluginUrl    = MXSFWN_PLUGIN_URL;

    public function enqueue()
    {

        add_action("admin_enqueue_scripts", [$this, 'scripts']);
    }

    public function scripts()
    {

        // dependencies
        $dependenciesHandler = "{$this->uniqueString}-dependencies";
        wp_enqueue_script(
            $dependenciesHandler,
            $this->pluginUrl . 'build/dependencies/vendors/index.js',
            [],
            $this->version,
            true
        );

        $metaBoxImageUploadHandler = "{$this->uniqueString}-meta-box-image-upload";
        wp_enqueue_script(
            $metaBoxImageUploadHandler,
            $this->pluginUrl . 'build/admin/meta-box-image-upload/index.js',
            [$dependenciesHandler, 'jquery'],
            $this->version,
            true
        );

        // Localizer
        wp_localize_script(
            $metaBoxImageUploadHandler,
            "{$this->uniqueString}AdminLocalize",
            [
                'nonce'   => wp_create_nonce('wp_rest'),
            ]
        );

        // Metabox style
        wp_enqueue_style(
            "{$this->uniqueString}-meta-box-style",
            $this->pluginUrl . 'build/admin/meta-box-image-upload/index.css',
            [],
            $this->version,
        );
    }
}

<?php

/**
 * The WPEnqueueScripts class.
 *
 * This class is used to register 
 * styles and scripts for the frontend area.
 */

namespace MXSFWNWPPGNext\Frontend\Utilities;

class WPEnqueueScripts
{

    /**
     * Unique string to avoid conflicts.
     * 
     * @var string
     */
    protected $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    /**
     * The file version. Helps to cope with caching.
     * 
     * @var string
     */
    protected $version      = MXSFWN_PLUGIN_VERSION;

    /**
     * URL to the plugin folder.
     * 
     * @var string
     */
    protected $pluginUrl    = MXSFWN_PLUGIN_URL;

    /**
     * Enqueue all the scripts
     * 
     * @return void
     */
    public function enqueue(): void
    {

        add_action("wp_enqueue_scripts", [$this, 'scripts']);
    }

    /**
     * Enqueue styles and scripts for 
     * the frontend panel.
     * 
     * @return void
     */
    public function scripts(): void
    {

        // dependencies
        wp_enqueue_script(
            "{$this->uniqueString}-dependencies",
            $this->pluginUrl . 'build/dependencies/vendors/index.js',
            [],
            $this->version,
            true
        );

        // Feature 1
        $feature1Handler = "{$this->uniqueString}-feature1-scripts";
        wp_enqueue_script(
            $feature1Handler,
            $this->pluginUrl . 'build/frontend/feature1/index.js',
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
            $this->pluginUrl . 'assets/packages/font-awesome-4.6.3/css/font-awesome.min.css',
            [],
            $this->version
        );

        // Feature 1 style
        wp_enqueue_style(
            "{$this->uniqueString}-feature1-style",
            $this->pluginUrl . 'build/frontend/feature1/index.css',
            [$fontAwesomeHandle],
            $this->version
        );
    }
}

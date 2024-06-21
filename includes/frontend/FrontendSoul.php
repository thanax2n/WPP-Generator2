<?php

namespace MXSFWNWPPGNext\Frontend;

use MXSFWNWPPGNext\Frontend\Utilities\WPEnqueueScripts;

class FrontendSoul
{

    protected $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    public function __construct()
    {

        $this->enqueueScripts();
    }

    public function enqueueScripts()
    {

        // Font Awesome
        $fontAwesomeHandle = "{$this->uniqueString}-font-awesome";
        (new WPEnqueueScripts)
            ->assetsPath(MXSFWN_PLUGIN_URL . 'assets/packages/font-awesome-4.6.3/css/')
            ->addStyle($fontAwesomeHandle, 'font-awesome.min.css')
            ->args('all')
            ->enqueue();

        // Frontend Styles
        $frontendStyleHandle = "{$this->uniqueString}-frontend-styles";
        (new WPEnqueueScripts)
            ->addStyle($frontendStyleHandle, 'index.css')
            ->dependency($fontAwesomeHandle)
            ->args('all')
            ->enqueue();

        // Vue.js 2
        $vueJsHandle = "{$this->uniqueString}-vue";
        (new WPEnqueueScripts)
            ->assetsPath(MXSFWN_PLUGIN_URL . 'assets/packages/vue/')
            ->addScript($vueJsHandle, 'development.js')
            // ->addScript($vueJsHandle, 'production.js')
            ->enqueue();

        // Frontend Scripts
        $frontendScriptHandle = "{$this->uniqueString}-frontend-scripts";
        (new WPEnqueueScripts)
            ->addScript($frontendScriptHandle, 'index.js')
            ->dependency($vueJsHandle)
            ->dependency('jquery')
            ->localization([
                'ajaxURL'   => admin_url('admin-ajax.php'),
            ])
            ->enqueue();
    }
}

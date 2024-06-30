<?php

namespace MXSFWNWPPGNext\Frontend\Utilities;

use MXSFWNWPPGNext\Shared\EnqueueScripts;

class WPEnqueueScripts
{

    protected $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    protected $assetsPath = MXSFWN_PLUGIN_URL . 'assets/frontend/';

    public function addStyle(string $handle, string $file): object
    {

        $styleSrc = $this->assetsPath . "css/{$file}";

        $instance = new EnqueueScripts("{$this->uniqueString}-$handle", $styleSrc);

        $instance->area('frontend');

        $instance->callback('style');

        return $instance;
    }

    public function addScript(string $handle, string $file): object
    {

        $scriptSrc = $this->assetsPath . "js/{$file}";

        $instance = new EnqueueScripts("{$this->uniqueString}-$handle", $scriptSrc);

        $instance->area('frontend');

        return $instance;
    }

    public function assetsPath(string $path): object
    {

        $this->assetsPath = $path;

        return $this;
    }

    public static function addScripts(): void
    {

        $uniqueString = (new static())->uniqueString;

        // Vue.js 2
        $vueJsHandle = "vue";
        (new static())
            ->assetsPath(MXSFWN_PLUGIN_URL . 'assets/packages/vue/')
            ->addScript($vueJsHandle, 'development.js')
            // ->addScript($vueJsHandle, 'production.js')
            ->enqueue();

        // Frontend Scripts
        $frontendScriptHandle = "frontend-scripts";
        (new static())
            ->addScript($frontendScriptHandle, 'scripts.js')
            ->dependency("{$uniqueString}-$vueJsHandle")
            ->dependency('jquery')
            ->localization([
                'ajaxURL'   => admin_url('admin-ajax.php'),
            ])
            ->enqueue();
    }

    public static function addStyles(): void
    {

        $uniqueString = (new static())->uniqueString;

        // Font Awesome
        $fontAwesomeHandle = "font-awesome";
        (new static())
            ->assetsPath(MXSFWN_PLUGIN_URL . 'assets/packages/font-awesome-4.6.3/')
            ->addStyle($fontAwesomeHandle, 'font-awesome.min.css')
            ->args('all')
            ->enqueue();

        // Frontend Styles
        $frontendStyleHandle = "frontend-styles";
        (new static())
            ->addStyle($frontendStyleHandle, 'styles.css')
            ->dependency("{$uniqueString}-$fontAwesomeHandle")
            ->args('all')
            ->enqueue();
    }
}

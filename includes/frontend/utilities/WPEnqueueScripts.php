<?php

namespace MXSFWNWPPGNext\Frontend\Utilities;

use MXSFWNWPPGNext\Core\EnqueueScripts;

class WPEnqueueScripts extends EnqueueScripts
{

    protected static $assetsPath = MXSFWN_PLUGIN_URL . 'includes/Frontend/built/';

    public static function addStyle(string $handle, string $file)
    {

        $styleSrc = self::$assetsPath . $file;
        $instance = new static($handle, $styleSrc);

        $instance->area('frontend');

        $instance->callback('style');

        $instance->args('all');

        $instance->enqueue();
    }

    public static function addScript(string $handle, string $file)
    {

        $scriptSrc = self::$assetsPath . $file;
        $instance = new static($handle, $scriptSrc);

        $instance->area('frontend');

        $instance->localization([
            'ajaxURL'   => admin_url('admin-ajax.php'),
        ]);

        $instance->enqueue();
    }
}

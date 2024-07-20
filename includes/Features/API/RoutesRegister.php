<?php

/**
 * The RoutesRegister class.
 *
 * Here you can create a new REST API endpoint.
 */

namespace MXSFWNWPPGNext\Features\API;

class RoutesRegister
{

    protected $restRoutes = [
        MXSFWN_PLUGIN_ABS_PATH . 'includes/Features/API/meta-boxes/image-upload.php',
    ];

    public function __construct()
    {

        foreach ($this->restRoutes as $file) {

            if (file_exists($file)) {

                require_once $file;
            }
        }
    }
}

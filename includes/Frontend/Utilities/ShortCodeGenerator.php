<?php

/**
 * The ShortCodeGenerator class.
 *
 * This class will help you register
 * new shortcodes for your website.
 */

namespace MXSFWNWPPGNext\Frontend\Utilities;

class ShortCodeGenerator
{

    public function __construct()
    {

        $this->addSimpleShortCode();
    }

    /**
     * An example of shortcode.
     * 
     * @return void
     */
    public function addSimpleShortCode(): void
    {

        add_shortcode('react_js_app_short_code', function () {

            ob_start();
            
            mxsfwnRequireFrontendComponent('shortcode-react-js-app');

            return ob_get_clean();
        });
    }
}

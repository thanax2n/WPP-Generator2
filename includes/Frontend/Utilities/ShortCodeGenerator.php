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

        $this->reactAppShortCode();
    }

    /**
     * An example of shortcode for a react.js app.
     * 
     * @return void
     */
    public function reactAppShortCode(): void
    {

        add_shortcode('react_js_app_short_code', function () {

            ob_start();
            
            mxsfwnRequireFrontendComponent('shortcode-react-js-app');

            return ob_get_clean();
        });
    }
}

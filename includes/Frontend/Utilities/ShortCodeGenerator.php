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

        add_shortcode('simle_short_code', function () {

            ob_start();

            printf('<p>%s</p>', esc_html__('This is a simple short code output', 'wpp-generator-v2'));

            mxsfwnRequireFrontendComponent('shortcode-body');

            return ob_get_clean();
        });
    }
}

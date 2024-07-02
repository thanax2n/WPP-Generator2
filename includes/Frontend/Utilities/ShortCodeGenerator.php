<?php

namespace MXSFWNWPPGNext\Frontend\Utilities;

class ShortCodeGenerator
{

    public static function addSimpleShortCode()
    {

        add_shortcode('simle_short_code', function() {

            ob_start();
    
            printf('<p>%s</p>', esc_html__('This is a simple shor code output', 'wpp-generator-v2'));
    
            return ob_get_clean();
        });
    }
}
<?php

namespace MXSFWNWPPGNext\Frontend\Utilities;

class ShortCodeGenerator
{

    public function __construct()
    {
        
        $this->addSimpleShortCode();
    }

    public function addSimpleShortCode()
    {

        add_shortcode('simle_short_code', function() {

            ob_start();
    
            printf('<p>%s</p>', esc_html__('This is a simple shor code output', 'wpp-generator-v2'));

            echo '<div id="mxsfwnSimpleApp"></div>';
            
    
            return ob_get_clean();
        });
    }
}
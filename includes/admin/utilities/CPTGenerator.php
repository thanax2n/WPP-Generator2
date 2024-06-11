<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

class CPTGenerator
{

    // Register a CPT...

    public static function activate()
    {

        add_option('mxsfwn_rewrite_rules', 'flush');
    }
}

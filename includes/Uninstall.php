<?php

namespace MXSFWNWPPGNext;

class Uninstall
{

    public static function init(): void
    {

        delete_option('mxsfwn_rewrite_rules');
    }
}

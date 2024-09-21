<?php

/**
 * The Uninstall class.
 *
 * This class runes actions while the plugin uninstall.
 */

namespace MXSFWNWPPGNext;

class Uninstall
{

    public static function init(): void
    {

        delete_option('mxsfwn_rewrite_rules');
    }
}

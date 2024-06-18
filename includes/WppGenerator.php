<?php

namespace MXSFWNWPPGNext;

use MXSFWNWPPGNext\Admin\AdminSoul;
use MXSFWNWPPGNext\Frontend\FrontendSoul;

final class WppGenerator
{

    public function __construct()
    {

        new AdminSoul;

        new FrontendSoul;
    }
}

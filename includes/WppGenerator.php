<?php

namespace MXSFWNWPPGNext;

use MXSFWNWPPGNext\Admin\AdminSoul;
use MXSFWNWPPGNext\Frontend\FrontendSoul;

final class WppGenerator
{

    public function __construct()
    {

        return new AdminSoul;

        return new FrontendSoul;
    }
}

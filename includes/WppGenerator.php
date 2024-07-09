<?php

namespace MXSFWNWPPGNext;

use MXSFWNWPPGNext\Admin\AdminSoul;
use MXSFWNWPPGNext\Frontend\FrontendSoul;
use MXSFWNWPPGNext\Features\FeaturesSoul;

final class WppGenerator
{

    public function __construct()
    {

        new AdminSoul;

        new FrontendSoul;

        new FeaturesSoul;
    }
}

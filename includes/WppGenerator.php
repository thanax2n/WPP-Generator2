<?php

namespace MXSFWNWPPGNext;

use MXSFWNWPPGNext\Admin\AdminSoul;

final class WppGenerator
{

    public function __construct()
    {

        $this->admin();
    }

    public function admin()
    {

        new AdminSoul;
    }
    
}

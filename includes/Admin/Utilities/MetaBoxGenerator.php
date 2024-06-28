<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

use MXSFWNWPPGNext\Admin\Entities\MetaBox;

class MetaBoxGenerator extends MetaBox
{

    public static function add(array $args): object
    {
        $instance = new static($args);

        return $instance;
    }
}

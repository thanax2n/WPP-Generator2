<?php

namespace MXSFWNWPPGNext\Admin\Utilities\Notices;

use MXSFWNWPPGNext\Admin\Entities\AdminNotices;

class PathNotice extends AdminNotices
{

    public static function throw($path)
    {

        $instance = new static('error');

        $instance->addMessage("File \"{$path}\" DOES NOT exists")->display();
    }
}

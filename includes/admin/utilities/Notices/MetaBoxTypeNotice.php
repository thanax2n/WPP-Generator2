<?php

/**
 * The MetaBoxTypeNotice class.
 *
 * This class is used for user notification
 * in case the meta box type isn't exists.
 */

namespace MXSFWNWPPGNext\Admin\Utilities\Notices;

use MXSFWNWPPGNext\Admin\Entities\AdminNotices;

class MetaBoxTypeNotice extends AdminNotices
{

    public static function throw($type)
    {

        $instance = new static('warning');

        $instance->addMessage("Meta box type \"{$type}\" DOES NOT exists")->display();
    }
}

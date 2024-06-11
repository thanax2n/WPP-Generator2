<?php

namespace MXSFWNWPPGNext;

use MXSFWNWPPGNext\Admin\Utilities\CPTGenerator;

class Activator
{

    public static function init(): void
    {

        self::activateCPT();
    }

    /**
     * Activate CPT.
     * 
     * @return void Add an option for CPT.
     */
    public static function activateCPT(): void
    {

        CPTGenerator::activate();
    }
}

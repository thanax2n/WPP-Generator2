<?php

namespace MXSFWNWPPGNext;

use MXSFWNWPPGNext\Activate\CreateDataTables;

class Activator
{

    public static function init(): void
    {

        (new static)->createTables();
    }

    public function createTables(): void
    {

        // Create robots table.
        CreateDataTables::robots()->seedRobots();
    }
}

<?php

namespace MXSFWNWPPGNext;

use MXSFWNWPPGNext\Activate\CreateDataTablesAndSeed;

class Activator
{

    public static function init(): void
    {

        (new static)->createTables();
    }

    public function createTables(): void
    {

        // Create robots table
        CreateDataTablesAndSeed::createRobotsTable();
    }
}

<?php

namespace MXSFWNWPPGNext;

use MXSFWNWPPGNext\Activate\DataTableMigration;

class Activator
{

    public static function init(): void
    {

        (new static)->createTables();
    }

    public function createTables(): void
    {

        // Create robots table.
        (new DataTableMigration)->create()->seed();
    }
}

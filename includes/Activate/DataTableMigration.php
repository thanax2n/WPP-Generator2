<?php

/**
 * The CreateDataTables class.
 *
 * Here you can create as many 
 * as you wish DB tables.
 */

namespace MXSFWNWPPGNext\Activate;

class DataTableMigration
{
    
    private CreateDataTable $dataTable;

    /**
     * Create a DB table with 
     * particular columns.
     * 
     * @return object      instance CreateDataTable class.
     */
    public function create(): CreateDataTable
    {

        $this->dataTable = new CreateDataTable('ai_robots');

        $this->dataTable
            ->varchar('title', 200, true, 'text')
            ->longText('description')
            ->varchar('status', 20, true, 'publish')
            ->datetime('created_at')
            ->createTable();

        return $this->dataTable;
    }

    /**
     * Insert demo data to created table.
     * 
     * @return void      Insert data.
     */
    public function seed(): void
    {

        $data = require_once(MXSFWN_PLUGIN_ABS_PATH . 'includes/Activate/seeder/ai-robots.php');

        if (!is_array($data)) return;

        foreach ($data as $value) {

            $this->dataTable->getWpdb()->insert(
                $this->dataTable->getTable(),
                [
                    'title'       => esc_html($value['title']),
                    'description' => esc_html($value['description']),
                    'status'      => esc_html($value['status']),
                    'created_at'  => date('Y-m-d H:i:s'),
                ],
                [
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                ]
            );
        }
    }
}

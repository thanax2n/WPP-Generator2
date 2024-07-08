<?php

/**
 * The CreateDataTables class.
 *
 * Here you can create as many 
 * as you wish DB tables.
 */

namespace MXSFWNWPPGNext\Activate;

class CreateDataTables extends CreateDataTable
{

    /**
     * Create a DB table with 
     * particular columns.
     * 
     * @return object      Current class.
     */
    public static function robots(): object
    {

        $instance = new static('ai_robots');

        $instance
            ->varchar('title', 200, true, 'text')
            ->longText('description')
            ->varchar('status', 20, true, 'publish')
            ->datetime('created_at')
            ->createTable();

        return $instance;
    }

    /**
     * Function description.
     * 
     * @param array|string|int variableName   Variable description.
     *
     * @since 2.2.0
     * 
     * @return void      Return description.
     */
    public function seedRobots(): void
    {

        $data = require_once(MXSFWN_PLUGIN_ABS_PATH . 'includes/Activate/seeder/ai-robots.php');

        if (!is_array($data)) return;

        foreach ($data as $value) {

            $this->wpdb->insert(
                $this->table,
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

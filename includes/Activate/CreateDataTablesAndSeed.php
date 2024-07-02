<?php

namespace MXSFWNWPPGNext\Activate;

use MXSFWNWPPGNext\Activate\CreateDataTable;

class CreateDataTablesAndSeed
{

    public static function createRobotsTable()
    {

        $robotsTable = (new CreateDataTable('ai_robots_seven'))
            ->varchar('title', 200, true, 'text')
            ->longtext('description')
            ->varchar('status', 20, true, 'publish')
            ->datetime('created_at')
            ->createTable();

        if (!$robotsTable) return;

        self::seedeRobotsTable();
    }

    public static function seedeRobotsTable(): void
    {

        $data = require_once(MXSFWN_PLUGIN_ABS_PATH . 'includes/Activate/seeder/ai-robots.php');

        if (!is_array($data)) return;

        global $wpdb;

        foreach ($data as $value) {

            $wpdb->insert(
                $wpdb->prefix . 'ai_robots_seven',
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

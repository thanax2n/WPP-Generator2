<?php

namespace MXSFWNWPPGNext\Activate;

class CreateDataTables extends CreateDataTable
{

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

    public function seedRobots()
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

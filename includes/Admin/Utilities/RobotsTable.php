<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

use WP_List_Table;
use wpdb;

class RobotsTable extends WP_List_Table
{

    protected $uniqueString = MXSFWN_PLUGIN_UNIQUE_STRING;

    protected $table;

    public function __construct($args = [])
    {

        parent::__construct(
            [
                'singular' => "{$this->uniqueString}_singular",
                'plural'   => "{$this->uniqueString}_plural",
            ]
        );

        $this->table = "{$this->wpdb()->prefix}ai_robots";
    }

    private function wpdb(): wpdb
    {

        return $GLOBALS['wpdb'];
    }

    public function prepare_items()
    {

        // Pagination.
        $perPage     = 20;

        $currentPage = $this->get_pagenum();

        $offset = 1 < $currentPage ? ($perPage * ($currentPage - 1)) : 0;

        // Sortable.
        $order = isset($_GET['order']) ? trim(sanitize_text_field($_GET['order'])) : 'desc';

        $orderBy = isset($_GET['orderby']) ? trim(sanitize_text_field($_GET['orderby'])) : 'id';

        // Search.
        $search = '';

        if (!empty($_REQUEST['s'])) {
            
            $search = "AND title LIKE '%" . esc_sql($this->wpdb()->esc_like(sanitize_text_field(wp_unslash($_REQUEST['s'])))) . "%' ";
        }

        // Status.
        $itemStatus = isset($_GET['item_status']) ? trim($_GET['item_status']) : 'publish';

        $status = "AND status = '$itemStatus'";

        // Get data.
        $items = $this->wpdb()->get_results(
            "SELECT * FROM {$this->table} WHERE 1 = 1 {$status} {$search}" .
                $this->wpdb()->prepare("ORDER BY {$orderBy} {$order} LIMIT %d OFFSET %d;", $perPage, $offset),
            ARRAY_A
        );

        $count = $this->wpdb()->get_var("SELECT COUNT(id) FROM {$this->table} WHERE 1 = 1 {$status} {$search};");

        // Set data.
        $this->items = $items;

        // Set column headers.
        $columns  = $this->get_columns();
        $hidden   = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = [
            $columns,
            $hidden,
            $sortable,
        ];

        // Set the pagination.
        $this->set_pagination_args(
            [
                'total_items' => $count,
                'per_page'    => $perPage,
                'total_pages' => ceil($count / $perPage),
            ]
        );
    }

    public function get_columns()
    {

        return [
            'cb'          => '<input type="checkbox" />',
            'id'          => __('ID', 'wpp-generator-v2'),
            'title'       => __('Title', 'wpp-generator-v2'),
            'description' => __('Description', 'wpp-generator-v2'),
            'status'      => __('Status', 'wpp-generator-v2'),
            'created_at'  => __('Created', 'wpp-generator-v2'),
        ];
    }

    public function get_hidden_columns()
    {

        return [
            'id',
            'status',
        ];
    }

    public function get_sortable_columns()
    {

        return [
            'title' => [
                'title',
                false,
            ]
        ];
    }

    public function column_default($item, $columnName)
    {

        do_action("manage_{$this->uniqueString}_items_custom_column", $columnName, $item);
    }

    public function column_cb($item)
    {

        printf(
            '<input type="checkbox" class="%2$s_bulk_input" name="%2$s-action-%1$s" value="%1$d" />',
            $item['id'],
            $this->uniqueString
        );
    }

    public function column_id($item)
    {

        echo $item['id'];
    }

    public function column_title($item)
    {

        $url      = admin_url('admin.php?page=single-ai-robot');

        $user_id  = get_current_user_id();

        $can_edit = current_user_can('edit_user', $user_id);

        $output   = '<strong>';

        if ($can_edit) {

            $output .= sprintf(
                '<a href="%s&edit-item=%s">%s</a>',
                esc_url($url),
                $item['id'],
                $item['title']
            );

            // sprintf ...

            $actions['edit']  = '<a href="' . esc_url($url) . '&edit-item=' . $item['id'] . '">' . __('Edit', 'wpp-generator-v2') . '</a>';
            $actions['trash'] = '<a class="submitdelete" aria-label="' . esc_attr__('Trash', 'wpp-generator-v2') . '" href="' . esc_url(
                wp_nonce_url(
                    add_query_arg(
                        [
                            'trash' => $item['id'],
                        ],
                        $url
                    ),
                    'trash',
                    "{$this->uniqueString}_nonce"
                )
            ) . '">' . esc_html__('Trash', 'wpp-generator-v2') . '</a>';

            // ... sprintf 

            $itemStatus = isset($_GET['item_status']) ? trim($_GET['item_status']) : 'publish';
            
            if ($itemStatus == 'trash') {

                unset($actions['edit']);
                unset($actions['trash']);

                // sprintf + variable ... 
                $actions['restore'] = '<a aria-label="' . esc_attr__('Restore', 'wpp-generator-v2') . '" href="' . esc_url(
                    wp_nonce_url(
                        add_query_arg(
                            [
                                'restore' => $item['id'],
                            ],
                            $url
                        ),
                        'restore',
                        "{$this->uniqueString}_nonce"
                    )
                ) . '">' . esc_html__('Restore', 'wpp-generator-v2') . '</a>';                

                $actions['delete'] = '<a class="submitdelete" aria-label="' . esc_attr__('Delete Permanently', 'wpp-generator-v2') . '" href="' . esc_url(
                    wp_nonce_url(
                        add_query_arg(
                            [
                                'delete' => $item['id'],
                            ],
                            $url
                        ),
                        'delete',
                        "{$this->uniqueString}_nonce"
                    )
                ) . '">' . esc_html__('Delete Permanently', 'wpp-generator-v2') . '</a>';

                // ... sprintf
            }

            $rowActions = [];

            foreach ($actions as $action => $link) {

                // sprintf ...
                $rowActions[] = '<span class="' . esc_attr($action) . '">' . $link . '</span>';
                // ... sprintf 
            }

            // sprintf ...
            $output .= '<div class="row-actions">' . implode(' | ', $rowActions) . '</div>';
        } else {

            $output .= $item['title'];
        }

        $output .= '</strong>';

        echo $output;
    }

    public function column_description($item)
    {

        $length = 30;

        echo strlen($item['description']) <= $length ? $item['description'] : substr($item['description'], 0, $length) . '...';
    }

    public function column_created_at($item): void
    {

        echo $item['created_at'];
    }

    protected function get_bulk_actions(): array
    {

        $action = [];

        if (!current_user_can('edit_posts')) return $action;        

        if (isset($_GET['item_status']) && trim($_GET['item_status']) === 'trash') {

            $action['restore'] = __('Restore Item', 'wpp-generator-v2');
            $action['delete']  = __('Delete Permanently', 'wpp-generator-v2');
        } else {

            $action['trash']   = __('Move to trash', 'wpp-generator-v2');
        }

        return $action;
    }

    public function search_box($text, $inputId)
    {

        if (empty($_REQUEST['s']) && !$this->has_items()) return;

        // get back code
        mxsfwnView('robots-table/search', [
            'text'         => $text,
            'inputId'      => $inputId,
            'uniqueString' => $this->uniqueString
        ]);
    }

    protected function get_views()
    {

        $itemStatus    = isset($_GET['item_status']) ? trim($_GET['item_status']) : 'publish';
        $publishNumber = $this->wpdb()->get_var("SELECT COUNT(id) FROM {$this->table} WHERE status='publish';");
        $trashNumber   = $this->wpdb()->get_var("SELECT COUNT(id) FROM {$this->table} WHERE status='trash';");
        $url           = admin_url('admin.php?page=main-menu');

        $statusLinks   = [];

        // Publish.
        $statusLinks['publish'] = [
            'url'     => add_query_arg('item_status', 'publish', $url),
            'label'   => sprintf(
                _nx(
                    'Publish <span class="count">(%s)</span>',
                    'Publish <span class="count">(%s)</span>',
                    $publishNumber,
                    'publish'
                ),
                number_format_i18n($publishNumber)
            ),
            'current' => 'publish' == $itemStatus,
        ];

        if ($publishNumber == 0) {
            unset($statusLinks['publish']);
        }

        // Trash.
        $statusLinks['trash'] = [
            'url'     => add_query_arg('item_status', 'trash', $url),
            'label'   => sprintf(
                _nx(
                    'Trash <span class="count">(%s)</span>',
                    'Trash <span class="count">(%s)</span>',
                    $trashNumber,
                    'trash'
                ),
                number_format_i18n($trashNumber)
            ),
            'current' => 'trash' == $itemStatus,
        ];

        if ($trashNumber == 0) {
            unset($statusLinks['trash']);
        }

        return $this->get_views_links($statusLinks);
    }

    public function no_items()
    {

        $itemStatus = isset($_GET['item_status']) ? trim($_GET['item_status']) : 'publish';

        if ($itemStatus == 'trash') {

            _e('No items found in trash.');
        } else {

            _e('No items found.');
        }
    }
}

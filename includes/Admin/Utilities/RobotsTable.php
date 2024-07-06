<?php

namespace MXSFWNWPPGNext\Admin\Utilities;

use WP_List_Table;
use wpdb;

class RobotsTable extends WP_List_Table
{

    protected $uniqueString   = MXSFWN_PLUGIN_UNIQUE_STRING;

    protected $table;

    protected $mainMenuSlug    = 'ai-robots';

    protected $singleMenuSlug  = 'single-ai-robot';

    protected $actionsMenuSlug = 'ai-robot-actions';

    protected $patchSlug       = 'edit-ai-robot';

    protected $perPage         = 20;

    protected $searchSQL       = '';

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

    public function prepare_items(): void
    {

        $currentPage = $this->get_pagenum();

        $offset = 1 < $currentPage ? ($this->perPage * ($currentPage - 1)) : 0;

        // Sortable
        $order = isset($_GET['order']) ? trim(sanitize_text_field($_GET['order'])) : 'desc';

        $orderBy = isset($_GET['orderby']) ? trim(sanitize_text_field($_GET['orderby'])) : 'id';

        if (!empty($_REQUEST['s'])) {

            $this->searchSQL = "AND title LIKE '%" . esc_sql($this->wpdb()->esc_like(sanitize_text_field(wp_unslash($_REQUEST['s'])))) . "%' ";
        }

        // Status
        $itemStatus = isset($_GET['item-status']) ? trim($_GET['item-status']) : 'publish';

        $status = "AND status = '$itemStatus'";

        // Get data
        $items = $this->wpdb()->get_results(
            "SELECT * FROM {$this->table} WHERE 1 = 1 {$status} {$this->searchSQL}" .
                $this->wpdb()->prepare("ORDER BY {$orderBy} {$order} LIMIT %d OFFSET %d;", $this->perPage, $offset),
            ARRAY_A
        );

        // Set data
        $this->items = $items;

        // Set column headers
        $columns  = $this->get_columns();

        $hidden   = $this->get_hidden_columns();

        $sortable = $this->get_sortable_columns();

        $this->_column_headers = [
            $columns,
            $hidden,
            $sortable,
        ];

        // Set the pagination
        $count = $this->wpdb()->get_var("SELECT COUNT(id) FROM {$this->table} WHERE 1 = 1 {$status} {$this->searchSQL};");

        $this->set_pagination_args(
            [
                'total_items' => $count,
                'per_page'    => $this->perPage,
                'total_pages' => ceil($count / $this->perPage),
            ]
        );
    }

    public function get_columns(): array
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

    public function get_hidden_columns(): array
    {

        return [
            'id',
            'status',
        ];
    }

    public function get_sortable_columns(): array
    {

        return [
            'title' => [
                'title',
                false,
            ]
        ];
    }

    public function column_cb($item): void
    {

        printf(
            '<input type="checkbox" class="%1$s_bulk_input" name="%1$s-action-%2$d" value="%2$d" />',
            $this->uniqueString,
            $item['id']
        );
    }

    public function column_id($item): void
    {

        echo $item['id'];
    }

    public function column_title($item): void
    {

        $singleRobotUrl      = admin_url("admin.php?page={$this->singleMenuSlug}");
        $robotsActionsUrl    = admin_url("admin.php?page={$this->actionsMenuSlug}");

        $user_id  = get_current_user_id();

        $can_edit = current_user_can('edit_user', $user_id);

        $actions = [];

        $output   = '<strong>';

        if ($can_edit) {

            $output .= sprintf(
                '<a href="%s&edit-item=%s">%s</a>',
                esc_url($singleRobotUrl),
                $item['id'],
                $item['title']
            );

            $actionUrl = function ($action) use ($robotsActionsUrl, $item) {

                return esc_url(wp_nonce_url(add_query_arg(
                    [$action => $item['id']],
                    $robotsActionsUrl
                ), $action, "{$this->uniqueString}_nonce"));
            };

            if (isset($_GET['item-status']) && trim($_GET['item-status']) === 'trash') {

                $actions['restore'] = sprintf(
                    '<a aria-label="%s" href="%s">%s</a>',
                    esc_attr__('Restore', 'wpp-generator-v2'),
                    $actionUrl('restore'),
                    esc_html__('Restore', 'wpp-generator-v2')
                );

                $actions['delete'] = sprintf(
                    '<a class="submitDelete" aria-label="%s" href="%s">%s</a>',
                    esc_attr__('Delete Permanently', 'wpp-generator-v2'),
                    $actionUrl('delete'),
                    esc_html__('Delete Permanently', 'wpp-generator-v2')
                );
            } else {

                $actions['edit'] = sprintf(
                    '<a href="%s&edit-item=%d">%s</a>',
                    esc_url($singleRobotUrl),
                    $item['id'],
                    __('Edit', 'wpp-generator-v2')
                );

                $actions['trash'] = sprintf(
                    '<a class="submitDelete" aria-label="%s" href="%s">%s</a>',
                    esc_attr__('Trash', 'wpp-generator-v2'),
                    $actionUrl('trash'),
                    esc_html__('Trash', 'wpp-generator-v2')
                );
            }

            $rowActions = [];

            foreach ($actions as $action => $link) {

                $rowActions[] = sprintf(
                    '<span class="%s">%s</span>',
                    esc_attr($action),
                    $link
                );
            }

            $output .= sprintf(
                '<div class="row-actions">%s</div>',
                implode(' | ', $rowActions)
            );
        } else {

            $output .= $item['title'];
        }

        $output .= '</strong>';

        echo $output;
    }

    public function column_description($item): void
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

        if (isset($_GET['item-status']) && trim($_GET['item-status']) === 'trash') {

            $action['restore'] = __('Restore Items', 'wpp-generator-v2');
            $action['delete']  = __('Delete Permanently', 'wpp-generator-v2');
        } else {

            $action['trash']   = __('Move to trash', 'wpp-generator-v2');
        }

        return $action;
    }

    public function search_box($text, $inputId): void
    {

        if (empty($_REQUEST['s']) && !$this->has_items()) return; ?>

        <p class="search-box">
            <label class="screen-reader-text" for="<?php esc_attr_e($inputId); ?>">
                <?php esc_html_e($text); ?>:
            </label>
            <input type="search" id="<?php esc_attr_e($inputId); ?>" name="s" value="<?php _admin_search_query(); ?>" />
            <?php submit_button(esc_html($text), '', '', false, [
                'id' => "{$this->uniqueString}-search-submit"
            ]); ?>
        </p>
<?php
    }

    protected function get_views(): array
    {

        $itemStatus    = isset($_GET['item-status']) ? trim($_GET['item-status']) : 'publish';
        $publishNumber = $this->wpdb()->get_var("SELECT COUNT(id) FROM {$this->table} WHERE status='publish';");
        $trashNumber   = $this->wpdb()->get_var("SELECT COUNT(id) FROM {$this->table} WHERE status='trash';");
        $url           = admin_url("admin.php?page={$this->mainMenuSlug}");

        $statusLinks   = [];

        // Publish
        if ($publishNumber > 0) {

            $statusLinks['publish'] = [
                'url'     => add_query_arg('item-status', 'publish', $url),
                'label'   => sprintf(
                    _nx(
                        'Publish <span class="count">(%s)</span>',
                        'Publish <span class="count">(%s)</span>',
                        $publishNumber,
                        'publish'
                    ),
                    number_format_i18n($publishNumber)
                ),
                'current' => 'publish' === $itemStatus,
            ];
        }

        // Trash
        if ($trashNumber > 0) {

            $statusLinks['trash'] = [
                'url'     => add_query_arg('item-status', 'trash', $url),
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
        }

        return $this->get_views_links($statusLinks);
    }

    public function no_items(): void
    {

        if (isset($_GET['item-status']) && trim($_GET['item-status']) === 'trash') {

            _e('No items found in trash.');
        } else {

            _e('No items found.');
        }
    }

    /**
     * Actions:
     *  Trash
     *  Restore
     *  Delete
     */
    public function prepareActionAndCommit()
    {

        $actions = ['trash', 'restore', 'delete'];

        $currentAction = false;

        // Check action
        foreach ($actions as $action) {

            if (isset($_GET[$action])) {

                $currentAction = $action;
                break;
            }
        }

        if (!$currentAction) return false;

        $robotId = (int) trim(sanitize_text_field($_GET[$currentAction]));

        // Check nonce
        if (!isset($_GET["{$this->uniqueString}_nonce"]) || !wp_verify_nonce($_GET["{$this->uniqueString}_nonce"], $currentAction)) return false;

        // if method exists
        $callback = "{$currentAction}Robot";
        if (!method_exists($this, $callback)) return false;

        // commit
        return call_user_func([$this, $callback], $robotId);
    }

    protected function robotExists($robotId): bool
    {

        $count = $this->wpdb()->get_var("SELECT COUNT(id) FROM {$this->table} WHERE id = '$robotId'");

        if ($count === 0) return false;

        return true;
    }

    protected function deleteRobot($robotId): bool
    {

        return $this->robotExists($robotId) ?
            $this->wpdb()->delete(
                $this->table,
                [
                    'id' => $robotId
                ],
                [
                    '%d',
                ]
            ) :
            false;
    }

    protected function restoreRobot($robotId): bool
    {

        return $this->robotExists($robotId) ?
            $this->wpdb()->update(

                $this->table,
                [
                    'status' => 'publish',
                ],
                [
                    'id'     => $robotId,
                ],
                [
                    '%s',
                ]
            ) :
            false;
    }

    protected function trashRobot($robotId): bool
    {

        return $this->robotExists($robotId) ?
            $this->wpdb()->update(

                $this->table,
                [
                    'status' => 'trash',
                ],
                [
                    'id'     => $robotId,
                ],
                [
                    '%s',
                ]
            ) :
            false;
    }

    /**
     * Edit item via post request
     */
    public function editRobot()
    {

        // Check nonce
        if (!isset($_POST["{$this->uniqueString}-wp-nonce"]) || !wp_verify_nonce($_POST["{$this->uniqueString}-wp-nonce"], "{$this->uniqueString}-edit")) return false;

        // Check robot id
        if (!isset($_POST['edit-item']) || !is_numeric($_POST['edit-item'])) return false;

        // Check if robot exists
        if (!$this->robotExists(intval($_POST['edit-item']))) return false;

        // Update robot
        $title = sanitize_text_field($_POST['title']);
        $description = sanitize_textarea_field($_POST['description']);

        return $this->wpdb()->update(

            $this->table,
            [
                'title'       => $title,
                'description' => $description,
            ],
            [
                'id'          => intval($_POST['edit-item']),
            ],
            [
                '%s',
                '%s',
            ]
        );
    }

    /**
     * Getters
     */
    public function getTableName(): string
    {

        return $this->table;
    }

    public function getWPDB(): wpdb
    {

        return $this->wpdb();
    }

    public function mainMenuSlug(): string
    {

        return $this->mainMenuSlug;
    }

    public function getUniqueString(): string
    {

        return $this->uniqueString;
    }

    public function getPatchSlug(): string
    {

        return $this->patchSlug;
    }
}

<?php

defined('ABSPATH') || exit;

$itemId = isset( $_GET['edit-item'] ) ? trim( sanitize_text_field( $_GET['edit-item'] ) ) : 0;

global $wpdb;

$table = "{$wpdb->prefix}ai_robots";
        
$robot = $wpdb->get_row( 

    $wpdb->prepare(
        "SELECT * FROM $table
        WHERE id='%d'",
        $itemId
    )
);

if($robot) {

    mxsfwnView('robots-table/single', [
        'robot' => $robot
    ]);
} else {

    mxsfwnView('robots-table/404', [
        'message' => 'Robot not found!'
    ]);
}

<?php

defined('ABSPATH') || exit;

use MXSFWNWPPGNext\Admin\Router;

$router = new Router();

$mainMenuSlug = 'wppg-next';

/**
 * Add Main Menu Item.
 * 
 * /wp-admin/admin.php?page=wppg-next
 * */
$router->get('main')->properties([
    'menuSlug' => $mainMenuSlug
]);

/**
 * Add Sub Menu Item.
 * 
 * /wp-admin/admin.php?page=wppg-next-sub
 * */
$router->get('sub-menu')
    ->menuAction('addSubmenuPage')
    ->properties([
        'parentSlug' => $mainMenuSlug,
        'pageTitle'  => 'WPPG Next. Sub Menu',
        'menuTitle'  => 'Sub Menu',
        'menuSlug'   => 'wppg-next-sub'
    ]);

/**
 * Add Hidden Menu Item.
 * 
 * /wp-admin/admin.php?page=wppg-next-hidden
 * */
$router->get('hidden-menu')
    ->menuAction('addSubmenuPage')
    ->properties([
        'pageTitle'  => 'WPPG Next. Hidden Menu',
        'menuTitle'  => 'Hidden Menu',
        'menuSlug'   => 'wppg-next-hidden'
    ]);

/**
 * Add Option Menu Item.
 * 
 * /wp-admin/options-general.php?page=wppg-next-settings
 * */
$optionSlug = 'settings-menu';
$router->get($optionSlug)
    ->menuAction('addOptionsPage')
    ->properties([
        'pageTitle'  => 'WPPG Next. Settings Menu',
        'menuTitle'  => 'WPPG Next',
        'menuSlug'   => 'wppg-next-settings'
    ]);

// Add link to the Options page on the plugins page.
$router->get($optionSlug)
    ->menuAction('addOptionLink')
    ->properties([
        'menuTitle'  => 'WPPG Next',
        'menuSlug'   => 'wppg-next-settings'
    ]);

/**
 * Custom table example.
 * Robots table.
*/
$router->get('robots-table/main')->properties([
    'menuSlug' => 'ai-robots',
    'pageTitle'  => 'AI robots',
    'menuTitle'  => 'AI robots',
]);

/**
 * Add single robot Menu Item.
 * 
 * /wp-admin/admin.php?page=single-ai-robot
 * */
$router->get('robots-table/single')
    ->menuAction('addSubmenuPage')
    ->properties([
        'pageTitle'  => 'Single robot',
        'menuTitle'  => 'Single robot',
        'menuSlug'   => 'single-ai-robot'
    ]);

/**
 * GET actions for robots:
 *   Trash
 *   Restore
 *   Delete
 * 
 * /wp-admin/admin.php?page=ai-robot-actions
 * */
$router->get('robots-table/actions')
    ->menuAction('addSubmenuPage')
    ->properties([
        'pageTitle'  => 'Single robot',
        'menuTitle'  => 'Single robot',
        'menuSlug'   => 'ai-robot-actions'
    ]);

/**
 * PATCH (Edit) action for robots.
 * 
 * /wp-admin/admin.php?page=edit-ai-robot
 * */
$router->get('robots-table/edit-robot')
    ->menuAction('addSubmenuPage')
    ->properties([
        'pageTitle'  => 'Edit robot',
        'menuTitle'  => 'Edit robot',
        'menuSlug'   => 'edit-ai-robot'
    ]);

// Render all the pages.
$router->route();

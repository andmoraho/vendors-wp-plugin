<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/andmoraho/
 * @since      1.0.0
 *
 * @package    Andmoraho_Vendors
 * @subpackage Andmoraho_Vendors/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Andmoraho_Vendors
 * @subpackage Andmoraho_Vendors/includes
 * @author     Andres Morales <andmoraho@gmail.com>
 */
class Andmoraho_Vendors_Deactivator
{

    /**
     * Deactivate Plugin
     *
     * Unregister the post type, so the rules are no longer in memory.
     * Clear the permalinks to remove our post type's rules from the database
     *
     * @since    1.0.0
     */
    public static function deactivate()
    {
        unregister_post_type('vendor');
        flush_rewrite_rules();
    }
}

<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/andmoraho/
 * @since      1.0.0
 *
 * @package    Andmoraho_Vendors
 * @subpackage Andmoraho_Vendors/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 *
 * @package    Andmoraho_Vendors
 * @subpackage Andmoraho_Vendors/admin
 * @author     Andres Morales <andmoraho@gmail.com>
 */
class Andmoraho_Vendors_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $andmoraho_vendors    The ID of this plugin.
     */
    private $andmoraho_vendors;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $andmoraho_vendors       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($andmoraho_vendors, $version)
    {
        $this->andmoraho_vendors = $andmoraho_vendors;
        $this->version = $version;
    }

    
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        wp_enqueue_style($this->andmoraho_vendors, plugin_dir_url(__FILE__) . 'css/andmoraho-vendors-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script($this->andmoraho_vendors, plugin_dir_url(__FILE__) . 'js/andmoraho-vendors-admin.js', array( 'jquery' ), $this->version, false);
    }


    /**
     * Register the Meta Boxes for the Vendors in admin area.
     *
     * @since    1.0.0
     */
    public function add_service_metaboxes()
    {
        add_meta_box('_andmoraho_vendor_contact_person-0', _('Contact Person'), array( $this, 'andmoraho_vendor_contact_person_metabox_callback'), 'vendor', 'normal', 'high');
        add_meta_box('_andmoraho_vendor_email-1', _('Email'), array( $this, 'andmoraho_vendor_email_metabox_callback'), 'vendor', 'normal', 'high');
        add_meta_box('_andmoraho_vendor_phone-2', _('Phone'), array( $this, 'andmoraho_vendor_phone_metabox_callback'), 'vendor', 'normal', 'high');
        add_meta_box('_andmoraho_vendor_url-3', _('Rooms'), array( $this, 'andmoraho_vendor_url_metabox_callback'), 'vendor', 'normal', 'high');
    }

    /**
    * Template for contact person metabox.
    *
    * @since    1.0.0
    */

    public function andmoraho_vendor_contact_person_metabox_callback($post)
    {
        require_once plugin_dir_path(__FILE__) . 'templates/contact-person.tpl.php';
    }

    /**
    * Template for email metabox.
    *
    * @since    1.0.0
    */

    public function andmoraho_vendor_email_metabox_callback($post)
    {
        require_once plugin_dir_path(__FILE__) . 'templates/email.tpl.php';
    }

    /**
    * Template for phone metabox.
    *
    * @since    1.0.0
    */

    public function andmoraho_vendor_phone_metabox_callback($post)
    {
        require_once plugin_dir_path(__FILE__) . 'templates/phone.tpl.php';
    }

    /**
    * Template for URL metabox.
    *
    * @since    1.0.0
    */

    public function andmoraho_vendor_url_metabox_callback($post)
    {
        require_once plugin_dir_path(__FILE__) . 'templates/url.tpl.php';
    }

    /**
    * Save data from meta boxes in admin area.
    *
    * @since    1.0.0
    */
    public function vendors_save_metabox_data($post_id)
    {
        // die(print_r(basename(__FILE__)));

        // Contact Person field nonce
        if (!isset($_POST['vendor_contact_person_metabox_nonce']) || !wp_verify_nonce($_POST['vendor_contact_person_metabox_nonce'], 'vendor_contact_person_metabox')) {
            return $post_id;
        }
        // Email field nonce
        if (!isset($_POST['vendor_email_metabox_nonce']) || !wp_verify_nonce($_POST['vendor_email_metabox_nonce'], 'vendor_email_metabox')) {
            return $post_id;
        }
        // Phone field nonce
        if (!isset($_POST['vendor_phone_metabox_nonce']) || !wp_verify_nonce($_POST['vendor_phone_metabox_nonce'], 'vendor_phone_metabox')) {
            return $post_id;
        }

        // URL field nonce
        if (!isset($_POST['vendor_url_metabox_nonce']) || !wp_verify_nonce($_POST['vendor_url_metabox_nonce'], 'vendor_url_metabox')) {
            return $post_id;
        }

        // return if autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        // Check the user's permissions.
        if (! current_user_can('edit_post', $post_id)) {
            return;
        }

        // store custom fields values
        // Save contact person
        if (isset($_POST['vendor_contact_person'])) {
            update_post_meta($post_id, '_vendor_contact_person', sanitize_text_field($_POST['vendor_contact_person']));
        }

        // Save email
        if (isset($_POST['vendor_email'])) {
            update_post_meta($post_id, '_vendor_email', sanitize_text_field($_POST['vendor_email']));
        }

        // Save phone
        if (isset($_POST['vendor_phone'])) {
            update_post_meta($post_id, '_vendor_phone', sanitize_text_field($_POST['vendor_phone']));
        }

        // Save URL
        if (isset($_POST['vendor_url'])) {
            update_post_meta($post_id, '_vendor_url', sanitize_text_field($_POST['vendor_url']));
        }
    }

    /**
     * Create custom type
     *
     * Create Services Post Type
     *
     * @since    1.0.0
     */


    public function create_post_type()
    {
        $name = 'Vendors';
        $singular_name = 'Vendor';
        $labels = array(
        'name'               => __($name),
        'singular_name'      => __($singular_name),
        'add_new'            => __('Add New '. $singular_name),
        'add_new_item'       => __('Add New '. $singular_name),
        'edit_item'          => __('Edit '. $singular_name),
        'new_item'           => __('Add New '. $singular_name),
        'view_item'          => __('View '. $singular_name),
        'search_items'       => __('Search '. $singular_name),
        'not_found'          => __('No '. strtolower($name) . ' found'),
        'not_found_in_trash' => __('No' . strtolower($name) . ' found in trash'),
        'all_items'          => __('All '. $name),
        );
        $supports = array(
        'title',
        'editor',
        'excerpt',
        'thumbnail'
        );
        $rewrite = array(
        'with_front'    => false,
        'slug'          => strtolower($name),
        );
        $args = array(
        'rewrite'              => $rewrite,
        'labels'               => $labels,
        'supports'             => $supports,
        'public'               => true,
        'has_archive'          => true,
        'menu_icon'            => plugins_url('images/vendors-icon.png', __FILE__),
        );
  
        register_post_type('vendor', $args);

        // Vendor Categories
        register_taxonomy(
            'categories',
            array('vendor'),
            array(
        'hierarchical' => true,
        'label' => 'Categories',
        'singular_label' => 'Category',
        'rewrite' => array( 'slug' => 'categories', 'with_front'=> false )
        )
        );

        register_taxonomy_for_object_type('categories', 'vendor');
    }
}

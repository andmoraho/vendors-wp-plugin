<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/andmoraho/
 * @since      1.0.0
 *
 * @package    Andmoraho_Vendors
 * @subpackage Andmoraho_Vendors/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 *
 * @package    Andmoraho_Vendors
 * @subpackage Andmoraho_Vendors/public
 * @author     Andres Morales <andmoraho@gmail.com>
 */
class Andmoraho_Vendors_Public
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
     * @param      string    $andmoraho_vendors       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($andmoraho_vendors, $version)
    {
        $this->andmoraho_vendors = $andmoraho_vendors;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        wp_enqueue_style($this->andmoraho_vendors, plugin_dir_url(__FILE__) . 'css/andmoraho-vendors-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script($this->andmoraho_vendors, plugin_dir_url(__FILE__) . 'js/andmoraho-vendors-public.js', array( 'jquery' ), $this->version, false);
    }

    /**
     * Adds a default single view template for a vendor opening
     *
     * @since    1.0.0
     */
    public function andmoraho_vendors_single_cpt_template($single_template)
    {
        global $post;

        if ($post->post_type == 'vendor') {
            $single_template = plugin_dir_path(__FILE__) . 'templates/single-vendor.php';
        }

        return $single_template;
    }

    /**
     * Adds a default archive view template for a vendor opening
     *
     * @since    1.0.0
     */
    public function andmoraho_vendors_archive_cpt_template($archive_template)
    {
        global $post;

        if (is_post_type_archive('vendor')) {
            $archive_template = plugin_dir_path(__FILE__) . 'templates/archive-vendor.php';
        }

        return $archive_template;
    }

    /**
    * Registers all shortcodes at once
    *
    * @return [type] [description]
    */
    public function andmoraho_vendors_register_shortcodes()
    {
        add_shortcode('vendors', array( $this, 'andmoraho_vendors_list_vendors' ));
    }

    /**
    * Vendors shortcode
    *
    */
    public function andmoraho_vendors_list_services($atts = array())
    {
        global $post;

        if (is_multisite()) {
            $current_blog_id = get_current_blog_id();
            $blogid = $current_blog_id;
        } else {
            $blogid = 1;
        }

        $atts = shortcode_atts(
            array(
            'id' => '',
            'blogID' => $blogid,
        ),
            $atts,
            'vendors'
        );

       
        switch_to_blog($blogid);
        if (is_numeric(esc_attr($atts['id'])) && esc_attr($atts['id'])!='') {
            $query_args = array(
            'p' => esc_attr($atts['id']),
            'post_type' => 'vendor',
            'post_status' => 'publish',
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
            );
        } else {
            $query_args = array(
            'post_type' => 'vendor',
            'post_status' => 'publish',
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
            );
        }
        
        $html = '<div class="amhvndr_vendorss">';

        $shortcodeVendor = new WP_Query($query_args);
        
        while ($shortcodeVendor->have_posts()) :
            $shortcodeVendor->the_post();
        $html .= '<div class="amhvndr_vendor">
                    <div class="amhvndr_vendor__container">
                        <div class="amhvndr_vendor__image">
                            '.get_the_post_thumbnail($post, $size = 'large', $attr = '').'
                        </div>
                        <div class="amhvndr_vendor__content">
                            <h4 class="amhvndr_vendor__content-title">'.get_the_title().'</h4>
                            <p>'.get_the_content().'</p>
                        </div>
                                           
                    </div>
                </div>';
        // TODO: organizar el html que se va a mostrar con el shortcode
        endwhile;
        $html .= '</div>';
        $big = 999999999; // need an unlikely integer
        $html .= '<div class="amhvndr_pagination">';
        $html .= paginate_links(array(
                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $shortcodeVendor->max_num_pages
            ));
        $html .= '</div>';
        wp_reset_postdata();
        return $html;
    }

    /**
     * Adds a custom column title
     *
     * @since    1.0.0
     */
    public function andmoraho_vendors_shortcode_custom_column($columns)
    {
        $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title'),
        'shortcode' => __('Shortcode'),
        'featured_image' => __('Thumbnail'),
        'date' => __('Date')
        );
        return $columns;
    }

    /**
     * Adds shortcode and thumbnail
     *
     * @since    1.0.0
     */
    public function andmoraho_vendors_shortcode_custom_column_data($column_name, $post_id)
    {
        if ($column_name == 'featured_image') {
            $post_featured_image = $this->andmoraho_vendors_get_featured_image($post_id);
            if ($post_featured_image) {
                echo '<img src="' . $post_featured_image . '" />';
            }
        }

        if ($column_name == 'shortcode') {
            echo '[services id="'.$post_id.'"]';
        }
    }

    /**
     * Adds shortcode and thumbnail
     *
     * @since    1.0.0
     */

    private function andmoraho_vendors_get_featured_image($post_ID)
    {
        $post_thumbnail_id = get_post_thumbnail_id($post_ID);
        if ($post_thumbnail_id) {
            $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, array(254, 78));
            return $post_thumbnail_img[0];
        }
    }
}

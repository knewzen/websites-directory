<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://digital-manager.io
 * @since      1.0.0
 *
 * @package    Web_Directory
 * @subpackage Web_Directory/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Web_Directory
 * @subpackage Web_Directory/admin
 * @author     david fieffe <david@loading-data.com>
 */
class Web_Directory_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of this plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Web_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Web_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/web-directory-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Web_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Web_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/web-directory-admin.js', array( 'jquery' ), $this->version, false );

	}

	// Register Custom Post Type
	public function assets_post_type() {

		$labels = array(
			'name'                  => _x( 'Assets', 'Post Type General Name', '_dm' ),
			'singular_name'         => _x( 'Asset', 'Post Type Singular Name', '_dm' ),
			'menu_name'             => __( 'assets', '_dm' ),
			'name_admin_bar'        => __( 'Assets', '_dm' ),
			'archives'              => __( 'Assets archives', '_dm' ),
			'attributes'            => __( 'Item Attributes', '_dm' ),
			'parent_item_colon'     => __( 'Parent Item:', '_dm' ),
			'all_items'             => __( 'All Items', '_dm' ),
			'add_new_item'          => __( 'Add New Item', '_dm' ),
			'add_new'               => __( 'Add New', '_dm' ),
			'new_item'              => __( 'New Item', '_dm' ),
			'edit_item'             => __( 'Edit Item', '_dm' ),
			'update_item'           => __( 'Update Item', '_dm' ),
			'view_item'             => __( 'View Item', '_dm' ),
			'view_items'            => __( 'View Items', '_dm' ),
			'search_items'          => __( 'Search Item', '_dm' ),
			'not_found'             => __( 'Not found', '_dm' ),
			'not_found_in_trash'    => __( 'Not found in Trash', '_dm' ),
			'featured_image'        => __( 'Featured Image', '_dm' ),
			'set_featured_image'    => __( 'Set featured image', '_dm' ),
			'remove_featured_image' => __( 'Remove featured image', '_dm' ),
			'use_featured_image'    => __( 'Use as featured image', '_dm' ),
			'insert_into_item'      => __( 'Insert into item', '_dm' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', '_dm' ),
			'items_list'            => __( 'Items list', '_dm' ),
			'items_list_navigation' => __( 'Items list navigation', '_dm' ),
			'filter_items_list'     => __( 'Filter items list', '_dm' ),
		);

		$args = array(
			'label'               => __( 'Asset', '_dm' ),
			'description'         => __( 'all the digital manager assets', '_dm' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'post-formats' ),
			'taxonomies'          => array( 'post_tag' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'rewrite'             => false,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
			'query_var'           => true
		);
		register_post_type( 'assets_post_type', $args );

	}

// Register Custom Taxonomy
	public function assets_taxonomy() {

		$labels = array(
			'name'                       => _x( 'types', 'Taxonomy General Name', '_dm' ),
			'singular_name'              => _x( 'type', 'Taxonomy Singular Name', '_dm' ),
			'menu_name'                  => __( 'Type', '_dm' ),
			'all_items'                  => __( 'All types', '_dm' ),
			'parent_item'                => __( 'type Item', '_dm' ),
			'parent_item_colon'          => __( 'type Item:', '_dm' ),
			'new_item_name'              => __( 'New type Name', '_dm' ),
			'add_new_item'               => __( 'Add New type', '_dm' ),
			'edit_item'                  => __( 'Edit type', '_dm' ),
			'update_item'                => __( 'Update type', '_dm' ),
			'view_item'                  => __( 'View type', '_dm' ),
			'separate_items_with_commas' => __( 'Separate types with commas', '_dm' ),
			'add_or_remove_items'        => __( 'Add or remove types', '_dm' ),
			'choose_from_most_used'      => __( 'Choose from the most used', '_dm' ),
			'popular_items'              => __( 'Popular types', '_dm' ),
			'search_items'               => __( 'Search types', '_dm' ),
			'not_found'                  => __( 'Not Found', '_dm' ),
			'no_terms'                   => __( 'No types', '_dm' ),
			'items_list'                 => __( 'types list', '_dm' ),
			'items_list_navigation'      => __( 'types list navigation', '_dm' ),
		);
		$args   = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		);
		register_taxonomy( 'type', array( 'assets_post_type' ), $args );

	}

// Add custom fields to json response
	public function slug_register_featured() {
		register_rest_field( 'assets_post_type',
			'link',
			array(
				'get_callback'    => 'get_meta_to_response',
				'update_callback' => null,
				'schema'          => null,
			)
		);
	}

	public function get_meta_to_response( $object, $field_name, $request ) {
		return get_post_meta( $object[ 'id' ], $field_name, true );
	}
}

<?php
/*
Plugin Name: Contempo Spa Custom Posts
Plugin URI: http://contempographicdesign.com
Description: Register custom posts for spa theme
Version: 1.0.0
Author: Chris Robinson
Author URI: http://contempographicdesign.com
*/

add_action( 'init', 'portfolio_init' );

function portfolio_init() {
	$labels = array(
		'name' => _x( 'Portfolio', 'post type general name', 'contempo' ),
		'singular_name' => _x( 'Portfolio', 'post type singular name', 'contempo' ),
		'add_new' => _x( 'Add New', 'portfolio', 'contempo' ),
		'add_new_item' => __( 'Add New Portfolio Item', 'contempo' ),
		'edit_item' => __( 'Edit Portfolio Item', 'contempo' ),
		'new_item' => __( 'New Portfolio Item', 'contempo' ),
		'view_item' => __( 'View Portfolio Item', 'contempo' ),
		'search_items' => __( 'Search Portfolio', 'contempo' ),
		'not_found' =>  __( 'No portfolio items found', 'contempo' ),
		'not_found_in_trash' => __( 'No portfolio items found in Trash', 'contempo' ),
		'parent_item_colon' => ''
	);

	$args = array( 'labels' => $labels,
		'label' => __('Portfolio', 'contempo'),
		'singular_label' => __('Portfolio Item', 'contempo'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => false,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'portfolio'),
		'menu_position' => 5,
		'has_archive' => true,
		'taxonomies' => array('category'),
		'supports' => array( 'title', 'editor', 'comments', 'author', 'page-attributes', 'thumbnail' )
	); 

	register_post_type( 'portfolio', $args );
}

add_filter( 'manage_edit-portfolio_columns', 'ct_edit_portfolio_columns' ) ;

// Define columns to filter in the edit posts section
function ct_edit_portfolio_columns($columns) {
	$columns = array(
		//Create custom columns
		"cb" => "<input type=\"checkbox\" />",
		"featimage" => "Featured Image",
		"title" => "Title",
		"categories" => "Categories",
		"author" => "Author",
		"date" => "Created",
	);
	return $columns;
}

add_action( 'manage_portfolio_posts_custom_column', 'ct_manage_portfolio_columns', 10, 2 );

// Output custom columns
function ct_manage_portfolio_columns($columns) {
	global $post;

	switch( $columns ) {

		case 'featimage' :

			the_post_thumbnail('thumbnail');

		break;
	}
}

// Register Testimonial custom post type
add_action( 'init', 'testimonial_init' );

function testimonial_init() {
	$labels = array(
		'name' => _x( 'Testimonials', 'post type general name', 'contempo' ),
		'singular_name' => _x( 'Testimonial', 'post type singular name', 'contempo' ),
		'add_new' => _x( 'Add New', 'testimonial', 'contempo' ),
		'add_new_item' => __( 'Add New Testimonial', 'contempo' ),
		'edit_item' => __( 'Edit Testimonial', 'contempo' ),
		'new_item' => __( 'New Testimonial', 'contempo' ),
		'view_item' => __( 'View Testimonial', 'contempo' ),
		'search_items' => __( 'Search Testimonials', 'contempo' ),
		'not_found' =>  __( 'No Testimonials found', 'contempo' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash', 'contempo' ),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'testimonials'),
		'menu_position' => 5,
		'has_archive' => true,
		'taxonomies' => array('category', 'post_tag'),
		'supports' => array( 'title', 'editor', 'comments', 'author', 'page-attributes', 'thumbnail' )
	);

	register_post_type( 'testimonial', $args );
}

add_filter( 'manage_edit-testimonial_columns', 'ct_edit_testimonial_columns' ) ;

// Define columns to filter in the edit posts section
function ct_edit_testimonial_columns($columns) {
	$columns = array(
		//Create custom columns
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Person or Company",
		"quote" => "Quote",
		"tags" => "Tags",
		"author" => "Author",
		"date" => "Created",
	);
	return $columns;
}

add_action( 'manage_testimonial_posts_custom_column', 'ct_manage_testimonial_columns', 10, 2 );

// Output custom columns
function ct_manage_testimonial_columns($column) {
	global $post;

	switch( $column ) {

		case 'quote' :

			echo $post->post_content;

		break;
	}
}

// Register Staff custom post type
add_action( 'init', 'staff_init' );

function staff_init() {
	$labels = array(
		'name' => _x( 'Staff', 'post type general name', 'contempo' ),
		'singular_name' => _x( 'Staff', 'post type singular name', 'contempo' ),
		'add_new' => _x( 'Add New', 'staff', 'contempo' ),
		'add_new_item' => __( 'Add New Staff', 'contempo' ),
		'edit_item' => __( 'Edit Staff', 'contempo' ),
		'new_item' => __( 'New Staff', 'contempo' ),
		'view_item' => __( 'View Staff', 'contempo' ),
		'search_items' => __( 'Search Staff', 'contempo' ),
		'not_found' =>  __( 'No Staff found', 'contempo' ),
		'not_found_in_trash' => __( 'No Staff found in Trash', 'contempo' ),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array('slug' => 'staff'),
		'menu_position' => 5,
		'has_archive' => true,
		'taxonomies' => array('category', 'post_tag'),
		'supports' => array( 'title', 'editor', 'author', 'page-attributes', 'thumbnail' )
	);

	register_post_type( 'staff', $args );
}

add_filter( 'manage_edit-staff_columns', 'ct_edit_staff_columns' ) ;

// Define columns to filter in the edit posts section
function ct_edit_staff_columns($columns) {
	$columns = array(
		//Create custom columns
		"cb" => "<input type=\"checkbox\" />",
		"staffimage" => "Staff Image",
		"title" => "Name",
		"position" => "Position",
		"author" => "Author",
		"date" => "Created",
	);
	return $columns;
}

add_action( 'manage_staff_posts_custom_column', 'ct_manage_staff_columns', 10, 2 );

function ct_manage_staff_columns($columns) {
	global $post;

	switch( $columns ) {

		case 'staffimage' :

			the_post_thumbnail('thumbnail');

		break;

		case 'position':

			echo get_post_meta($post->ID, '_ct_job_title', true);
		
		break;
	}
}

// Register Services custom post type
add_action( 'init', 'services_init' );

function services_init() {
	$labels = array(
		'name' => _x( 'Services', 'post type general name', 'contempo' ),
		'singular_name' => _x( 'Services', 'post type singular name', 'contempo' ),
		'add_new' => _x( 'Add New', 'service', 'contempo' ),
		'add_new_item' => __( 'Add New Service', 'contempo' ),
		'edit_item' => __( 'Edit Services', 'contempo' ),
		'new_item' => __( 'New Service', 'contempo' ),
		'view_item' => __( 'View Services', 'contempo' ),
		'search_items' => __( 'Search Services', 'contempo' ),
		'not_found' =>  __( 'No Services found', 'contempo' ),
		'not_found_in_trash' => __( 'No Services found in Trash', 'contempo' ),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array('slug' => 'services'),
		'menu_position' => 5,
		'has_archive' => true,
		'taxonomies' => array('category', 'post_tag', 'service_type'),
		'supports' => array( 'title', 'editor', 'author', 'page-attributes', 'thumbnail' )
	);

	register_post_type( 'services', $args );
}

add_filter( 'manage_edit-services_columns', 'ct_edit_services_columns' ) ;

// Define columns to filter in the edit posts section
function ct_edit_services_columns($column) {
	$column = array(
		//Create custom columns
		"cb" => "<input type=\"checkbox\" />",
		"featimage" => "Featured Image",
		"title" => "Title",
		"type" => "Type",
		"author" => "Author",
		"date" => "Created",
	);
	return $column;
}

add_action( 'manage_services_posts_custom_column', 'ct_manage_services_columns', 10, 2 );

function ct_manage_services_columns($column) {
	global $post;

	switch( $column ) {

		case 'featimage' :

			the_post_thumbnail('thumbnail');

		break;

		case 'type':

			$_taxonomy = 'service_type';
			$terms = get_the_terms( $post->id, $_taxonomy );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $c )
					$out[] = "<a href='edit-tags.php?action=edit&taxonomy=$_taxonomy&post_type=services&tag_ID={$c->term_id}'> " . esc_html(sanitize_term_field('name', $c->name, $c->term_id, 'category', 'display')) . "</a>";
				echo join( ', ', $out );
			}
			else {
				_e('Unspecified', 'contempo');
			}	
		
		break;
	}
}

?>
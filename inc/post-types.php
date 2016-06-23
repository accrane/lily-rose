<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
  // Register the Homepage Designer

  $labels = array(
    'name' => _x('Designer', 'post type general name'),
    'singular_name' => _x('Designer', 'post type singular name'),
    'add_new' => _x('Add New', 'Designer'),
    'add_new_item' => __('Add New Designer'),
    'edit_item' => __('Edit Designer'),
    'new_item' => __('New Designer'),
    'view_item' => __('View Designer'),
    'search_items' => __('Search Designer'),
    'not_found' =>  __('No Designer found'),
    'not_found_in_trash' => __('No Designer found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Designer'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),

  ); 
  register_post_type('designer',$args); // name used in query

  // Register the Homepage Designer

  $labels = array(
    'name' => _x('Testimonial', 'post type general name'),
    'singular_name' => _x('Testimonial', 'post type singular name'),
    'add_new' => _x('Add New', 'Testimonial'),
    'add_new_item' => __('Add New Testimonial'),
    'edit_item' => __('Edit Testimonial'),
    'new_item' => __('New Testimonial'),
    'view_item' => __('View Testimonial'),
    'search_items' => __('Search Testimonial'),
    'not_found' =>  __('No Testimonial found'),
    'not_found_in_trash' => __('No Testimonial found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Testimonial'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),

  ); 
  register_post_type('testimonial',$args); // name used in query
  
  
  
} // close custom post type


/*
##############################################
  Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
  // cusotm tax
  register_taxonomy( 'collection', 'designer',
    array( 
      'hierarchical' => true, // true = acts like categories false = acts like tags
      'label' => 'Collections', 
      'query_var' => true, 
      'rewrite' => true ,
      'show_admin_column' => true,
      'public' => true,
      'rewrite' => array( 'slug' => 'collection' ),
      '_builtin' => true
    ) );

} // End build taxonomies


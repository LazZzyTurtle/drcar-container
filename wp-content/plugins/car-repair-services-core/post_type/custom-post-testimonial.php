<?php
add_action( 'init', 'car_repair_services_testimonial_postype' );

function car_repair_services_testimonial_postype() {

    $labels = array(
        'name' => __( 'Testimonial','creative'),
        'singular_name' => __( 'Testimonial','creative' ),
        'add_new' => __('Add New','creative'),
        'add_new_item' => __('Add New Testimonial','creative'),
        'edit_item' => __('Edit Testimonial','creative'),
        'new_item' => __('New Testimonial','creative'),
        'view_item' => __('View Testimonial','creative'),
        'search_items' => __('Search Testimonial','creative'),
        'not_found' =>  __('No Testimonial found','creative'),
        'not_found_in_trash' => __('No Testimonial found in Trash','creative'),
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
        'supports' => array('title','editor', 'thumbnail'),
        'rewrite' => array( 'slug' => __('testimonial', 'creative') )
    );

    register_post_type( 'car-testimonial', $args);
    
}
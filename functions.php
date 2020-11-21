<?php

function init_template(){
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'title-tag');

	register_nav_menus( 
		array(
			'top menu' => 'Menú Principal'
		) 
	);
}

add_action('after_setup_theme','init_template');

function assets(){
	wp_register_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css','','4.5.0','all');
	wp_register_style('montserrat','https://fonts.googleapis.com/css2?family=Montserrat&display=swap','','1.0','all');
	
	wp_enqueue_style('estilos',get_stylesheet_uri(), array('bootstrap','montserrat'),'1.0','all');
	
	wp_register_script('popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js','','1.16.0',true);
	
	wp_enqueue_script('boostrap','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery','popper'),'4.4.1',true);
	wp_enqueue_script('custom',get_template_directory_uri().'/assets/js/custom.js','',1.0,true);
	
}

add_action('wp_enqueue_scripts','assets');

function sidebar(){
	register_sidebar( 
		array(
			'name' => 'Pie de Página',
			'id' => 'footer',
			'description' => 'zona de widgets para pie de página',
			'before_title' => '<p>',
			'after_title' => '</p>',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>'
		)
	);
}

add_action('widgets_init', 'sidebar');

function productos_type(){

	$labels = array(
		'name' => 'productos',
		'singular_name' => 'producto',
		'menu_name' => 'Productos',
	);

	$args = array(
		'label' => 'productos',
		'description' => 'Productos de Platzi',
		'labels' => $labels,
		'supports' => array('title','editor','thumbnail','revisions'),
		'public' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-cart',
		'can_export' => true,
		'publicly_queryable' => true,
		'rewrite' => true,
		'show_in_rest' => true
	);
	register_post_type('productos', $args);
}

add_action('init','productos_type');
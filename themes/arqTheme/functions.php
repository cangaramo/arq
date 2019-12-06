<?php
/* Add menus */
add_theme_support( 'post-thumbnails' ); 
  
register_nav_menus(
	array(
		'main' => __('Main Menu'),
		'footer' => __('Footer  Menu')
	)
);

/* Enqueue styles and scripts */

function enqueue_theme_scripts() {
	//CSS
	wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css');
	wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
	wp_enqueue_style( 'font-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&display=swap');
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/min/styles.min.css', '', '1.1');
	wp_enqueue_style( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css');
	wp_enqueue_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css');

	//JS
	wp_deregister_script( 'jquery' );
	wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js');
	wp_register_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'));
	wp_register_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'));
	wp_register_script('main-js', get_template_directory_uri() . '/assets/js/min/scripts.min.js', array('jquery'), '1.2');
	wp_register_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'));

	wp_enqueue_script('jquery');
	wp_enqueue_script('popper-js');
	wp_enqueue_script('bootstrap-js');
	wp_enqueue_script('main-js');
	wp_enqueue_script('slick-js');
}
add_action( 'wp_enqueue_scripts', 'enqueue_theme_scripts' );


//Add options
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

function load_posts() {

	$keyword = $_POST['keyword'];

	/* General arguments */
	$args = array(
		'post_type'   => array('page', 'news', 'publications', 'responsibility'),
		'orderby' => 'relevance', 
		'order'	=> 'ASC',
		'posts_per_page' => 5,
		's' => $keyword
	);

	//Main query
	$query = new WP_Query( $args );


	// LOOP - show posts
	if( $query->have_posts() ) :

		while( $query->have_posts() ): $query->the_post();
			$mypost = $query->post;
			$id = get_the_ID();
			$link = get_the_permalink(); 
			$post_type = get_post_type($id);
			$title = get_the_title($id);
		?>	

			<a class="result" href="<?php echo $link ?>"> <?php echo $title ?></a>
		<?php

		endwhile;

			
		wp_reset_postdata();
	else :
			
		echo 'No posts found';
			
	endif;


	die();
}
	
add_action( 'wp_ajax_nopriv_load_posts', 'load_posts' );
add_action( 'wp_ajax_load_posts', 'load_posts' );


/* Load documents */
require 'functions/function-load_documents.php';
add_action( 'wp_ajax_nopriv_load_documents', 'load_documents' );
add_action( 'wp_ajax_load_documents', 'load_documents' );


/* Load updates */
require 'functions/function-load_updates.php';
add_action( 'wp_ajax_nopriv_load_updates', 'load_updates' );
add_action( 'wp_ajax_load_updates', 'load_updates' );


/* Load news and media */
require 'functions/function-load_news.php';
add_action( 'wp_ajax_nopriv_load_news', 'load_news' );
add_action( 'wp_ajax_load_news', 'load_news' );

/* Hide admin bar */
show_admin_bar(false);



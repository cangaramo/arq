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
		'post_type'   => array('page', 'news', 'publications', 'responsibility', 'search_term'),
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
function cc_wpse_278096_disable_admin_bar() {
	if (current_user_can('administrator')) {
	  show_admin_bar(true); 
	} else {
	  show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'cc_wpse_278096_disable_admin_bar');


function my_admin_menu() {
	add_menu_page(
		__( 'Sample page', 'my-textdomain' ),
		__( 'Activity', 'my-textdomain' ),
		'manage_options',
		'sample-page',
		'my_admin_page_contents',
		'dashicons-chart-area',
		40
	);
}

add_action( 'admin_menu', 'my_admin_menu' );

/* User activity */
function my_admin_page_contents() {

	global $wpdb;
	$table = 'user_activity';
	$result = $wpdb->get_results ( "SELECT * FROM $table ORDER BY user, date DESC");
				 
	?>

		<style>
		table{
			width: 95%;
		}
		@media (min-width: 992px){
			table {
				width: 550px;
			}
		}
		th {
			color: #fff;
			background-color: #343a40;
			border-color: #454d55;
			text-align: left;
		}
		tr {
			background: white;
		}
		table td, table th {
			padding: .48rem;
			vertical-align: top;
			border-top: 1px solid #dee2e6;
		}
		td a {
			color: #9e0317 !important;
			text-decoration: none;
		}

		td a:hover {
			color: #343a40 !important;
		}

		td a:focus {
			outline: none;
			box-shadow: none;
		}
		</style>

		<h1 style="margin-top: 30px; margin-bottom: 30px">
			Users downloads
		</h1>

		<div>

			<table class="table">

				<?php 
				foreach ( $result as $user ): 
				
					$user_id = $user->Id;
					$username = $user->user;
					$activity = $user->activity;
					$link = get_the_permalink($activity);
					$title = get_the_title($activity);

					//Date
					$date = $user->date;
					$date = substr($date, 0, -3);

					if ($username != $last_username): 
						$total_activity = 0;
					?>

						<thead>
							<tr>
							<th><?php echo $username ?></th>
							</tr>
						</thead>
					
					<?php else: 
						$total_activity = $total_activity + 1;
					?>


					<?php endif ?>


					<tbody>

						<?php if ($total_activity < 10) : ?>

							<tr>
								<td>				
								<a href="<?php echo $link ?>"><?php echo $title ?></a><span style="float:right"><?php echo $date ?></span>
								</td>
							</tr>

						<?php endif ?>

					</tbody>

				<?php 
					$last_username = $username;

				endforeach ?>

			</table>

		</div>
	<?php
}

function set_activity() {

	$user_id = get_current_user_id();
	$user = wp_get_current_user();
	$login = $user->user_login;
	$current_post = $_POST['post'];
	$date = date( 'd/m/Y H:i:s', current_time( 'timestamp', 0 ) );

	$add_post = true;


	//Get activity array
	global $wpdb;
	$query = "SELECT * FROM user_activity WHERE Id = "  .  $user_id;
	$user_activity = $wpdb->get_results($query);


	//User has no activity
	if(empty($user_activity)) {
		$add_post = true;
	}

	//User has activity -> check if post is already stored
	else {
		echo 'user has activity';
		$posts = array();
		foreach ($user_activity as $activity) {
			$post = $activity->activity;
			array_push($posts, $post);
		}

		//If post is not stored
		if (!in_array($post, $posts)) {
			$add_post = true;
		}
	}

	//Add post
	if ($add_post){
		global $wpdb;
		$table = 'user_activity';
		
		$data = array('Id' => $user_id, 'user' => $login, 'activity' => $current_post, 'date' => $date);
		$format = array('%d','%s', '%s', '%s');
		$wpdb->insert($table,$data,$format);
		$my_id = $wpdb->insert_id; 

		$wpdb->show_errors();

	}


	die();

}

add_action( 'wp_ajax_nopriv_set_activity', 'set_activity' );
add_action( 'wp_ajax_set_activity', 'set_activity' );


function custom_login_failed( $username ) {
    $referrer = $_SERVER['HTTP_REFERER'];
 
    if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
		$siteurl = home_url();
		$url = $siteurl . "/login?login=failed'";
        wp_redirect($url );
   //exit;
    }
}
add_action( 'wp_login_failed', 'custom_login_failed' );


/* Where to go if any of the fields were empty */
function verify_user_pass($user, $username, $password) {
	$login_page  = home_url('/login/');
	if($username == "" || $password == "") {
		wp_redirect($login_page . "?login=empty");
		exit;
	}
}
add_filter('authenticate', 'verify_user_pass', 1, 3);


/* Custom formats WYSIWYG */

function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

function my_mce_before_init_insert_formats( $init_array ) {  
	 
	$style_formats = array(  
		array(  
			'title' => 'Bigger font size',  
			'block' => 'span',  
			'classes' => 'bigger-font-size',
			'wrapper' => true,
		),
	);  
	$init_array['style_formats'] = json_encode( $style_formats );  
	return $init_array;  
} 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


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


function my_admin_page_contents() {


	global $wpdb;
	$table = 'user_activity';

	$result = $wpdb->get_results ( "SELECT * FROM $table");

				 
	?>

		<style>
		table{
			width: 500px
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
			padding: .55rem;
			vertical-align: top;
			border-top: 1px solid #dee2e6;
		}
		td a {
			color: #9e0317 !important;
			text-decoration: none;
		}
		</style>

		<h1 style="margin-top: 40px; margin-bottom: 30px">
			Users downloads
		</h1>

		<div>

			<table class="table">

				<?php foreach ( $result as $user ): 
					$user_id = $user->Id;
					$username = $user->user;
					$activity = $user->activity;
					$documents = explode(',', $activity);

					$args = array(
						'post_type' => array('investor_documents', 'shareholder_updates'),
						'include' => $documents,
						'numberposts' => -1,
					);

					$posts = get_posts($args);

					//print_r($posts);

				?>

					<thead>
						<tr>
						<th><?php echo $username ?> </th>
						</tr>
					</thead>

					<tbody>
					<?php foreach ( $posts as $post ): 
						$title = $post->post_title;
						$link =  $post->guid;
					?>
						<tr>
							<td><a href="<?php echo $link ?>"><?php echo $title ?></a></td>
						</tr>

					<?php endforeach ?>
					</tbody>

				<?php endforeach ?>

			</table>

		</div>
	<?php
}


/*
function set_activity() {


	$user_id = get_current_user_id();
	$user = wp_get_current_user();
	$login = $user->user_login;
	$post = $_POST['post'];
	$date = date( 'd/m/Y H:i:s', current_time( 'timestamp', 0 ) );

	//Get activity array
	global $wpdb;
	$query = "SELECT activity FROM user_activity WHERE Id = "  .  $user_id;
	$user_activity = $wpdb->get_results($query);

	//If array doesn't exist 
	if(empty($user_activity)) {

		//Create array
		$posts = array();

		//Add string to array
		array_push($posts, $post);
		$new_activity = implode (",", $posts);

		//Create new row in db
		global $wpdb;
		$table = 'user_activity';
		
		$data = array('Id' => $user_id, 'user' => $login, 'activity' => $new_activity, 'date' => $date);
		$format = array('%d','%s', '%s', '%s');
		$wpdb->insert($table,$data,$format);
		$my_id = $wpdb->insert_id; 
	}

	//If array exists and it's not in the array
	else if (!in_array($post, $posts)) {

		//Get array
		$activity_array = $user_activity[0]->activity;
		$posts = explode(',', $activity_array);

		//Add string to array
		array_push($posts, $post);
		$new_activity = implode (",", $posts);

		//Update row in db
		global $wpdb;
		$table = 'user_activity';

		$data = [ 'activity' => $new_activity ]; 
		$format = [ '%s' ];
		$where = [ 'Id' => $user_id ]; 
		$where_format = [ '%d' ];
		$wpdb->update( $table, $data, $where, $format, $where_format );
	}


	die();
}*/


function set_activity() {


	$user_id = get_current_user_id();
	$user = wp_get_current_user();
	$login = $user->user_login;
	$post = $_POST['post'];
	$date = date( 'd/m/Y H:i:s', current_time( 'timestamp', 0 ) );


	//Get activity array
	global $wpdb;
	$query = "SELECT * FROM activity WHERE Id = "  .  $user_id;
	$user_activity = $wpdb->get_results($query);
	print_r($user_activity);


	foreach ($user_activity as $activity) {
		
	}

}

add_action( 'wp_ajax_nopriv_set_activity', 'set_activity' );
add_action( 'wp_ajax_set_activity', 'set_activity' );
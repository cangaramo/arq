<?php
/*
Template Name: Content Components
*/
$fields = get_fields(get_the_ID());

if (empty($fields)) {
	echo '<div class="component-error">ACF: NO FIELDS TO OUTPUT</div>';
	return;
}

$page_components = array();
foreach($fields['components'] as $field){
	if($field_name !== 'components'){
		array_push($page_components, $field['acf_fc_layout']);
	}
}

global $user_login;

$user = wp_get_current_user();
$user_role = (array) $user->roles; 
$role = $user_role[0];

if ($role == "investor" || $role == "administrator"): 
    $logged_in = true;
else:
    $logged_in = false;
endif;    
    
$slug = basename(get_permalink());
if ($slug == "arq-investor-area" && $logged_in == false){
    $siteurl = home_url();
	$url = $siteurl;
	wp_redirect( $url );
    exit;
}

?>

<?php get_header(); ?>
<?php require('nav-header.php') ?>

	<main>

		<?php
			foreach($page_components as $index => $component){
				$component_index = $index;
				require('parts/util-get-component-values.php');
				require(locate_template( 'parts/component-' . $component . '.php', false, false));
			}	
		?>

	</main> <!-- end #content -->

<?php require('nav-footer.php') ?>
<?php get_footer(); ?>

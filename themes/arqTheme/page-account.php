<?php 
/*
Template Name: Account Page */
 
get_header(); 
require('nav-header.php');
?>

<main>

    <?php 
        $title = get_the_title();
		$bg = get_field('banner_image');
		$account_desc = get_field('account_description', 'option'); 
    ?>

    <div class="bg-image banner position-relative" style="background-image:url('<?php echo $bg ?>')">

        <div class="layer h-100 w-100">
            <div class="container h-100">
                <div class="d-flex h-100 align-items-center">
                    <h1 class="position-relative"><?php echo $title ?></h1>
                </div>
            </div>
        </div>

    </div> 

	<?php if ( is_user_logged_in() ) : ?>

		<div class="container small-padding py-5">

			<?php $submit_form = false; ?>

			<?php  if ( $_POST ) : 

				$old_password = esc_sql($_POST['old_password']); 
				$new_password = esc_sql($_POST['new_password']); 
				$new_password_2 = esc_sql($_POST['new_password_2']); 
				
				global $current_user;
				wp_get_current_user();
				$username = $current_user->user_login;
				$check = wp_authenticate_username_password( NULL, $username, $old_password );
			?>

					<?php if ( empty($old_password) ) : ?>

						<p>Old password is empty</p>
					
					<?php elseif (is_wp_error( $check )): ?>

						<p>Old password is not correct</p>

					<?php elseif ( empty($new_password) ||  empty($new_password_2) || ($new_password != $new_password_2) ) : ?>

						<p>Passwords don't match</p>

					<?php else:
						$submit_form = true;
					?>

					<?php endif; ?>

			<?php endif; ?>

			<?php if ($submit_form): 
				$user_id = get_current_user_id();

				//Change password
				$password = $new_password;
				wp_set_password( $password, $user_id );

				//Login again (changeing password required new login)
				$user = wp_get_current_user();
				wp_set_auth_cookie($user_id);
				wp_set_current_user($user_id);
				do_action('wp_login', $user->user_login, $user);
			?>

				<p class="mt-4">Password has been changed successfully.</p>

			<?php else: ?>

				<div><?php echo $account_desc ?></div>
				
				<div class="my-4 custom-form reset py-3 ">

					<form action="" method="post">  
						<div class="row">
							<div class="col-lg-4">
								
								<label>Old password</label><br />  
								<input type="password" name="old_password" placeholder="Old passowrd" class="register-input mb-4" value="<?php if( ! empty($old_password) ) echo $old_password; ?>" /> <br />   
								<label>New password</label><br />  
								<input type="password" name="new_password" placeholder="New password" class="register-input mb-4" value="<?php if( ! empty($new_password) ) echo $new_password; ?>" /> <br />  
								<label>Retype new password</label><br />  
								<input type="password" name="new_password_2" placeholder="New password" class="register-input mb-4" value="<?php if( ! empty($new_password_2) ) echo $new_password_2; ?>" /> <br /> 

								<input type="submit" id="register-submit-btn" class="my-2" name="submit" value="Submit" />  

							</div>
						</div>
					</form>
				</div>

			<?php endif; ?>


		</div>
		
	<?php else: ?>

		<div class="container my-5">
			<p>You're not logged in.</p>
			<a class="link-form my-3" href="/login">Login here</a>
		</div>

	<?php endif ?>

</main>

<?php require('nav-footer.php') ?>
<?php get_footer(); ?>

<?php 
	global $user_login;
					  
	// If user is already logged in: Go to home
	if ( is_user_logged_in() ) : 
		$siteurl = home_url();
		$url = $siteurl;
		wp_redirect( $url );
		exit;
    endif;
    
    $dashboard_url = get_permalink(233);
    $login_desc = get_field('login_description', 'option'); 
    
?>

<?php get_header(); ?>
<?php require('nav-header.php') ?>

<div class="login-page pt-3">

    <div class="bg-whitesmoke py-lg-5">

        <div class="container py-5">

            <div class="row">
                <div class="col-lg-6">

                <h2 class="mb-4">Login</h2>

                    <div><?php echo $login_desc ?></div>

                    <?php 

                    global $user_login;
                    // In case of a login error.
                    if ( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) : ?>
                        <p class="login-error">Invalid username or password</p>
                    <?php endif;
                                                                        
                    // Empty field
                    if ( isset( $_GET['login'] ) && $_GET['login'] == 'empty' ) : ?>
                        <p class="login-error">Please fill in the fields</p>
                    <?php endif;
                                                                
                    // Login form arguments.
                    $args = array(
                        'echo'           => true,
                        'redirect'       => $dashboard_url, 
                        'form_id'        => 'loginform',
                        'label_username' => __( 'Username' ),
                        'label_password' => __( 'Password' ),
                        'label_remember' => __( 'Remember Me' ),
                        'label_log_in'   => __( 'Log In' ),
                        'id_username'    => 'user_login',
                        'id_password'    => 'user_pass',
                        'id_remember'    => 'rememberme',
                        'id_submit'      => 'wp-submit',
                        'remember'       => false,
                        'value_username' => NULL,
                        'value_remember' => true
                    ); 
                    // Calling the login form.
                    wp_login_form( $args );
                                                                    
                    ?> 

                </div>
            </div>
              
        </div>

    </div>

</div>


<?php require('nav-footer.php') ?>
<?php get_footer(); ?>

<?php
/**
 * This template is used to display the login form with [edd_login]
 */
global $edd_login_redirect;
if ( ! is_user_logged_in() ) :

	// Show any error messages after form submission
	edd_print_errors(); ?>

    <?php do_action( 'edd_login_fields_before' ); ?>
    <form id="edd_login_form" class="edd_form themeplace_edd_form" method="post">
    	<h3><?php esc_html_e( 'Login', 'themeplace-child' ); ?></h3>
        <div class="form-group">
            <input name="edd_user_login" id="edd_user_login" class="required edd-input form-control" type="text" title="<?php esc_html_e( 'Username', 'themeplace-child' ); ?>" placeholder="<?php echo esc_attr__( 'Username' ,'themeplace-child' ); ?>"/>
        </div>
        <div class="form-group">
            <input name="edd_user_pass" id="edd_user_pass" class="password required edd-input form-control" type="password" placeholder="<?php echo esc_attr__( 'Password' ,'themeplace-child' ); ?>"/>
        </div>
        <div class="form-group">
			<input type="hidden" name="edd_redirect" value="<?php echo esc_url( $edd_login_redirect ); ?>"/>
			<input type="hidden" name="edd_login_nonce" value="<?php echo wp_create_nonce( 'edd-login-nonce' ); ?>"/>
			<input type="hidden" name="edd_action" value="user_login"/>
			<input id="edd_login_submit" type="submit" class="form-control" value="<?php esc_html_e( 'Log In', 'themeplace-child' ); ?>"/>
		</div>
		<div class="edd-lost-password">
			<a href="<?php echo wp_lostpassword_url(); ?>" title="<?php esc_html_e( 'Lost Password', 'themeplace-child' ); ?>">
				<?php esc_html_e( 'Lost Password?', 'themeplace-child' ); ?>
			</a>
		</div>
    </form>
	<?php do_action( 'edd_login_fields_after' ); ?>
		
<?php else : ?>
	<h4 class="text-center">
        <?php esc_html_e( 'You are already logged in', 'themeplace-child' ); ?>
	</h4>
<?php endif; ?>

<?php
/**
 * This template is used to display the registration form with [edd_register]
 */
global $edd_register_redirect;

do_action( 'edd_print_errors' ); ?>

<?php if ( ! is_user_logged_in() ) : ?>

<form id="edd_register_form" class="edd_form themeplace_edd_form" method="post">
	<?php do_action( 'edd_register_form_fields_top' ); ?>
	<?php do_action( 'edd_register_form_fields_before' ); ?>
    <h3><?php esc_html_e( 'Register Form', 'themeplace-child' ); ?></h3>
    <!-- additional fields end - LJ -->  
    <div class="form-group">
        <input id="edd-user-login" class="required edd-input form-control" type="text" name="edd_user_login" placeholder="<?php echo esc_attr__( 'Username' ,'themeplace-child' ); ?>" title="<?php esc_attr_e( 'Username', 'themeplace-child' ); ?>" />
    </div>
    <div class="form-group">
		<input id="edd-user-email" class="required edd-input form-control" type="email" name="edd_user_email" placeholder="<?php echo esc_attr__( 'Email' ,'themeplace-child' ); ?>" title="<?php esc_attr_e( 'Email Address', 'themeplace-child' ); ?>" />
    </div>
    <div class="form-group">
		<input id="edd-user-pass" class="password required edd-input form-control" type="password" name="edd_user_pass" placeholder="<?php echo esc_attr__( 'Password' ,'themeplace-child' ); ?>" />
    </div>
    <div class="form-group">
		<input id="edd-user-pass2" class="password required edd-input form-control" type="password" placeholder="<?php echo esc_attr__( 'Confirm Password' ,'themeplace-child' ); ?>" name="edd_user_pass2" />
    </div>
	<input type="hidden" name="edd_honeypot" value="" />
	<input type="hidden" name="edd_action" value="user_register" />
	<input type="hidden" name="edd_redirect" value="<?php echo esc_url( $edd_register_redirect ); ?>"/>
    <div class="form-group">
    	<input class="form-control" name="edd_register_submit" type="submit" value="<?php esc_attr_e( 'Register', 'themeplace-child' ); ?>" />
    	<?php do_action( 'edd_register_form_fields_after' ); ?>
    	<?php do_action( 'edd_register_form_fields_bottom' ); ?>
    </div>
</form>

<?php else : ?>

    <?php do_action( 'edd_register_form_logged_in' ); ?>

<?php endif; ?>

<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/taner-temel-ba7b9844
 * @since             0.0.4
 * @package           Bsict_Extention
 *
 * @wordpress-plugin
 * Plugin Name:       Bolton SICT Extention
 * Plugin URI:        https://www.bolton365.net
 * Description:       Extend Bolton SICT site functionality, do not disable it.
 * Version:           0.0.5
 * Author:            Taner Temel
 * Author URI:        https://www.linkedin.com/in/taner-temel-ba7b9844
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bsict-extention
 * Domain Path:       /languages
 */
/*------------------------------------------------*/
/* SICT Login Logo */
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php plugin_dir_path(__DIR__); ?>wp-content/plugins/bsict-extention/assets/images/sict-logo.png);
		height:90px;
		width:250px;
		background-size: 250px 90px;
		background-repeat: no-repeat;
        	padding-bottom: 0px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/* Logo Link */
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url_title() {
    return 'Bolton Schools ICT';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/*------------------------------------------------*/
/* Global dashboard color scheme */
add_filter( 'get_user_option_admin_color', 'update_user_option_admin_color', 5 );
function update_user_option_admin_color( $color_scheme ) {
    $color_scheme = 'modern';
    return $color_scheme;
}

/*------------------------------------------------*/
/* Login BG Image */
function login_background_image() {
echo '<style type="text/css">
body.login{
background-image: url( "https://res.cloudinary.com/bolton-schools-ict/image/upload/v1685541677/Bolton%20SICT/Pngtreecartoon_books_sunflowers.png" )!important;
}
</style>';
}
add_action('login_head', 'login_background_image');
/*------------------------------------------------*/
/* Sender email address */
function wpb_sender_email( $original_email_address ) {
    return 'theorchardsfederation@bolton.education';
}
/* Function to change sender name */
function wpb_sender_name( $original_email_from ) {
    return 'The Orchards Federation';
}
/* Hooking up our functions to WordPress filters  */
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );

/*------------------------------------------------*/
/* Cookie Consent Script */
function cookie_javascript() {
    ?>
<!-- Cookie Consent by FreePrivacyPolicy.com https://www.FreePrivacyPolicy.com -->
<script type="text/javascript" src="//www.freeprivacypolicy.com/public/cookie-consent/4.1.0/cookie-consent.js" charset="UTF-8"></script>
<script type="text/javascript" charset="UTF-8">
document.addEventListener('DOMContentLoaded', function () {
cookieconsent.run({"notice_banner_type":"simple","consent_type":"express","palette":"light","language":"en","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":false,"preferences_center_close_button_hide":false,"page_refresh_confirmation_buttons":false});
});
</script>

<noscript>Cookie Consent by <a href="https://www.freeprivacypolicy.com/">Free Privacy Policy Generator</a></noscript>
<!-- End Cookie Consent by FreePrivacyPolicy.com https://www.FreePrivacyPolicy.com -->

<!-- Below is the link that users can use to open Preferences Center to change their preferences. Do not modify the ID parameter. Place it where appropriate, style it as needed. -->

<a href="#" id="open_preferences_center">Update cookies preferences</a>

    <?php
}
add_action('wp_footer', 'cookie_javascript');

/*------------------------------------------------*/
// Enqueue custom CSS file
function sictext_enqueue_styles() {
    wp_enqueue_style( 'sictext-custom-styles', plugins_url( '/css/custom-styles.css', __FILE__ ), array(), '1.0' );
}

// Hook the function to the wp_enqueue_scripts action hook
add_action( 'wp_enqueue_scripts', 'sictext_enqueue_styles' );
?>

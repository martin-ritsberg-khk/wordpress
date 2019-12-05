<?php

add_action('admin_menu', 'seos_music_admin_menu');

function seos_music_admin_menu() {

global $seosmusic_settings_page;

   $seosmusic_settings_page = add_theme_page('Seos Music Premium', 'Premium Theme ', 'edit_theme_options',  'my-unique-identifier', 'seos_seosmusic_settings_page');

	add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {

}

function seos_seosmusic_settings_page() {
?>
<div class="wrap">

	<form class="theme-options" method="post" action="options.php" accept-charset="ISO-8859-1">
		<?php settings_fields( 'seos-settings-group' ); ?>
		<?php do_settings_sections( 'seos-settings-group' ); ?>
		
		<div class="seos-music-form">
			<a target="_blank" href="https://seosthemes.com/seos-music/">
				<div class="btn s-red">
					 <?php _e('Buy', 'seos-music'); ?> <img class="ss-logo" src="<?php echo get_template_directory_uri() . '/img/logo.png'; ?>"/><?php _e(' Now', 'seos-music'); ?>
				</div>
			</a>
		</div>
		<div style="width: 100%; margin: 0 auto;  	text-align: center;	display: inline-block;"><a class="p-demo" href="http://seosthemes.info/seos-music-free-wp-theme/" target="_blank">Premium Demo</a></div>
		
		<div class="cb-center">	
			<img class="sb-demo" src="<?php echo get_template_directory_uri() . '/img/SEOS-MUSIC-ADMIN.png'; ?>"/>			
		</div>
		
	</form>
	
</div>
<?php } ?>
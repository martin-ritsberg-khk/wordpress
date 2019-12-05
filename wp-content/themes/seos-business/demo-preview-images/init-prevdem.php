<?php
/**
 * Initialize preview on demo
 *
 * @author Tsvetomir Tsvetanov
 */


function seos_business_isprevdem() {
	$ti_theme     = wp_get_theme();
	$theme_name   = $ti_theme->get( 'TextDomain' );
	$active_theme = seos_business_get_raw_option( 'template' );
	return apply_filters( 'seos_business_isprevdem', ( $active_theme != strtolower( $theme_name ) ) );
}


function seos_business_get_raw_option( $opt_name ) {
	$alloptions = wp_cache_get( 'alloptions', 'options' );
	$alloptions = maybe_unserialize( $alloptions );
	return isset( $alloptions[ $opt_name ] ) ? maybe_unserialize( $alloptions[ $opt_name ] ) : false;
}

if ( seos_business_isprevdem() ) {
	load_template( get_template_directory() . '/demo-preview-images/prevdem-functions.php' );
}

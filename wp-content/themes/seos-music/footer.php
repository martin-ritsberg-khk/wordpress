<?php
/**
 * The template for displaying the footer
 */
?>
<footer>

	<details class="deklaracia">

		<summary><?php _e('All rights reserved', 'seos-music'); ?> &copy; <?php echo get_option('copyright'); ?> <?php bloginfo('name'); ?><a class="back-to-top-link" href="#"></a></summary>
				
				<p><a href="http://wordpress.org/" title="<?php esc_attr_e( 'Themes by SEOS', 'seos-music' ); ?>"><?php printf( __( 'Powered by %s', 'seos-music' ), 'WordPress' ); ?></a></p>
		
		<p><a href="<?php echo esc_url(__('http://seosthemes.com/', 'seos-music')); ?>" target="_blank"><?php _e('Theme by SEOS', 'seos-music'); ?></a></p>	

	</details>
	
</footer>

<?php wp_footer();?>

</body>

</html>

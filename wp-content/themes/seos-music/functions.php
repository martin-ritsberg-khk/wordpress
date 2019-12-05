<?php
/**
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 * For more information on hooks, actions, and filters, see https://codex.wordpress.org/ 
 */


/*********************************************************************************************************
* Basic
**********************************************************************************************************/

	function seos_music_scripts() {
		if (is_singular() && comments_open()) {wp_enqueue_script('comment-reply');}
	}

	function seos_music_add_editor_styles() {
			add_editor_style( get_template_directory_uri() . '/style.css' );
		}

		if ( ! isset( $content_width ) ) $content_width = 600;
	
	function seos_music_setup() {
		load_theme_textdomain( 'seos-music', get_template_directory() . '/languages' );
		add_action( 'admin_init', 'seos_music_add_editor_styles' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support( 'woocommerce' );			
	}

	add_action( 'after_setup_theme', 'seos_music_setup' );
	
	
	
/*********************************************************************************************************
* Register Sidebar
**********************************************************************************************************/


	function seos_music_widgets_init() {
		register_sidebar( array(
			'id'  => ('sidebar-1'),
			'name'  => __( 'sidebar-1', 'seos-music'),
			'description' => __( 'This sidebar is left.', 'seos-music' ),
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',			
		) );


	}

		add_action( 'widgets_init', 'seos_music_widgets_init' );



/*********************************************************************************************************
* Register Nav Menu
**********************************************************************************************************/


		register_nav_menus(array(
			'menu-top' => __('Menu top', 'seos-music')
		));



/*********************************************************************************************************
* Search Form
**********************************************************************************************************/


		function seos_music_my_search_form( $form ) {
			$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
			<input type="text" value="' . get_search_query() . '" name="s" id="s" />
			<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'seos-music' ) .'" />
			</form>';
			return $form;
		}

		add_filter( 'get_search_form', 'seos_music_my_search_form' );


/*********************************************************************************************************
* Pagination. 
**********************************************************************************************************/


		if ( ! function_exists( 'seos_music_mb_pagination' ) ) :

		function seos_music_mb_pagination() {
			global $wp_query;
			$current = max( 1, get_query_var('paged') );

			$pagination_return = paginate_links( array(
				'format' => '?paged=%#%',
				'current' => $current,
				'total' => $wp_query->max_num_pages,
				'next_text' => '&raquo;',
				'prev_text' => '&laquo;'
			) );

			if ( ! empty( $pagination_return ) ) {
				echo '<div class="pagination">';
				echo '<div class="total-pages">';
				echo '</div>';
				echo $pagination_return;
				echo '</div>';
			}
		}
		endif; 

 	$seosmusic_page = array(
		'before'           => '<p>' . __( 'Pages:', 'seos-music' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page', 'seos-music' ),
		'previouspagelink' => __( 'Previous page', 'seos-music' ),
		'pagelink'         => '%',
		'echo'             => 1
	);
 
        wp_link_pages( $seosmusic_page);



/*********************************************************************************************************
* Load CSS
**********************************************************************************************************/


		function seos_music_css() {		   
				wp_enqueue_style('seosmusic_style', get_stylesheet_uri());
			}

		add_action('wp_enqueue_scripts', 'seos_music_css');

		function seos_music_admin() {		   
				wp_enqueue_style( 'seosmusic_options', get_template_directory_uri() . '/css/premium-options.css');
			}

		add_action('admin_enqueue_scripts', 'seos_music_admin');



/*********************************************************************************************************
* Custom header
**********************************************************************************************************/


	function seos_music_after_header_setup(){
		$seos_music_custom_header_logo  = array(
			'width'         => 1300,
			'height'        => 100,
			'random-default' => true,
			'flex-height'            => true,
			'flex-width'             => false,
			'header-text'            => false,
		);

		add_theme_support( 'custom-header', $seos_music_custom_header_logo );

				register_default_headers( array(
				'yourimg' => array(
				'url' => get_template_directory_uri() . '/img/header.png',
				'thumbnail_url' => get_template_directory_uri() . '/img/header.png',
				'description' => _x( 'Yourimg', 'header image description', 'seos-music' )),
				));
		}
		
	add_action( 'after_setup_theme', 'seos_music_after_header_setup' );		


/*********************************************************************************************************
* Custom Colors Customize
**********************************************************************************************************/


		function seos_music_colors($wp_customize) {



/********************************************
* Header Color
*********************************************/ 
 

		$wp_customize->add_setting('seosmusic_header_color', array(         
		'default'     => 'FFFFFF',
		 'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'seosmusic_header_color', array(
		'label' => __('Header Color', 'seos-music'),        
		 'section' => 'colors',
		'settings' => 'seosmusic_header_color'
		)));

		
}
		add_action('customize_register', 'seos_music_colors');


	
?><?php
		function seos_music_customize_css() {
    ?>
		<style type="text/css">
			header, header p, header h1 {color:<?php echo esc_html(get_theme_mod('seosmusic_header_color')); ?>;}   
		</style>
    <?php
	

	
}
		add_action('wp_head', 'seos_music_customize_css');



/*********************************************************************************************************
* Custom Background Color
**********************************************************************************************************/

		function seos_music_header_setup(){

				$seos_music_custom_background = array(
					'default-color' => '#000000',
					'default-image' => true,
					'wp-head-callback'       => '_custom_background_cb',
					'default-image'   		 => get_template_directory_uri() . '/img/music.png',
					'random-default'         => true,
					'flex-height'            => true,
					'flex-width'             => false,
					'header-text'            => false,
				);
				add_theme_support( 'custom-background', $seos_music_custom_background );
				
			}	
				add_action( 'after_setup_theme', 'seos_music_header_setup' );		

/*********************************************************************************************************
* Excerpt
**********************************************************************************************************/


		function seos_music_new_excerpt_more( $more ) {
			return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'seos-music') . '</a>';
		}
			add_filter( 'excerpt_more', 'seos_music_new_excerpt_more' );

		function seos_music_custom_excerpt_length( $length ) {
			return 50;
		}
		add_filter( 'excerpt_length', 'seos_music_custom_excerpt_length', 999 );


/*********************************************************************************************************
* Other
**********************************************************************************************************/

function seos_music__google_fonts() {

			wp_enqueue_style( 'font-oswald', '//fonts.googleapis.com/css?family=Oswald:400,300,700', false, 1.0, 'screen' );
		}
		add_action( 'wp_enqueue_scripts', 'seos_music__google_fonts' );

		
/*********************************************************************************
 * Seos music - how to use
**********************************************************************************/


if ( ! function_exists( 'seos_music_how_to_use' ) ) :
	function seos_music_how_to_use( $wp_customize ) {
 
		$wp_customize->add_section( 'seos_music_how_to_use_section' , array(
			'title'       => __( 'How to use Seos Music', 'seos-music' ),
			'description' => __( '<a class="button button-primary" href="http://seosthemes.com/seos-music/">How to use Seos Music</a>', 'seos-music' ),
			'priority'   => 1,
		) );
		
		$wp_customize->add_setting( 'seos_music_how_to_use', array (
			'sanitize_callback' => 'esc_url',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_music_how_to_use', array(
			'label'    => __( 'How to use Seos Music', 'seos-music' ),
			'section'  => 'seos_music_how_to_use_section',
			'settings' => 'seos_music_how_to_use',
			'type'     => 'radio',

		) ) );
		
}
endif;
		add_action('customize_register', 'seos_music_how_to_use');
		
/***********************************************************************************
 * Seos Music Pro
***********************************************************************************/

		function seos_music_support($wp_customize){
			class Seos_Music_Customize extends WP_Customize_Control {
				public function render_content() { ?>
				<div class="seos_business-info"> 
					<div class="button media-button button-primary button-large media-button-select">
						<a class="am-premium" href="<?php echo esc_url( 'http://seosthemes.com/seos-music/' ); ?>" title="<?php esc_attr_e( 'Seos Music Buy', 'seos-music' ); ?>" target="_blank">
						<?php _e( 'Buy Premium', 'seos-music' ); ?>
						</a>
					</div>
				</div>
				<?php
				}
			}
		}
		add_action('customize_register', 'seos_music_support');

		function customize_styles_seos_music( $input ) { ?>
			<style type="text/css">
				#customize-theme-controls #accordion-section-seos_music_buy_section .accordion-section-title,
				#customize-theme-controls #accordion-section-seos_music_buy_section > .accordion-section-title {
					background: #555555;
					color: #FFFFFF;
					-webkit-box-shadow: inset 0px -34px 69px -20px rgba(28,170,189,1);
					-moz-box-shadow: inset 0px -34px 69px -20px rgba(28,170,189,1);
					box-shadow: inset 0px -34px 69px -20px rgba(28,170,189,1); 
				}

				.seos_business-info button a {
					color: #FFFFFF;
				}	
			</style>
		<?php }
		
		add_action( 'customize_controls_print_styles', 'customize_styles_seos_music');

		if ( ! function_exists( 'seos_music_buy' ) ) :
			function seos_music_buy( $wp_customize ) {
			$wp_customize->add_section( 'seos_music_buy_section', array(
				'title'			=> __('Seos Music Pro', 'seos-music'),
				'description'	=> __('	Learn more about Seos Music. ','seos-music'),
				'priority'		=> 1,
			));
			$wp_customize->add_setting( 'seos_music_setting', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new Seos_Music_Customize(
					$wp_customize,'seos_music_setting', array(
						'label'		=> __('Seos Music how to use', 'seos-music'),
						'section'	=> 'seos_music_buy_section',
						'settings'	=> 'seos_music_setting',
					)
				)
			);
		}
		endif;
		 
		add_action('customize_register', 'seos_music_buy');

/***********************************************************************************
 * Include
***********************************************************************************/

		require_once get_template_directory() . '/inc/premium-options.php';		
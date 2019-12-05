<?php
/**
 * @since Seos_Music 1.21
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>

    <div  id="header-img" style="background: url('<?php header_image(); ?>') repeat; height:<?php echo get_custom_header()->height; ?>%;" >
	
        <div id="header" >
		
			<p class="description"><?php bloginfo('description'); ?></p>
			
			<a class="site-name" href="<?php echo esc_url(home_url('/')); ?>"><h1><?php bloginfo('name'); ?></h1></a>
			
        </div>
		
    </div>
	
	<nav>
	
		<div class="nav-ico">
		
			<a href="#" id="menu-icon">	
			
				<span class="menu-button"> </span>
				
				<span class="menu-button"> </span>
				
				<span class="menu-button"> </span>
				
			</a>
			
			<?php wp_nav_menu ( array('theme_location' => 'menu-top', 'container_id' => 'menu'  )); ?>

		</div>
		
	</nav>
	
</header>

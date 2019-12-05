<?php get_header(); ?>

<main  id="main" role="main">
	
	<?php if (get_option('adsense')): ?><div class="ads"><?php echo get_option('adsense'); ?></div> <?php endif ?>
	
		<section>

<!-- Start dynamic -->

		   <article>
		   
				<?php woocommerce_content(); ?>
				
		   </article>

<!-- End dynamic -->

		</section>
		
	<?php get_sidebar(); ?>

	</main>
	
<?php get_footer(); ?>						
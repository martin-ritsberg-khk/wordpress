<?php get_header(); ?>

	<main id="main" role="main">
	
		<section>  <?php if (have_posts()) : ?><!-- <span>Search Results</span> -->
		
			   <?php while (have_posts()) : the_post(); ?>

			<!-- Start dynamic -->

			<article class="search-article">
			
				<h1><a  id="post-<?php the_ID(); ?>" href="<?php the_permalink();?>"> <?php the_title(); ?></a></h1>
				
				<div class="img-search">
				
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'custom-size' ); } ?>
				
				</div>
				
				<?php the_excerpt(); ?>
				
			</article>
			
			<?php endwhile; ?>
			 
			<div class="nextpage"> <?php seos_music_mb_pagination(); ?></div>
			
			<?php else : ?>
			
			<h1 class="result"><?php _e("No results found. Try again. ", 'seos-music'); ?></h1>
			
			<?php endif; ?>

			<!-- End dynamic -->

		</section>
		
	<?php get_sidebar(); ?>
	
	</main>
	
<?php get_footer(); ?>
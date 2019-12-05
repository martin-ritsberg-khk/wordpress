<?php
/*
* A Simple Category Template
*/
get_header(); ?>
 
	<main id="main" role="main">
	
		<section>
			<!-- Start dynamic -->

					<?php if(have_posts()): while (have_posts()): the_post(); ?>
					
					   <article>
					   
							<?php edit_post_link('Edit', '', ''); ?>
							
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							
							<div class="img-search">
							
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'custom-size' ); } ?> 
								
							</div>
							
							<?php the_excerpt(); ?>
							
					   </article>
					   
					<?php  endwhile; endif; ?>

			<!-- End dynamic -->

			<div class="nextpage"><?php seos_music_mb_pagination(); ?></div>
			
		</section>
		
	<?php get_sidebar(); ?>
	
	</main>
	
<?php get_footer(); ?>
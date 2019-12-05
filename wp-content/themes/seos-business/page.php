<?php get_header(); ?>	

	<main id="main">

		<section>

			<!-- Start dynamic -->

			<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

			<article>
			
			    <?php edit_post_link( __( 'Edit', 'seos-business' ), '', '' ); ?>

				<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>

				<div class="content"><?php the_content();?></div>
		
				<?php comments_template(); ?>
				
			</article>

			<?php endwhile; endif; ?>

			<!-- End dynamic -->

		</section>

		<?php get_sidebar(); ?>

	</main>

<?php get_footer(); ?>
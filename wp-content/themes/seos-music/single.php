<?php get_header(); ?>

	<main id="main" role="main">

		<section>

			<!-- Start dynamic -->

			<?php if(have_posts()): while (have_posts()): the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<?php edit_post_link('Edit', '', ''); ?>
				
				<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
				
				<div class="content"><?php the_content();?></div>
				
				<?php if (comments_open() || get_comments_number()) { comments_template(); } ?>
				
				<small> Posted by:</small> <em><?php the_author() ?></em> <small>on</small>
				
				<em class="entry-date"> <?php echo get_the_date(); ?></em>
				
				<p><?php the_tags(); ?></p>
				
				<?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> previous - ', 'seos-music')); ?>
				
				<?php next_post_link('%link', __('next <span class="meta-nav">&rarr;</span>', 'seos-music')); ?>
				
			</article>
			
			<?php endwhile; endif; ?>

			<!-- End dynamic -->

		</section>

		<?php get_sidebar(); ?>
		
	</main>

<?php get_footer(); ?>
<?php
/**
 * Template Name: About
 */

get_header(); 

?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="page" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<section class="page">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</section>	

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div id="secondary" class="widget-area" >
		<?php get_template_part('template-parts/sub-page-nav'); ?>
	</div><!-- #secondary -->

</div><!-- wrapper -->

<?php
get_footer();


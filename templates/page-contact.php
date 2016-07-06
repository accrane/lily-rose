<?php
/**
 * Template Name: Contact
 */

get_header(); ?>
<div class="wrapper">

	<div id="primary" class="content-area-full">
		<main id="page" class="site-main" role="main">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
		</main>
	</div>
	
	
	<div id="primary" class="contact-area">
		<main id="page" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				$information = get_field('information');
				$hours = get_field('hours');
				$map = get_field('map');
				$image = get_field('your_location');
				$size = 'full';

				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					

					<section class="contact">
						<div class="entry-content">
							<?php echo $information; ?>
						</div><!-- .entry-content -->
					</section>

					<section class="hours">
						<div class="entry-content">
							<h2>Hours</h2>
							<?php echo $hours; ?>
						</div><!-- .entry-content -->
					</section>
					

				</article><!-- #post-## -->
			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<section class="contact-media">

		<div class="location">
			<?php echo wp_get_attachment_image( $image, $size ); ?>
		</div>

		<div class="map">
			<?php echo $map; ?>
		</div>

	</section>

</div>
<?php

get_footer();

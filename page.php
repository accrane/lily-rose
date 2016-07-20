<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area-full">
		<main id="page" class="site-main" role="main">

			<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

			<?php
			while ( have_posts() ) : the_post(); ?>

			<div class="entry-content">
				<?php 

				the_content();

				if( is_page('sitemap') ) {
					wp_nav_menu( array( 'theme_location' => 'sitemap', 'menu_id' => 'sitemap' ) );
				}

				?>
			</div>

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
// get_sidebar();
get_footer();

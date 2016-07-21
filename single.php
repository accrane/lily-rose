<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="page" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); 

		$images = get_field('gallery');
		$theTitle = get_the_title();
		$dashed = sanitize_title_with_dashes($theTitle);
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					the_content();
				?>
			</div><!-- .entry-content -->

			<?php if( $images ) : ?>
				<div class="clear"></div>
					<div class="gal <?php echo $postClass; ?>">
				      <?php foreach( $images as $image ):?>
							<div class="single-gal-images">
								<a class="gallery" href="<?php echo $image['sizes']['large']; ?>" data-rel="<?php echo $dashed; ?>">
									<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
								</a>
							</div><!-- gal images -->
					<?php endforeach; ?>
				</div>
				<div class="clear"></div>
			<?php endif; ?>

			<footer class="entry-footer">
				<?php //acstarter_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</article><!-- #post-## -->

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
<?php get_footer();

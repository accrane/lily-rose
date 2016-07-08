<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="page" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				?>

				<div class="blogpost ">
					<a href="<?php the_permalink(); ?>">
						<?php if(has_post_thumbnail()) { ?>
							<div class="image">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php }?>
						<div class="post-content <?php echo $postClass; ?>">
							<h2><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
						</div><!-- post content -->
						<div class="readmore">Read More &raquo;</div>
					</a>
				</div><!-- post -->

			<?php endwhile;

			pagi_posts_nav();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

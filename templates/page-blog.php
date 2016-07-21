<?php
/** 
 * Template Name: Blog
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="page" class="site-main" role="main">

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			
			<?php
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'post',
				'posts_per_page' => 5,
				'paged' => $paged,
			));
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); 

			    if(has_post_thumbnail()) {
					$postClass = 'thumb';
				} else {
					$postClass = 'no-thumb';
				}

				$images = get_field('gallery');
				$theTitle = get_the_title();
				$dashed = sanitize_title_with_dashes($theTitle);
			?>


				<div class="blogpost ">
					<div class="read-post"><a href="<?php the_permalink(); ?>" >read more</a></div>
					
						<?php if(has_post_thumbnail()) { ?>
							<div class="image">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php }?>
						<div class="post-content <?php echo $postClass; ?>">
							<h2><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
						</div><!-- post content -->
						<?php if( $images ) : ?>
								<div class="gal <?php echo $postClass; ?>">
							      <?php foreach( $images as $image ):?>
										<div class="gal-images">
											<a class="gallery" href="<?php echo $image['sizes']['large']; ?>"  data-rel="<?php echo $dashed; ?>">
												<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
											</a>
										</div><!-- gal images -->
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<div class="readmore"><a href="<?php the_permalink(); ?>" >Read More &raquo;</a></div>
					
				</div><!-- post -->


			<?php endwhile; // End of the loop.?>
				<?php pagi_posts_nav(); ?>
		<?php endif; // End of the loop.?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();

<?php
/**
 * Template Name: Collections
 */

get_header(); 

// args 
$args = array(

	);

$collections = get_terms( 'collection' );

?>
<div class="wrapper">
	

	<div id="primary" class="content-area-full">
		<main id="page" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->
	

			<section class="collections">
			<?php 
			

			$i=0;
			foreach( $collections as $col ) : 
				$i++;
				if( $i == 4 ) {
					$colClass = 'last';
					$i=0;
				} else {
					$colClass = 'first';
				}
				// Term Id
				$tID = $col->term_id;
				// Image Field
				$image = get_field('collection_photo', 'collection_'.$tID);
				$size = 'full';
				$link = get_term_link($tID);
				?>

				<div class="collection <?php echo $colClass; ?>">
					<a href="<?php echo $link; ?>">
						<?php if( $image ) { ?>
							<div class="photo">
								<?php echo wp_get_attachment_image( $image, $size ); ?>
							</div>
						<?php } ?>
						<h2><?php echo $col->name; ?></h2>
					</a>
				</div><!-- collection -->

			<?php endforeach; ?>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->
<?php
get_footer();

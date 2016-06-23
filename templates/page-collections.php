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
			<div class="content-area">
				<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile; // End of the loop.
				?>
			</div><!-- content area -->
				
			<div class="widget-area">
				<div class="subnav">
					<h3>collections</h3>
					<ul>
					<?php foreach( $collections as $col ) {
						$tID = $col->term_id;
						$link = get_term_link($tID);
						$image = get_field('logo', 'collection_'.$tID);
						$size = 'full';

						echo '<li>';
							echo '<a href="'. $link . '">';
								echo $col->name;
						echo '</a></li>';
						} ?>
					</ul>
				</div><!-- subnav -->
			</div><!-- widget area -->

		</main><!-- #main -->
	</div><!-- #primary -->

	<div id="primary" class="content-area-full">
		<main id="page" class="site-main" role="main">

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

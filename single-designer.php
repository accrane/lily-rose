<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); 

// Bridesmaids IDr
$contract = get_field('contract', 'collection_5');

?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="page" class="site-main" role="main">

		<?php while(have_posts()) : the_post();

			$postID = get_the_ID();
			$title = get_the_title();
			$desc = get_field('description');
			$chart = get_field('sizing_chart');
			$oldchart = get_field('old_sizing_chart');
			$sani = sanitize_title_with_dashes($title);
			// image
			$image = get_field('image');
			$logo = get_field('logo');
			$size = 'full';
			// gallery
			$gallery = get_field('gallery');
			$designerWebLink = get_field('designer_website');

		 ?>
		<div id="<?php echo $sani; ?>" class="designer" >
			<header class="entry-header">
				<h2 class="entry-title">
					<?php the_title();  ?>
				</h2>
			</header><!-- .entry-header -->

			<div class="photo">
				<?php if($designerWebLink){?><a target="_blank" href="<?php echo $designerWebLink; ?>"><?php } ?>
					<?php echo wp_get_attachment_image( $image, $size ); ?>
				<?php if($designerWebLink){?></a><?php } ?>
			</div>

			<div class="designer-right">
			<div class="logo"><?php echo wp_get_attachment_image( $logo, $size ); ?></div>
				<div class="entry-content">
					<?php echo $desc; ?>
				</div><!-- entry content -->
				<?php 
				if( $gallery ): ?>
					<div style="display:none;">
					    <?php foreach( $gallery as $image ): ?>
					    	
					    	<a class="gallery" href="<?php echo $image['url']; ?>" data-rel="<?php echo $sani; ?>" >
					    	
			                     More Photos
			                </a>
					     <?php endforeach; ?>
				   </div><!-- display none -->

				   <?php if( $chart != '' ) { ?>
				   		<?php if( $postID === 177 || $postID === 179 ) { ?>
				   			<a target="_blank" class="order-form" href="<?php echo $chart; ?>">Sizing Chart Spring 2017 &amp; After</a>
				   		<?php } else { ?>
				   			<a target="_blank" class="order-form" href="<?php echo $chart; ?>">Sizing Chart</a>
				   		<?php } ?>
				   <?php } ?>

				   <?php if( $oldchart != '' ) { ?>
				   		<a target="_blank" class="order-form" href="<?php echo $oldchart; ?>">Sizing Chart Fall 2016 &amp; Before</a>
				   <?php } ?>
				   <div class="clear"></div>
				   <?php if($designerWebLink) { ?>
			    		<a class="order-form" target="_blank" href="<?php echo $designerWebLink; ?>">
			    	<?php } else { ?>
				   <a class="gallery" href="<?php echo $image['url']; ?>" data-rel="<?php echo $sani; ?>" >
				   <?php } ?>
	                     More Photos
	                </a>
				<?php endif; ?>
					
			</div><!-- designer right  -->
		</div><!-- tabbed id -->
	<?php 

		endwhile; // end single
?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="widget-area">
		<?php 


		// Get the Collection the Designer is in
		$postID = get_the_ID();
		$taxonomy = 'collection';
		$terms = get_the_terms($postID, $taxonomy);

		// Collection Name
		foreach($terms as $term) {
			// echo out name
			echo '<h3>'.$term->name.'</h3>';
			// the the slug for the query
			$slug = $term->slug;
		}

		 ?>
		<div class="subnav">
			<ul>
				<?php 
				// Links to other Designers in the Collection
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'designer',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy, // your custom taxonomy
						'field' => 'slug',
						'terms' => array( $slug ) // the terms (categories) you created
					)
				)
			));
			if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>

			<?php endwhile; endif; ?>
			</ul>
		</div><!-- subnav-->
		<?php if( $contract != '' ) { ?>
		   	<a target="_blank" class="order-form" href="<?php echo $contract; ?>">Bridesmaids Order Form</a>
		<?php } ?>
	</div><!-- widget-area -->


	<section class="collections">
		<h2>other collections</h2>
		<?php
		$collections = get_terms( 'collection' );

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


</div><!-- wrapper -->
<?php
get_footer();

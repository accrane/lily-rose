<?php

get_header(); 

$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; 
$slug = $queried_object->slug;



// echo '<pre>';
// print_r($gallery);
// echo '</pre>';

?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="page" class="site-main" role="main">

			<?php //while(have_posts()) : the_post(); 

			$desc = get_field('description', 'collection_'.$term_id);
			$contract = get_field('contract', 'collection_'.$term_id);

			?>

			<header class="entry-header">
				<h2 class="entry-title">
					<?php echo $queried_object->name; ?>
				</h2>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php echo $desc; ?>
			</div>


			

			<?php //endwhile; ?>
			

			

		</main><!-- #main -->
	</div><!-- #primary -->
<?php 

// echo '<pre>';
// print_r($list);
// echo '</pre>';
 ?>
	<div id="secondary" class="widget-area ">
		<div class="subnav sub-nav-collections">
			<h1>collections</h1>
			<ul>
				<?php 
				$collections = get_terms( 'collection' );

				foreach( $collections as $col ) : 

					$tID = $col->term_id;
					$link = get_term_link($tID);

					echo '<li><a href="'.$link.'">';
						echo $col->name;
					echo '</a></li>';

				endforeach;


				// foreach( $list as $item => $item_value ) {

				// 	echo '<li><a href="#'.$item_value.'">';
				// 		echo $item;
				// 	echo '</a></li>';

				// 	} ?>
			</ul>
		</div><!-- subnav -->
		<?php if( $contract != '' ) { ?>
		   	<a target="_blank" class="order-form" href="<?php echo $contract; ?>">Bridesmaids Order Form</a>
		<?php } ?>
	</div><!-- secondary -->

	<section class="other-collections">
	<?php 
	$i=0;
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
	if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();


		$image = get_field('image');
		$logo = get_field('logo');
		$size = 'full';
		$i++;
		if( $i == 5 ) {
			$colClass = 'last';
			$i=0;
		} else {
			$colClass = 'first';
		}

	?>
		<div class="collection <?php echo $colClass; ?>">
			<a href="<?php the_permalink(); ?>">
				<?php if( $image ) { ?>
					<div class="photo">
						<?php echo wp_get_attachment_image( $image, $size ); ?>
					</div>
				<?php } ?>
				<?php if( $logo ) { ?>
					<div class="logo">
						<?php echo wp_get_attachment_image( $logo, $size ); ?>
					</div>
				<?php } ?>
			</a>
		</div><!-- collection -->

<?php endwhile; endif; ?>
	</section>


	<div class="subnav sub-nav-collections-mobile">
		<h1>collections</h1>
		<ul>
			<?php 
			$collections = get_terms( 'collection' );

			foreach( $collections as $col ) : 

				$tID = $col->term_id;
				$link = get_term_link($tID);

				echo '<li><a href="'.$link.'">';
					echo $col->name;
				echo '</a></li>';

			endforeach;


			// foreach( $list as $item => $item_value ) {

			// 	echo '<li><a href="#'.$item_value.'">';
			// 		echo $item;
			// 	echo '</a></li>';

			// 	} ?>
		</ul>
	</div><!-- subnav -->
	


	

</div><!-- wrapper -->
<?php
get_footer();

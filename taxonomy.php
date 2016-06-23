<?php

get_header(); 

$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; 
$slug = $queried_object->slug;

$gallery = get_field('gallery', 'collection_'.$term_id);

// echo '<pre>';
// print_r($gallery);
// echo '</pre>';

?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="page" class="site-main" role="main">

			<header class="entry-header">
				<h1 class="entry-title">
					<?php echo $queried_object->name;  ?>
				</h1>
			</header><!-- .entry-header -->


			<?php 

			if( $gallery ): ?>
			    <?php foreach( $gallery as $image ): ?>
			    	<div class="gallery-image">
		                <a href="<?php echo $image['url']; ?>">
		                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
		                </a>
			        </div><!-- gallery image -->
			        <?php endforeach; ?>
			   
			<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				

			<?php 	endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->
<?php
get_footer();

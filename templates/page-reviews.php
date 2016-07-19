<?php
/**
 * Template Name: Reviews
 */

get_header(); 

// Get this before the Custom Query
$parentID = $post->post_parent;

?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="page" class="site-main" role="main">

			<?php
			$wp_query = new WP_Query();
			$wp_query->query(array(
			'post_type'=>'testimonial',
			'posts_per_page' => 10,
			'paged' => $paged,
		));
			if ($wp_query->have_posts()) : ?>
			<div id="container">
		    <?php while ($wp_query->have_posts()) : ?>
		        
		    <?php $wp_query->the_post(); ?>

		    <div class="item isotope-item">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->
			</div><!-- item -->


		<?php endwhile; ?>
		</div><!-- #container -->
		<?php pagi_posts_nav(); ?>
	<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div id="secondary" class="widget-area" >
		<div class="subnav">
			<?php 
			wp_reset_postdata();

				// WE got our post parent at the top of the page

				$pageTitle = get_the_title($parentID);
				$args = array(

					'child_of' => $parentID, 
					'title_li' => '', 
					'order' => 'DESC', 
					'orderby' => 'menu_order'

					); 
			?>
			<h3><?php echo $pageTitle; ?></h3>
			<?php wp_list_pages($args); ?>
			</div><!-- subnav-->
	</div><!-- #secondary -->
</div><!-- wrapper -->
<?php
get_footer();

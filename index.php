<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

// Get homepage content
$post = get_post(47); 
setup_postdata( $post );
 
	$tagline = get_field('tagline');
	//$hero = get_field('hero');
	$images = get_field('hero_slides');
	// picked blog
	$post_object = get_field('from_the_blog');

	// testimonial bg image
	$background_image = get_field('background_image');

	// Links
	$link_blog = get_field('link_blog');
	$link_instagram = get_field('link_instagram');
	$testmonialLink = get_field('link_testimonial');

 
wp_reset_postdata();

$size = 'full';

?>

<div class="wrapper">
	<section class="hero">
		<div class="tagline"><?php echo $tagline; ?></div>
		<?php //if( $hero ) { echo wp_get_attachment_image( $hero, $size ); } ?>

		<div class="flexslider">
	        <ul class="slides">
	        <?php 

				if( $images ): 

					foreach( $images as $image ):

						?>
	            
	            <li> 
	              
	                <a href="<?php echo $image['url']; ?>">
	                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
	                </a>
	                
	            </li>
	            
	           <?php endforeach; ?>
	           <?php endif; ?>
	      	 </ul><!-- slides -->
		</div><!-- .flexslider -->
		 

	</section>
</div><!-- wrapper -->

	
<main id="main" class="home" role="main">

<div class="wrapper">
	<section class="from-the-blog">
		<h2>
		<a href="<?php bloginfo('url'); ?>/blog">from the blog</a>
		</h2>
		<?php

		if( $post_object ): 

			// override $post
			$post = $post_object;
			setup_postdata( $post ); 

			?>
		    <div class="home-post">
		    	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); }  ?>
		    	<div class="post-wrap">
			    	<div class="info">
			    		<h2><?php the_title(); ?></h2>
			    		<p>READ MORE</p>
			    	</div>
			    	<div class="readmore">
			    		<a href="<?php the_permalink(); ?>">READ MORE</a>
			    	</div>
		    	</div><!-- post wrap -->
		    </div><!-- honme post -->
		    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php 

		else: 

			$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'post',
				'posts_per_page' => 1
			));
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<div class="home-post">
			    	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); }  ?>
				    <div class="post-wrap">
				    	<div class="info">
				    		<h2><?php the_title(); ?></h2>
				    		<p>READ MORE</p>
				    	</div>
				    	
			    	</div><!-- post wrap -->
			    	<div class="readmore">
			    		<a href="<?php the_permalink(); ?>">READ MORE</a>
			    	</div>
			    </div><!-- honme post -->

				<?php endwhile; endif; // post ?>
			<?php endif; // post object ?>
		</section>		

		<section class="instagram">
			<h2>
				<a href="https://www.instagram.com/lilyrosebridal/" target="_blank">@lilyrosebridal</a>
			</h2>
			<div class="instagram-box">
				<a href="<?php echo $link_instagram; ?>">
					<?php echo do_shortcode('[instagram-feed]'); ?>
				</a>
				</div><!-- instagram box -->
		</section>

		<section class="testimonial">
			<h2>
				<a href="<?php bloginfo('url'); ?>/read-our-reviews">from our clients</a>
			</h2>
			<?php $wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'testimonial',
				'posts_per_page' => 1, 
				'orderby' => 'rand'
			));
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<div class="home-post">
					
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); }  ?>
						<div class="info-clear"><?php echo get_excerpt(40); ?></div>
						<div class="swash"></div>
						<div class="background"><?php echo wp_get_attachment_image( $background_image, $size ); ?></div>
					<div class="readmore no-dec"><a href="<?php echo $testmonialLink; ?>">readmore</a></div>
				</div>
				
				<?php endwhile; endif; // post ?>
		</section>

	</div><!-- wrapper -->


	<div class="lace-right"></div>
	<div class="lace-left"></div>

</main><!-- #main -->

<?php
get_footer();

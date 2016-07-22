<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo( 'template_url' ); ?>/favicons/apple-touch-icon.png">
<link rel="icon" type="/image/png" href="<?php bloginfo( 'template_url' ); ?>/favicons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ); ?>/favicons/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php bloginfo( 'template_url' ); ?>/favicons/manifest.json">
<link rel="mask-icon" href="<?php bloginfo( 'template_url' ); ?>/favicons/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">

<?php 

wp_head(); 

$facebook = get_field('facebook_link', 'option');
$instagram = get_field('instagram_link', 'option');
$pintrest = get_field('pintrest_link', 'option');
$address = get_field('address', 'option');
$phone = get_field('phone', 'option');
$sitemap = get_field('sitemap', 'option');
$blogname = get_bloginfo('description');

?>
</head>

<body <?php body_class(); ?>>
<div id="main-page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">



		<?php if(is_home()) { ?>
				<div class="wrapper">
		            <h1 class="logo">
		            	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
		            </h1>
	            </div><!-- wrapper -->

	        <?php } else { 

	        	if ( has_post_thumbnail() || is_tax() ) { ?>
		        	
		        	<?php if( is_single() ) { 
						// specific post ID you want to pull
						$post = get_post(12); 
						setup_postdata( $post );
						 
							
						?>
		        		<div class="page-banner">
			        		<div class="logo-page-banner">
				            	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
				            </div>
							<?php the_post_thumbnail('page-banner'); ?>
						</div><!-- page banner -->

		        	<?php 
						wp_reset_postdata();

		        } elseif( is_tax() ) { 
		        		$termID = get_queried_object()->term_id;
		        		// echo '<pre>';
		        		// print_r($termID);
		        		// echo '</pre>';
		        		$bannerImage = get_field( 'header_image', 'collection_'.$termID );
		        		$size = 'page-banner';


		        		?>
		        		<div class="page-banner">
			        		<div class="logo-page-banner">
				            	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
				            </div>
							<?php if( $bannerImage ) : echo wp_get_attachment_image( $bannerImage, $size ); endif; ?>
						</div><!-- page banner -->
					<?php } else { ?>
						<div class="page-banner">
			        		<div class="logo-page-banner">
				            	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
				            </div>
							<?php the_post_thumbnail('page-banner'); ?>
						</div><!-- page banner -->
					<?php } ?>

				<?php } else { ?> 

		        	<!--<div class="wrapper">
			            <div class="logo-page">
			            	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
			            </div>
		            </div> wrapper -->

		            <div class="page-banner">
			        		<div class="logo-page-banner">
				            	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
				            </div>
							<img src="<?php bloginfo('template_url'); ?>/images/banner-default.jpg">
						</div><!-- page banner -->

		            <div class="clear"></div>

	        <?php } } ?>



		<div class="nav-wrap">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="wrapper">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?>	</button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

					<div class="social social-header">
						<i class="fa fa-2x fa-facebook" aria-hidden="true">
							<a href="<?php echo $facebook; ?>">facebook</a>
						</i>
						<i class="fa fa-2x fa-instagram" aria-hidden="true">
							<a href="<?php echo $instagram; ?>">instagram</a>
						</i>
						<i class="fa fa-2x fa-pinterest-p" aria-hidden="true">
							<a href="<?php echo $pintrest; ?>">pinterest</a>
						</i>
					</div><!-- social -->


				</div><!-- wrapper -->


			</nav><!-- #site-navigation -->
			
			

		</div><!-- nav-wrap -->

	</header><!-- #masthead -->

	<div id="content" class="site-content ">

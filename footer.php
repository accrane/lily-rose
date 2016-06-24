<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

$facebook = get_field('facebook_link', 'option');
$instagram = get_field('instagram_link', 'option');
$pintrest = get_field('pintrest_link', 'option');
$address = get_field('address', 'option');
$phone = get_field('phone', 'option');
$sitemap = get_field('sitemap', 'option');
$mail = get_field('email');
$email = antispambot($mail);
$blogname = get_bloginfo('name');
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="site-info">
				<?php 

				 echo $blogname . ' • ' . $address . '<br>'; 
				 echo $phone . ' • <a href="' . $email . '">' . $email . '</a><br>'; 
				 echo '<a href="' . $sitemap . '">sitemap</a> • site by <a href="http://bellaworksweb.com/">Bellaworks</a>';

				 ?>
			</div><!-- .site-info -->

			<div class="social social-footer">
				<i class="fa fa-2x fa-facebook" aria-hidden="true">
					<a href="<?php echo $facebook; ?>">facebook</a>
				</i>
				<i class="fa fa-2x fa-instagram" aria-hidden="true">
					<a href="<?php echo $instagram; ?>">instagram</a>
				</i>
				<i class="fa fa-2x fa-pinterest-p" aria-hidden="true">
					<a href="<?php echo $pinterest; ?>">pinterest</a>
				</i>
			</div><!-- social -->

	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
<script>
 WebFont.load({
    google: {
      families: ['Muli:400,300:latin', 'Parisienne::latin']
    }
  });
</script>


</body>
</html>

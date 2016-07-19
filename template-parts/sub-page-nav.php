<div class="subnav">
<?php 
wp_reset_postdata();

	$parentID = $post->post_parent;
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
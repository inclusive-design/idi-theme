<div class="idi-equipment-categories fl-push">
	<h3>Categories</h3>

	<?php
		if($post->post_parent)
			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
		else
			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
		if ($children) { ?>
		<ul>
			<?php echo $children; ?>
		</ul>
		<?php } ?>
</div>




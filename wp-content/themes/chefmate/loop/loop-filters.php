<?php
	$categories = get_categories('taxonomy=portfolio-category');
?>

<ul class="filter">
  <li><a class="active" href="#" data-filter="*"><?php _e('All','kyte'); ?></a></li>
  <?php
	foreach ($categories as $category){
		echo '<li><a href="#" data-filter=".' . $category->slug . '">' . $category->name . '</a></li>';
	} 
  ?>
</ul>
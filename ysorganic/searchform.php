<?php
/**
 * The template for displaying the search form.
 */
?>
<div class="blog__sidebar__search">
	<form method="get" id="searchform" action="<?php echo esc_attr(home_url()); ?>" class="search-form">
		<input type="search" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="<?php _e('Search...', 'coupon'); ?>" <?php if (!empty($mts_options['mts_ajax_search'])) echo ' autocomplete="off"'; ?> />
		<button type="submit"><span class="icon_search"></span></button>
	</form>
</div>
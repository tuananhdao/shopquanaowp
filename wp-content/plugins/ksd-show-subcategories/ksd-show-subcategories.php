<?php
/**
 * @package Niteco
 * @version 1.6
 */
/*
Plugin Name: KSD Show Subcategories for WooCommerce
Plugin URI: https://wordpress.org/plugins/
Description: Another plugin by Tuan Anh Dao.
Author: Tuan Anh Dao
Version: 1.0
Author URI: http://đta.vn
*/
function woocommerce_subcats_from_parentcat_by_ID($parent_cat_ID) {
	$args = array(
		'hierarchical' => true,
		'show_option_none' => '',
		'hide_empty' => 0,
		'parent' => $parent_cat_ID,
		'taxonomy' => 'product_cat'
	);
	$subcats = get_categories($args);
	return $subcats;
}
function woocommerce_get_toppest_level_category_id($cat_id) {
	$category = get_category($cat_id);
	$temp_id = $category->term_id;
	while (true)
	{
		$parent_cat_id = $category->category_parent;
		if ($parent_cat_id == 0)
			break;
		
		$category = get_category($parent_cat_id);
		$temp_id = $parent_cat_id;
	}
	return $temp_id;
}
function woocommerce_get_2nd_level_category_id($cat_id)
{
	$category = get_category($cat_id);
	$temp_id = $category->term_id;
	while (true)
	{
		$parent_cat_id = $category->category_parent;
		if ($parent_cat_id == 0)
			break;
		$parent_cat = get_category($parent_cat_id);
		if ($parent_cat->category_parent == 0)
			break;
		
		$category = get_category($parent_cat_id);
		$temp_id = $parent_cat_id;
	}
	return $temp_id;
}
function woocommerce_get_current_category_id() {
	$cate = get_queried_object();
	$cateID = $cate->term_id;
	return $cateID;
}
function ksd_show_subcategories() {
	
	$current_cat_id = woocommerce_get_current_category_id();
	$sub_cats = woocommerce_subcats_from_parentcat_by_ID(woocommerce_get_toppest_level_category_id($current_cat_id));
	$parent_1st_level_cat_id = woocommerce_get_toppest_level_category_id($current_cat_id);
	$parent_2nd_level_cat_id = woocommerce_get_2nd_level_category_id($current_cat_id);
	?>
	<ul id="wooc_sclist">
		<li<?php echo ($current_cat_id == $parent_1st_level_cat_id) ? ' class="current"' : ''; ?>><a href="<?php echo get_term_link($parent_1st_level_cat_id); ?>">View all</a></li>
		<?php
		foreach ($sub_cats as $sc) {
			$link = get_term_link( $sc->slug, $sc->taxonomy );?>
			
		<li<?php echo ($sc->term_id == $parent_2nd_level_cat_id) ? ' class="current"' : ''; ?>><a href="<?php echo $link; ?>"><?php echo $sc->name; ?></a></li>
		
			<?php
			}
		?>
	</ul>
	<?php
}
add_action('woocommerce_archive_description', 'ksd_show_subcategories', 15);

function ksd_show_subcategories_scripts() {
	// Loads our main stylesheet.
	wp_enqueue_style( 'ksd-show-subcategories-style', plugins_url( 'ksd-show-subcategories.css', __FILE__ ) );
}
add_action('wp_enqueue_scripts', 'ksd_show_subcategories_scripts', 15);
?>
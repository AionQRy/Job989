<?php 
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paradiz
 */

if ( ! is_active_sidebar( 'act-photo' ) ) {
	return;
}
?>

<aside id="act-photo" class="widget-area widget-ac _heading">
    <?php dynamic_sidebar( 'act-photo' ); ?>
</aside>
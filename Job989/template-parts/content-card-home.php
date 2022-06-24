<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passiongen
 */
$author_id = get_the_author_meta( 'ID' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="box-thumbnail">
		<a href="<?php echo get_the_permalink(); ?>">
		<?php $chk_postimg = get_the_post_thumbnail(get_the_ID()); ?>
		<?php if ( $chk_postimg ) : ?>
			<?php the_post_thumbnail('post-home'); ?>
			<?php else:
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
		?>
		<div class="contact-img">
			<img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="">
			<div class="contact-text">
				<p>ติดต่อโฆษณา</p>
				<p>084-556-9714</p>
			</div>
		</div>
		<?php endif; ?>
		</a>
	</div>
	<div class="box-detail">
	<div class="box-title">
	    <a href="<?php echo get_the_permalink(); ?>">
		    <h3 class="post-title"><?php echo get_the_title(); ?></h3>
		</a>
	</div>
	</div>
</article>

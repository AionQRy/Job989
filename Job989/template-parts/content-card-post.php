<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Job989
 */
global $post;
$author_id = get_the_author_meta( 'ID' );
$post_date = get_the_date( 'd/m/Y' ); 
$post_view = pvc_get_post_views( $post_id = 0 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="box-thumbnail">
		<a href="<?php echo get_the_permalink(); ?>">
		<?php $chk_postimg = get_the_post_thumbnail(get_the_ID()); ?>
		<?php if ( $chk_postimg ) : ?>	
			<?php the_post_thumbnail('medium'); ?>	
		<?php else: 
			echo '<img class="img-none" src="/wp-content/uploads/2020/09/Cover_Retina.jpg" />';
			?>
		<?php endif; ?>				    
	    </a>
	</div>
	<div class="box-title">
	    <a href="<?php echo get_the_permalink(); ?>">
		    <h3 class="post-title"><?php echo get_the_title(); ?></h3>
        </a>
        <div class="box-excerpt">
			<p><?php 
            $exceprt = wp_filter_nohtml_kses(get_the_excerpt());
            echo $exceprt; ?></p>        
        </div>
    </div>
	<div class="box-post_author">
    <div class="main-view">
		<div class="calendar-box">
			<i class="las la-clock"></i>
			<span class="day"><?php echo $post_date;?></span>
		</div>
		<div class="divide"></div>
		<div class="box-share">
		    <i class="las la-eye"></i>
			    <span class="count"><?php echo $post_view;?></span> 
			</div>
		</div>
	</div>	
</article>

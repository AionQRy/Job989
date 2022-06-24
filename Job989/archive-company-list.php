<?php
 /**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paradiz
 */
  get_header();
?>
<div class="main-archive_company">
 <div class="s-container">
     <div class="main-object">       
         <div class="object-detail">
            <div class="line-box">
            <?php the_archive_title( '<h2 class="company-head">', '</h2>' ); ?>
                <div class="search-bar">
                    <form action="/company/" id="search-company" class="search-company" method="GET">
                        <label for="search_text"><?php // esc_html_e( 'คำที่ต้องการค้นหา', 'Job989' ); ?></label>
                            <div class="box"> 
                                <input type="text" name="s_company" id="search_text" placeholder="<?php esc_html_e( 'กรอกคำค้นหาระบุชื่อบริษัท', 'Job989' ); ?>">
                            </div>
                        </label>	
                        <button type="submit"><i class="las la-search"></i></button>
                    </form>
                </div>
            </div>            

	<div class="list-post_company">
    <?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="main-article">
                <div class="box-thumbnail">
                    <a href="<?php echo get_the_permalink(); ?>">
                    <?php $chk_postimg = get_the_post_thumbnail(get_the_ID()); ?>
                    <?php if ( $chk_postimg ) : ?>
                        <?php the_post_thumbnail('company-thumb'); ?>
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
            </div>
        </article>
    <?php  
    wp_reset_postdata();     
    endwhile;
    ?>
    <?php seed_posts_navigation(); ?>
    <?php else : ?>

    <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>
	</div>
    
     </div>
 </div>
</div>
<?php get_footer(); ?>
<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passiongen
 */

get_header();
?>

	<main id="primary" class="site-main main-list main-archive-post">
    <?php if ( have_posts() ) : ?>
        <div class="title-header-1">
        <div class="s-container">
            <header class="page-header">
            <?php
                the_archive_title( '<h2 class="heading"><span>', '</span></h2>' );
            ?>
            </header><!-- .page-header -->   
        </div>  
        </div>
        <div class="post-hero">
            <div class="s-container">
            <?php /* Start the Loop */
            $terms = get_the_terms( get_the_ID(), 'category' );
            if ( !empty( $terms ) ){
                $term = array_shift( $terms );
            }
            $args_hero = array(
            'posts_per_page'    => 1,
            'post_type'         => 'post',
            'order'             => 'DESC',
            'tax_query'         => array( 
                array(
                'taxonomy'  => 'category',
                'field'     => 'slug',
                'terms'     => array( $term->slug )
                ) 
            )
            );
            query_posts( $args_hero );
            // The Loop
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content','card-post');
               
            endwhile;
                // Reset Query
                wp_reset_query(); 
            ?>  
            </div>
        </div>   
        <div class="s-container">
            <header class="page-header">
            <?php
                the_archive_title( '<h2 class="heading"><span>', '</span></h2>' );
            ?>
            </header><!-- .page-header -->   
        </div>  

        <div class="s-container">           
            <div class="post-main-archive">
            <?php /* Start the Loop */
            $terms = get_the_terms( get_the_ID(), 'category' );
            if ( !empty( $terms ) ){
                $term = array_shift( $terms );
            }
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args_relate = array(
            'posts_per_page'    => 12,
            'post_type'         => 'post',
            'order'             => 'DESC',
            'offset' => 1,
            'tax_query'         => array( 
                array(
                'taxonomy'  => 'category',
                'field'     => 'slug',
                'terms'     => array( $term->slug )
                ) 
                ),
            'paged' => $paged
            );
            query_posts( $args_relate );
            // The Loop
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content','card-post');
               
            endwhile;
            seed_posts_navigation();
                // Reset Query
                wp_reset_query(); 
            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
            </div>			
            <?php  ?>
        </div>
    </main><!-- #main -->
<?php
get_footer();
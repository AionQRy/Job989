<?php
  /* Template Name: Check Organization*/
  get_header();
?>
<?php 
  if(!is_user_logged_in()){
    $url_regx = home_url() . '/login';
    wp_redirect($url_regx);  
  }
        $author_id = get_current_user_id(); 
        $count = count_user_posts( $current_user->ID , ['company-list']  );
            if($count >= 1):                               
                $url_reg = home_url();
                wp_redirect($url_reg);
            endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="<?php if (!is_elementor()) {
  echo "s-container main-body";
} ?>">

    <div id="primary" class="content-area">
        <main id="main" class="site-main hide-title">

            <?php get_template_part( 'template-parts/content', 'page' ); ?>
            <?php wp_reset_postdata(); ?>

        </main>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
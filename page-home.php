<?php
/*
* Template Name: Home page
* Template Post Type: post, page, book
*/ 
?>

<?php get_header(); ?>
<?php if(have_posts()) {
    while(have_posts()) { the_post(); ?>
        <?php if (get_header_image()) : ?>
            <div id="site-header">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                </a>                            
            </div>
        <?php endif; ?>
            
        <article class="post page">
            <!-- text-column -->

            <div class="column-container clearfix">                   
                <div class="text-column">
                    <?php the_content(); ?>  
                </div> <!-- /text-column -->
            </div> <!-- /column container -->
        </article>
        
        <div class="container">
            <div class="container-portfolio">
                <div class="row">
                    <?php
                    $portfolioQuery = new WP_Query(
                        array(
                        'post_type' => 'portfolio',
                        'orderby'   => 'DATE,')
                    );
                    if($portfolioQuery->have_posts()) :
                        while($portfolioQuery->have_posts()) : $portfolioQuery->the_post(); ?>

        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="<?php the_permalink(); ?>"><?php  the_post_thumbnail(); ?></a>      
            </div>
        </div>
                            <?php
                        endwhile;
                    endif; 
                    ?>
        </div>
    </div>
</div>
        <?php           
    }
}?>
<?php
get_footer(); ?>

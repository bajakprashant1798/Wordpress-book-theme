<?php get_header(); ?>
<div class="container">    
    <div class="site-content clearfix"> <!-- site-content -->    
        <div class="main-column"> <!-- main-column -->
        <?php if(have_posts()) :
            while ( have_posts() ) : the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile; ?>        
                    <?php previous_posts_link() ?>
                    <?php 
                        next_posts_link('<img src="'.get_template_directory_uri().'/img/pagination-arrow.png" />' );
                    ?>            
            <?php else : 
                echo '<p>No content found</p>'; 
            endif;
            ?>
        </div><!-- /main-column -->

        <!-- secondry column -->
        <div class="secondary-column">
            <?php dynamic_sidebar('sidebar1'); ?>
        </div><!-- /secondry column -->
    </div> <!-- site-content -->
</div> <!-- container -->

<?php get_footer(); ?>

<?php get_header(); ?>
<!-- site-content -->
<div class="site-content clearfix">
<!-- main-column -->

    <div class="main-column">

        <?php

        if( have_posts() ){

            while( have_posts() )
            { the_post();
            
                    
        get_template_part('content', get_post_format());                        

        }
            }
        else{
            echo '<p>No content found</p>';
        }
        ?>
    </div><!-- /main-column -->

    <!-- secondry column -->

    <div class="secondary-column">
        <?php dynamic_sidebar('sidebar1'); ?>
    </div><!-- /secondry column -->

    </div>

<?php get_footer(); ?>
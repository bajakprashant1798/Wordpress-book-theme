<?php get_header(); ?>

    <?php

        if( have_posts() ){
            ?>

            <h2>Search results for: <?php the_search_query(); ?></h2>

            <?php

            while( have_posts() ){   
                the_post();    
                get_template_part('content'); 
            }
            
            echo paginate_links();
                }
        else{
            echo '<p>No content found</p>';
        }
    ?>
    
<?php get_footer(); ?>
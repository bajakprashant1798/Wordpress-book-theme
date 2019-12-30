<?php get_header(); ?>
<?php
/*
* Template Name: Archive
* Template Post Type: post, page, book
*/ 
?>
    <?php

        if( have_posts() ){
            ?>

            <h2><?php
                if ( is_category() ){
                    single_cat_title();
                } elseif ( is_tag() ) {
                    single_tag_title();
                } elseif ( is_author() ) {
                    the_post();
                    echo 'Author Archives: ' . get_the_authoe();
                    rewind_posts();
                } elseif ( is_day() ) {
                    echo 'Daily Archives: ' . get_the_date();
                } elseif ( is_month() ) {
                    echo 'Daily Archives:' . get_the_date('F Y');
                } elseif ( is_month() ) {
                    echo 'Yearly Archives:' . get_the_date('Y');
                }
            ?></h2>    

            <?php
            while( have_posts() )
            { the_post();
                 ?>

                <article class="post">
                    <div class="column-container clearfix">
                        <div class="title-column">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </div> <!-- /text-column -->
                                <p class="post-info"><?php the_time('D j, Y g:i a'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in

                                <?php 
                                    $categories = get_the_category(); 
                                    $separator = ", ";
                                    $output ='';

                                    if($categories){
                                        foreach($categories as $category) {
                                            $output .= '<a href = "'. get_category_link($category->term_id) .'">' . $category->cat_name . '</a>' . $separator;
                                        }
                                        echo trim($output, $separator);
                                    }
                                ?>
                                </p>
                                    <div class="text-column">
                                        <?php the_content(); ?>  
                                    </div> <!-- /text-column -->
                    </div> <!-- /column container -->
                     <?php //the_content(); ?>
                </article>
    <?php

        }

        echo paginate_links();
            }
        else{
            echo '<p>No content found</p>';
        }
    ?>




<?php get_footer(); ?>
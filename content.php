<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>              
                        
        
            <article class="post <?php if( has_post_thumbnail()) :?> has-thumbnail <?php endif; ?>">
                
                <div class="column-container clearfix">
                    
                <div class="post-thumbnail">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
                </div>

                
                <div class="text-column">
                        
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

                </div>
                <div class="text-column">
                        <p>
                            <?php echo get_the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>">READ MORE</a>
                        </p>  
                    </div> <!-- /text-column -->

                    
                     </div> <!-- /column container -->
                     <?php //the_content(); ?>
                <!-- </article> -->
            </article>
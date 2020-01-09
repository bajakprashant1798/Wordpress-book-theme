<?php get_header(); ?>
<div class="container">
    <div class="container-portfolio">
        <div class="row">
        <?php if(have_posts()) :
            while ( have_posts() ) : the_post(); ?>

                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <h2><?php the_title(); ?></h2>
                        <?php  the_post_thumbnail(); ?>
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php previous_posts_link() ?>
                <?php 
                    next_posts_link('<img src="'.get_template_directory_uri().'/img/pagination-arrow.png" />');
                ?>
                    <?php
            endwhile;
        endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>


<!DOCTYPE html>
<html lang="en">
<head <?php language_attributes(); ?>>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?></title>

    

    <?php wp_head(); ?>

</head>

<?php

    // if( is_front_page() ){
    //     $prashant_classes = array('prashant-class','my-class');
    // }
    // else{
    //     $prashant_classes = array('no-prashant-class');
    // }
?>

<body <?php body_class(); ?>>   
    
<div class="container">
    <!-- site header -->
    
    <header class="site-header">
        
        <!-- hd-search -->
        <div class="hd-search">
            <?php get_search_form(); ?>
        </div><!-- /hd-search -->
    
        <div class="head-title">
            <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"/></a>
        </div> 

        <nav class="site-nav"> 
            <?php 
            $args = array(
                'theme_location' => 'primary'
            );
            ?>
            <?php wp_nav_menu($args); ?>
        </nav> 
           
      
        <h5><?php bloginfo('description') ?></h5>
        <?php if (is_page('home')) {  ?>
        <?php }?>
        </div>
     
     
    </header>


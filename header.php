<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
    </head>

<body <?php body_class()?>>

        <div class="background header-background">
            
            <!-- site-header -->
            <header class="site-header">

                <!--<div class="hd-search">
                    <?php //get_search_form(); ?>
                </div> 

                <!-- create navigation menu in the header -->
                
                <?php 
                        $home = array(
                            'theme_location' => 'home',
                            'container_class' => 'home-menu clearfix'
                        );
                        $args = array(
                            'theme_location' => 'primary',
                            'container_class' => 'primary-menu clearfix',
                            'walker' => new CSS_Menu_Maker_Walker()
                        );
                    ?>
                    <?php wp_nav_menu( $home ); ?>
                    <?php wp_nav_menu( $args ); ?>
               
            </header> <!-- site-header -->
        </div>
        <!--<div class="body-viewport">-->
   
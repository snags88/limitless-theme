<?php
//Index.php is used to hold lay out information for the home page.

// Get header php file for the header of the html
get_header(); ?>
    
<div class="parallax">
    
    <!-- Group 1: Title page -->
    <div id="group1" class="parallax_group layer2">
        <div class="parallax_layer parallax_layer_base">
            <div class="transparent">
            </div>
            <div class="content">
                <h1><?php bloginfo('name'); ?></h1>
                <h3>/ˈlimitləs/ adjective <br>
                    <?php bloginfo('description'); ?></h3>
            </div>
        </div>
        <div class="parallax_layer parallax_layer_back">
        </div>
    </div>
    
    <!-- Group 2: Recent Blog Entries -->
    <div id="group2" class="parallax_group fixed-height layer1">
         <div class="parallax_layer parallax_layer_base">
            <div class="content">
                <div class="site-content">
                <!-- Insert recent 3 blogs here-->
                <h1> THE BLOG</h1>    
                    
                    <?php
                    $recentPosts = new WP_Query( array('posts_per_page'=>3,'cat'=>12)); 
                    if($recentPosts->have_posts()) :
                        while($recentPosts->have_posts()) : $recentPosts->the_post();
                            //output content ?>
                            <div class="three-columns">
                                <!-- Output image -->
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>"> 
                                        <?php the_post_thumbnail('large'); ?>
                                        <div class="fade-in-solid">
                                        <div class="image-transparent border-round"></div>
                                        <h2 class="centered-element hover-underline no-margin">
                                            Read More &raquo;
                                        </h2>
                                        </div>
                                    </a>
                                </div>
                                <!-- Output Title -->
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>"> 
                                        <?php the_title() ?>
                                    </a>
                                </h2>
                                <!-- Output Meta -->
                                <p class="post-info small-divider">
                                    <?php get_template_part('postMeta'); ?>
                                </p>
                                <!-- Output Preview -->
                                <p>
                                    <?php echo get_the_excerpt(); ?>
                                </p>
                            </div>
                    <?php
                        endwhile;
                    else :
                        echo '<p>No content found</p>';
                    endif; 
                    wp_reset_postdata(); ?>
                    
                </div>
            </div>
            <div class="parallax_background">
            </div>
        </div>
        
    </div>
    
    <!-- Group 3: Recent Quotes -->
    <div id="group3" class="parallax_group layer2">
        <div class="parallax_layer parallax_layer_base">
            <div class="transparent">
            </div>
            <div class="content">
               <h1 class="quote-content">
                        <?php //while loop for images in media
                        $argsQuote = array(
                            'post_type' => 'post',
                            'tax_query' => array(
                                array ('taxonomy' => 'post_format',
                                'field' => 'slug',
                                'terms' => array( 'post-format-quote' ),
                                ),
                            ),
                            'posts_per_page'=>1,
                        );

                        $lastQuote = new WP_Query($argsQuote); 
                        if($lastQuote->have_posts()) :
                            while($lastQuote->have_posts()) : $lastQuote->the_post();
                                //output content

                                echo the_content();
                            endwhile;
                        else :
                            echo '<p>No content found</p>';
                        endif; 
                        wp_reset_postdata(); 
                        ?>
                    </h1>
                
            </div>
        </div>
        <div class="parallax_layer parallax_layer_back">
        </div>
    </div>
 
    <!-- Group 4: Recent Images -->
    <div id="group4" class="parallax_group fixed-height layer1">
        <div class="parallax_layer parallax_layer_base">
            <div class="content">
                <div class="site-content">
                <h1> THE PROJECTS </h1>
                    <?php //while loop for images in media
                    $recentImgs = new WP_Query('cat=11','posts_per_page=6'); 
                    if($recentImgs->have_posts()) :
                        while($recentImgs->have_posts()) : $recentImgs->the_post();
                            //output content ?>
                            <div class="three-columns">
                                <!-- Output image -->
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>"> 
                                        <?php 
                                            if( has_post_thumbnail() ) {
                                                the_post_thumbnail('home-thumbnail');
                                            } else {
                                                $imgs = get_posts(
                                                    array(
                                                        'post_type' => 'attachment',
                                                        'post_mime_type' => 'image',
                                                        'post_parent' => get_the_ID(),
                                                        'posts_per_page' => 1, ) );
                                                if ( $imgs ) {
                                                    echo '<img class="gallery" src="' . wp_get_attachment_image_src( $imgs[0]->ID, 'home-thumbnail')[0].'" alt"" >';
                                                }
                                            }
                                        ?> 
                                            <div class="fade-in-solid">
                                                <div class="image-transparent border-round"></div>
                                                <h2 class="centered-element hover-underline no-margin">
                                                    View &raquo;
                                                </h2>
                                            </div>
                                        </a>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    else :
                        echo '<p>Nothing has been posted yet. Check back soon!</p>';
                    endif; 
                    wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="parallax_background">
            </div>
        </div>
    </div>
    
    <!-- Group 5: Transition Slide -->
    <div id="group5" class="parallax_group layer2">
        <div class="parallax_layer parallax_layer_base">
             <div class="transparent">
            </div>
        </div>
        <div class="parallax_layer parallax_layer_back">
        </div>
    </div>
    
    <!-- Group 6: About me -->
    <div id="group6" class="parallax_group fixed-height layer1">
        <div class="parallax_layer parallax_layer_base">
            <div class="content">
                <div class="site-content">
                    <h1> ABOUT ME</h1>
                    <?php get_template_part('aboutMeImage');
                          get_template_part('aboutMeContent'); ?>
                </div>
				<div class="footer-container">
					<?php
						// Get footer php file for the footer of the html
						get_footer();
					?>
				</div>
            </div>
            <div class="parallax_background">
            </div>
        </div>
    </div>
</div>        


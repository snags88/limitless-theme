<?php
    get_header(); ?>

<div class="parallax">
    <!-- Top Image Slide -->
    <div id="singleImg" class="parallax_group layer2">
        <div class="parallax_layer parallax_layer_base">
            <div class="transparent">
            </div>
            <div class="content">
                <?php get_template_part('postTitle'); ?>
                <div class="post-meta"><?php get_template_part('postMeta'); ?></div>
            </div>
        </div>
        <div class="parallax_layer parallax_layer_back">
            <?php if(have_posts()) :
                        while(have_posts()) : the_post();
                             /*if( has_post_thumbnail() ){
                                    the_post_thumbnail( 'full' );
                                }*/
                                if (has_post_thumbnail( $post->ID ) ):
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                                <div class="post-background-img" style="background-image: url('<?php echo $image[0]; ?>')"></div>
                                <?php endif;
                        endwhile;
                    else :
                        echo '<p class="no-content">Nothing has been posted yet. Check back soon!</p>';
                    endif; ?>
        </div>
    </div>
    <!-- Main Article Slide -->
    <div id="singleText" class="parallax_group fixed-height layer1">
        <div class="parallax_layer parallax_layer_base">
            <div class="content">
                <div class="site-content">
                    <div class="inner-container">
                    <?php //show the content
                        if(have_posts()) :
                            while(have_posts()) : the_post(); ?>
                            <div class="main-text">
                                <?php the_content(); ?>
                            </div>
                            <?php
                            endwhile;
                        else :
                            echo '<p class="no-content">Nothing has been posted yet. Check back soon!</p>';
                        endif; 
                    wp_reset_postdata(); ?>
			<?php comments_template(); ?>
                    </div>
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
<?php
get_header(); ?>
<div class="parallax">
    <div class="site-content">
        <div class="page">
        <h2> <?php echo get_the_title(); ?> </h2>
            <?php if (have_posts()):
                while(have_posts()): the_post(); ?>
                <div class="page-content">
                    <?php the_content(); ?>
            </div>
            <?php endwhile;
            else:
                echo '<p class="no-content">Nothing has been posted yet. Check back soon!</p>';
            endif; 
            wp_reset_postdata();?>
        </div>
    </div>
    <div class="footer-container">
        <?php
            get_footer();
        ?> 
    </div>
</div>



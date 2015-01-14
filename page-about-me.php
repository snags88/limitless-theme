<?php
get_header(); ?>
<div class="parallax">
    <div class="site-content">
        <div class="about-me">
    
        <?php get_template_part('aboutMeImage'); ?>
        <h2> About Me </h2>
        <?php get_template_part('aboutMeContent'); ?>
    
        </div>
    </div>
    <div class="footer-container">
        <?php
            get_footer();
        ?> 
    </div>
</div>
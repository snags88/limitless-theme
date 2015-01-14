<?php 
    get_header(); 
?>

<div class="parallax">

        <div class="site-content">
            <div class="archive">
 
                <h2>
                    <?php
                        if ( is_category() ) {
                            single_cat_title();
                        } elseif ( is_tag() ) {
                            echo single_tag_title();
                        } elseif ( is_author() ) {
                            the_post();
                            echo 'Author Achives: ' . get_the_author();
                            rewind_posts();
                        } elseif ( is_day() ) {
                            echo 'Daily Archive: ' . get_the_date();
                        } elseif ( is_month() ) {
                            echo 'Monthly Archives: ' . get_the_date('F Y');
                        } elseif ( is_year() ) {
                            echo 'Yearly Archives: ' . get_the_date('Y');
                        } else {
                            echo 'Archives';
                        }
                    ?>
                </h2>
           <?php
            //if there are posts, create loop to show posts on body
            $count=1;
            if(have_posts()) :
                while(have_posts()) : the_post(); 
                    if ($count==9){
                        $count=1;
                    }
                    get_template_part('content', get_post_format());
                    $count++;
                endwhile;
            else :
                echo '<p class="no-content">Nothing has been posted yet. Check back soon!</p>';
            endif;
        ?>
        </div>
        <p class="clearfix"></p>
    </div>        
    <div class="footer-container">
        <?php
            get_footer();
        ?> 
    </div>
</div>

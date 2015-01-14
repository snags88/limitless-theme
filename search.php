<?php

//Index.php is used to hold lay out information for the home page.



// Get header php file for the header of the html
get_header();


//if there are posts, create loop to show posts on body
if(have_posts()) : ?>
    
    <h2>Search results for: <?php the_search_query(); ?></h2>
    
    <?php
    while(have_posts()) : the_post(); 

    get_template_part('content', get_post_format());

    endwhile;

    else :
        echo '<p>No content found</p>';
    
endif;


// Get footer php file for the footer of the html
get_footer();

?>
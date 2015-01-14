<?php //while loop for about-me page
                        $aboutmePage = new WP_Query( 'pagename=about-me' );
                        if( $aboutmePage->have_posts()) :
                            while($aboutmePage->have_posts()) : $aboutmePage->the_post(); ?>
                            <div class="about-me-text">
                                <?php the_content(); ?>
                            </div>                            
                            <?php
                            endwhile;
                        else :
                            echo '<p class="no-content">Nothing has been posted yet. Check back soon!</p>';
                        endif; 
                    wp_reset_postdata(); ?>
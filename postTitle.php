                <?php
                    if(have_posts()) :
                        while(have_posts()) : the_post(); ?>
                            <h1><?php the_title(); ?></h1> 
                    <?php
                        endwhile;
                    else :
                        echo '<p class="no-content">Nothing has been posted yet. Check back soon!</p>';
                    endif; ?>
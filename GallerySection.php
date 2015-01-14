<h1> THE GALLERY </h1>
                    <?php //while loop for images in media
                    $recentImgs = new WP_Query('cat=6','posts_per_page=6'); 
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
                        echo '<p>No content found</p>';
                    endif; 
                    wp_reset_postdata(); ?>
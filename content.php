<article class="post inner-container <?php if( has_post_thumbnail() ) { ?>has-thumbnail<?php } ?>">
        <div class="post-thumbnail center">
            <a href="<?php the_permalink(); ?>">
                <?php 
                    if( has_post_thumbnail() ) {
                        the_post_thumbnail('banner-image');
                    } else {
                        $imgs = get_posts(
                            array(
                                'post_type' => 'attachment',
                                'post_mime_type' => 'image',
                                'post_parent' => get_the_ID(), 'posts_per_page' => 1, 
                            )
                        );
                        if ( $imgs ) {
                            echo '<img class="gallery" src="' . wp_get_attachment_image_src( $imgs[0]->ID, 'banner-image')[0].'" alt"" >';
                        }
                    }
                ?>
                <div class="fade-in-solid">
                    <div class="image-transparent border-round"></div>
                    <h2 class="centered-element hover-underline no-margin">
                        Read More &raquo;
                    </h2>
                </div>
            </a>
        </div>
        
        <h2 class="post-title center">
            <a href="<?php the_permalink(); ?>"> 
                <?php the_title(); ?>
            </a>
        </h2>
        <p class="post-info center">
            <?php get_template_part('postMeta'); ?>
        </p>

</article>
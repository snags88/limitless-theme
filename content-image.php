    <?php global $count;
        if ($count < 3) {
            $size = 'gallery-large';
        } else {
            $size = 'gallery-small';
        }
    ?>

<article class="image <?php echo $size; ?>">    
    <div class="image-thumbnail">
        <a href="<?php the_permalink(); ?>">
            <?php 
                if( has_post_thumbnail() ) {
                    the_post_thumbnail($size);
                } else {
                    $imgs = get_posts(
                        array(
                            'post_type' => 'attachment',
                            'post_mime_type' => 'image',
                            'post_parent' => get_the_ID(), 'posts_per_page' => 1, 
                        )
                    );
                    if ( $imgs ) {
                        echo '<img class="gallery" src="' . wp_get_attachment_image_src( $imgs[0]->ID, $size)[0].'" alt"" >';
                    }
                }
            ?>
        </a>
    </div>
    <a href="<?php the_permalink(); ?>"> 
        <div class="fade-in-solid">
            <div class="image-transparent"></div>
                <h2 class="centered-element hover-underline no-margin">
                    <?php the_title(); ?> 
                </h2>

        </div>
    </a>

</article>
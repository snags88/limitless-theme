        <div class="background footer-background">    
            <footer class="site-footer">
                <!-- create footer-widgets -->
                <div class="footer-widgets clearfix">
                    <div class="footer-widget-area">
                        <h4 class="footer-widget-title">Connect with me!</h4>
                        <div class="contact-links">
                            <a href="https://www.linkedin.com/in/snaganuma">
                               <i class="icon-linkedin-rect"></i>
                            </a>
                            <a href="https://twitter.com/S2K10">
                                <i class="icon-twitter-bird"></i>
                            </a>
                            <a href="http://instagram.com/snaganuma/">
                                <i class="icon-instagram"></i>
                            </a>
                            <a href="https://github.com/snags88">
                                <i class="icon-github"></i>
                            </a>
                            <a href="seijinaganuma.com/?feed=rss2">
                                <i class="icon-rss"></i>
                            </a>
                        </div>
                    </div>
                    
					<div class="footer-widget-area">
						<h4 class="footer-widget-title">Most Recent Posts</h4>
						<?php
                        $args = array(
                                        'posts_per_page'      => 3,
                                        'cat'                 => 12
                                     );
						$recentPosts = new WP_Query($args); 
						if($recentPosts->have_posts()) :
							?> <ul> <?php
								while($recentPosts->have_posts()) : $recentPosts->the_post();
									?> <li> 
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
										</li>
											<?php
										endwhile;
									?> </ul> <?php
								else :
									echo '<p>No content found</p>';
								endif; 
								wp_reset_postdata(); ?>
					</div>

                    <?php if (is_active_sidebar('footercenterright')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footercenterright'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footerright')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footerright'); ?>
                        </div>
                    <?php endif; ?>
                </div>


                <!-- create navigation menu in the footer -->
                <nav class="site-nav">
                    <?php 
                        $args = array(
                    'theme_location' => 'footer');
                    ?>

                    <?php wp_nav_menu( $args ); ?>
                </nav>

                <div class="footer-info clearfix">
                    <p>Site designed and developed by Seiji Naganuma &copy; <?php echo date('Y'); ?>   </p>
                    <p> Powered by <a href="http://www.Wordpress.org">Wordpress</a>.</p>

                </div>

            </footer>
            
        </div> <!-- background -->
    
        <?php wp_footer(); ?>
    <!--</div>--> <!-- body-viewport -->
    </body>
</html>
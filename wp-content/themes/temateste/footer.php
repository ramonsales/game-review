                </div>
            </main>
            <div class="rodape row mb-2">
            <?php if ( is_active_sidebar( 'footer_sidebar_1' ) ) : ?>
                <div id="primary-sidebar" class="col-md-4 primary-sidebar widget-area" role="complementary">
                    <?php dynamic_sidebar( 'footer_sidebar_1' ); ?>
                </div>
            <?php endif; ?>
            <?php if ( is_active_sidebar( 'footer_sidebar_2' ) ) : ?>
                <div id="primary-sidebar" class="col-md-4 primary-sidebar widget-area" role="complementary">
                    <?php dynamic_sidebar( 'footer_sidebar_2' ); ?>
                </div>
            <?php endif; ?>
            <?php if ( is_active_sidebar( 'footer_sidebar_3' ) ) : ?>
                <div id="primary-sidebar" class="col-md-4 primary-sidebar widget-area" role="complementary">

                    <?php 
                        dynamic_sidebar( 'footer_sidebar_3' );
                        // echo do_shortcode('[contact-form-7 id="65"]');

                    ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>

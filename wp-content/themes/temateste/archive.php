<?php get_header(); ?>
<?php the_post(); ?>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <header class="archive-header">
                        <?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
                        ?>
                        </header>
                        <?php 
                        $cat = get_queried_object();
                        $wpb_all_query = new WP_Query( array(
                            'post_type' => 'post', 
                            'post_status' => 'publish', 
                            'cat' => $cat->cat_ID,
                            'posts_per_page'=> 10
                        ) );
                        // Check if there are any posts to display
                        if ( $wpb_all_query->have_posts() ) : 
                            // The Loop
                            while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                                <h2>
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
                                
                                <div class="entry">
                                    <?php the_content(); ?>
                                
                                    <p class="postmetadata">
                                        <?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed'); ?>
                                    </p>
                                </div>
                            
                            <?php endwhile; 
                        
                        else: ?>
                        <p>Sorry, no posts matched your criteria.</p>
                        
                        <?php endif; ?>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>
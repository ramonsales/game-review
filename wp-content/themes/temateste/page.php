<?php get_header(); ?>
<?php the_post(); ?>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div>
                            <img src="http://via.placeholder.com/250" alt="image da notícia" class="page-img">
                            <div>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_content(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>

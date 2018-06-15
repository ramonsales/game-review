<?php get_header(); ?>
<div class="col-md-10">
    <div class="row">

        <?php
        // the query
        $args = array('category_name' => 'destaque');
        $destaques = new WP_Query($args); ?>
        <?php if ($destaques->have_posts()) : ?>
            <div id="carouselDestaque" class="carouselHome carousel slide col-md-12 mb-3" data-ride="carousel">
                <div class="dark carousel-inner">
                    <?php $i = 0; ?>
                    <?php while ($destaques->have_posts()) : $destaques->the_post(); ?>
                        <div class="carousel-item <?php if ($i == 0) {
                            echo 'active';
                        } ?> ">
                            <a href="<?php the_permalink(); ?>">
                                <div class="dark-gradient">
                                </div>
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('banner', ['class' => 'carousel-img d-block w-100', 'title' => 'Feature image', 'alt' => 'imagem da notícia']);
                                } else { ?>
                                    <img class="d-block w-100" src="http://via.placeholder.com/250"
                                         alt="image da notícia">
                                    <?php
                                }
                                ?>
                            </a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php the_title(); ?></h5>
                            </div>
                        </div>
                        <?php
                        $i++;
                    endwhile;
                    ?>
                </div>
                <ol class="carousel-indicators">
                    <?php
                    for ($h = 0; $h < $i; $h++) {
                        ?>
                        <li data-target="#carouselDestaque" data-slide-to="<?php echo $h; ?>"
                            class="<?php if ($h == 0) {
                                echo 'active';
                            } ?>"></li>
                        <?php
                    }
                    ?>
                </ol>
                <a class="carousel-control-prev" href="#carouselDestaque" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselDestaque" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-4 mt-3">
                    <a href="<?php the_permalink(); ?>" class="review">
                        <div class="card">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('custom-thumb', ['class' => 'card-img img-responsive responsive--full', 'title' => 'Feature image', 'alt' => 'imagem da notícia']);
                                } else { ?>
                                    <img src="http://via.placeholder.com/250" alt="image da notícia" class="card-img">
                                    <?php
                                }
                                ?>
                                <div class="card-body">
                                    <!-- <a href="#"><?php the_category(); ?></a> -->
                                    <h5 class="card-title text-light"><?php the_title(); ?></h5>
                                    <span class="card-text card-content"><?php the_content(); ?></span>
                                </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>

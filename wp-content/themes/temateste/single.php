<?php get_header();
    the_post(); ?>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12 mb-4 text-center">
                <h3><?php the_title(); ?></h3>
            </div>
            <div class="col-md-12">
                <div class="text-center mb-4">
                    <img src="http://via.placeholder.com/250" alt="imagem da notícia">
                </div>
                <p><?php the_content(); ?></p>
                <div class="game-score">
                    <h4>Nota do jogo</h4>
                    <span>
                        <?php
                            $notaJogo = get_post_meta( get_the_ID(), 'meta_game_score', true );
                            echo $notaJogo;
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>

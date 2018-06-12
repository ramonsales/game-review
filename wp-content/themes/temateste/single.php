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
                
                <!-- Game Score -->
                <div class="game-score">
                    <h5>Nota do jogo</h5>
                    <span>
                        <?php
                            $notaJogo = get_post_meta( get_the_ID(), 'meta_game_score', true );
                            for($i = 0; $i < $notaJogo; $i++) {
                                echo '<i class="fa fa-star checked"></i>';
                            }
                            for($i = 0; $i < 5 - $notaJogo; $i++) {
                                echo '<i class="fa fa-star"></i>';
                            }
                            echo "<p>";
                            if($notaJogo == 0) {
                                echo "Sem avaliação";
                            } else {
                                echo $notaJogo . " estrela" . ($notaJogo > 1 ? "s" : "");
                            }
                            echo "</p>";
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>

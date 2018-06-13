<!DOCTYPE html>
<html>
<head>
    <title><?php echo bloginfo("name"); ?> - <?php echo bloginfo("description"); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>
</head>
<body>
    <div class="content container">
        <header>
            <div class="row">
                <div class="header col-md-12">
                    <h1 class="text-center game_review_title"><a class="game_review_link" href="<?php echo home_url(); ?>">
                        <i class="fas fa-gamepad"></i>
                        <?php echo bloginfo("name"); ?>
                    </a></h1>
                
                    
                        <?php
                            if(is_user_logged_in()) {
                                $user = wp_get_current_user();
                                echo "<span class=\" authentication\"><i class=\"far fa-user\"></i>&nbsp;&nbsp;Olá, " . $user->user_firstname . "!";
                                echo "<a class=\"logout\" href=" . wp_logout_url( home_url() ) . ">Sair</a>";
                                echo "</span>";
                            } else {
                                echo "<span class=\"authentication\"><i class=\"far fa-user\"></i>&nbsp;&nbsp;Faça login <a class=\"login\" href='" . home_url('/wp-login.php') . "'>aqui</a></span>";
                            }
                        ?>
                    
                </div>
                <div class="col-md-12">
                    <?php
                        $args = array('menu' => 'menu', 'menu_class' => 'navbar-nav mr-auto', 'container_class' => 'main-navbar navbar navbar-expand-lg navbar-dark',
                            'container' => 'nav');
                        wp_nav_menu($args);
                    ?>
                </div>
            </div>
        </header>

        <main class="my-4">
        <div class="row">
            <div class="col-md-2">
                <?php get_sidebar(); ?>
            </div>

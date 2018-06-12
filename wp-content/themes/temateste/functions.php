<?php
    // Habilitar imagem de destaque
    add_theme_support( 'post-thumbnails' );

    // Registrar menu de navegação
    register_nav_menus( array(
        'menu' => 'Menu principal',
    ) );

    // Bruxaria da classe do link
    add_filter( 'nav_menu_link_attributes', function($atts) {
        $atts['class'] = "nav-link";
        return $atts;
    }, 100, 1 );

    add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
    function themeslug_enqueue_style() {
        wp_enqueue_style( 'Lato-font', 'https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700',false,false,'all');
        wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css',false,'5.0.13','all');
        wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css',false,'4.1.1','all');
        wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css',false,'1.0','all');
    }

    add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );
    function themeslug_enqueue_script() {
        wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array('popper'), false, true );
    }

    //create a new image size
    add_image_size( 'custom-thumb', 300, 300, array('left', 'bottom') );
    add_image_size( 'banner', 800, 300, array('left', 'top') );

    //enable widgets
    function arphabet_widgets_init() {
        register_sidebar( array(
            'name'          => 'Home left sidebar',
            'id'            => 'home_left_1',
            'before_widget' => '<div class="widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="rounded">',
            'after_title'   => '</h2>',
        ) );
    }
    add_action( 'widgets_init', 'arphabet_widgets_init' );

    //Game score MetaBOX

    add_action( 'add_meta_boxes', 'scoreBox' );

    function scoreBox() {
        add_meta_box(
            'game-score',
            'Nota do Game',
            'scoreBoxRender',
            'post',
            'side',
            'high'
        );
    }

    function scoreBoxRender( $post ) {
        $value = get_post_meta( $post->ID, 'meta_game_score', true );
        echo '<label for="game_score">Nota do jogo</label>';
        echo '<input type="number" id="game_score" min="0" max="5" name="game_score" value="'.esc_attr($value).'" size="25" />';
    }

    add_action( 'save_post', 'saveGameScore' );

    function saveGameScore( $post_id ) {
        if ( 'post' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) )
                return;
        }
        $post_ID = $_POST['post_ID'];
        $mydata = sanitize_text_field( $_POST['game_score'] );
        update_post_meta($post_ID, 'meta_game_score', $mydata);
    }
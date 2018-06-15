<section id="comments" class="comments-area">

	<?php
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php echo __('Comments in', 'pp-wp') . ' <span>"' . get_the_title() . '"</span>'; ?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'         => 'ul',
					'avatar_size'   => 64,
					'short_ping'    => true,
					'reply_text'    => '<i class="fa fa-reply" aria-hidden="true"></i> Responder',
				) );
			?>
		</ul>

		<?php the_comments_navigation();
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'pp-wp' ); ?></p>
		<?php
		endif;
    endif;

    $fields =  array(

        'author' =>
          '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) .
          ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
          '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
          '" size="30"' . $aria_req . ' /></p>',
      
        'email' =>
          '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) .
          ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
          '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
          '" size="30"' . $aria_req . ' /></p>'
    );

    $args = array(
        'fields' => $fields
        
    );
	comment_form($args);
	?>

</section>
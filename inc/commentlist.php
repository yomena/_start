<?php
/* More infos: http://codex.wordpress.org/Function_Reference/wp_list_comments */

function about_blank_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);

  if ( 'div' == $args['style'] ) {
    $tag = 'div';
    $add_below = 'comment';
  } else {
    $tag = 'div';
    $add_below = 'div-comment';
  }
?>
  <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
  <?php if ( 'div' != $args['style'] ) : ?>
  <div id="div-comment-<?php comment_ID() ?>" class="comment-body media">
  <?php endif; ?>
  <div class="comment-avatar vcard media-left">
  <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
</div><!--.comment-avatar-->

<div class="media-body">
  <?php if ( $comment->comment_approved == '0' ) : ?>
    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
    <br />
  <?php endif; ?>

<div class="media-heading">
  <?php printf( __( '<cite class="fn comment-author">%s</cite>' ), get_comment_author_link() ); ?>
  <span class="comment-meta commentmetadata small">
    <?php
      /* translators: 1: date, 2: time */
      printf( __('%1$s @ %2$s'), get_comment_date(),  get_comment_time() ); ?> <?php edit_comment_link( __( '<i class="fa fa-edit"></i> Edit' ), '  ', '' );
    ?>
  </span>
</div><!--.media-heading-->

  <?php comment_text(); ?>

  <div class="reply small">
  <i class="fa fa-reply"></i> <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
</div><!--.reply-->
<br>
</div><!--.media-body-->
  <?php if ( 'div' != $args['style'] ) : ?>
  </div><!--.media-->
  <?php endif; ?>
<?php
}
        ?>

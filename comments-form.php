<?php 
$args = array(
  'id_form'           => 'contact-chris-form',
  'id_submit'         => 'submit',
  'title_reply'       => __( 'Contact Chris' ),
  'title_reply_to'    => __( 'Leave a Reply to %s' ),
  'cancel_reply_link' => __( 'Cancel' ),
  'label_submit'      => __( 'Send Message' ),

  'comment_field' =>  '<div class="form-group"><textarea class="form-control" id="comment" name="comment" cols="45" rows="5" aria-required="true">' .
    '</textarea></div>',

  'comment_notes_before' => '',

  'comment_notes_after' => '',

  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<p class="comment-form-author">' .
      '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
      ( $req ? '<span class="required">*</span>' : '' ) .
      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' /></p>',

    'email' =>
      '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
      ( $req ? '<span class="required">*</span>' : '' ) .
      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /></p>',

    'url' =>
      '<p class="comment-form-url"><label for="url">' .
      __( 'Website', 'domainreference' ) . '</label>' .
      '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" /></p>'
    )
  ),
);

?>

<h4 class="featurette-heading"><span class="lead">Contact Chris</span></h4>
<div class="lead row">
<div class="col-md-12"><?php echo do_shortcode("[cscf-contact-form]"); ?></div></div>
<?php //comment_form($args); ?>
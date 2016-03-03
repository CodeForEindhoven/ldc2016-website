<?php
/**
 * Theme: ldc2016
 *
 * The template used for displaying single post footer meta (categories, tags, etc.)
 *
 * @package flat-bootstrap
 */
?>

<?php if ( ! is_search() ) : ?>
    <?php $the_date = get_the_date(); ?>
    <span class="posted-on"><span class="glyphicon glyphicon-calendar"></span>&nbsp;
    <?php echo $the_date; ?>
    </span>
    <?php edit_post_link( __( '<span class="glyphicon glyphicon-edit"></span> Edit', 'flat-bootstrap' ), '<span class="edit-link">', '</span>' ); ?>
<?php endif; ?>

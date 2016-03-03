<?php
/**
 * Theme: ldc2016
 *
 * The template used for displaying single post header meta (posted on, by, etc.)
 *
 * @package flat-bootstrap
 */
?>
<?php if ( !is_single() AND !is_page() ) : ?>
<h3><?php the_title(); ?></h3>
<?php endif; ?>

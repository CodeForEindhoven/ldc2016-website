<?php
/**
 * Theme: ldc2016
 *
 * The template for displaying search forms in xtremelysocial
 *
 * @package flat-bootstrap
 */
?>
<form role="search" method="get" class="navbar-form navbar-right" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<div class="form-group">
  <input type="text" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'flat-bootstrap' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	<button type="submit" class="search-submit btn btn-primary" value="<?php echo esc_attr_x( 'Search', 'submit button', 'flat-bootstrap' ); ?>">
    <?php echo esc_attr_x( 'Search', 'submit button', 'flat-bootstrap' ); ?>
  </button>
</div><!-- .form-group -->
</form>

<?php
/**
 * Theme: ldc2016
 *
 * The default template used for displaying page and article content. Note that certain
 * pages, index, articles may use a different template.
 *
 * @package flat-bootstrap
 */
?>
<!-- content.php -->
<div class="col-md-4">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if (has_post_thumbnail( $post->ID ) ): ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <?php endif; ?>
  <div class="panel panel-default">
    <?php if ( in_array( get_post_type(), array ( 'post', 'jetpack-testimonial', 'jetpack-portfolio' ) ) ) :
      //and then use
    ?>
    <div class="panel-heading panel-heading-fixed200" style="background-image: url('<?php echo $image[0]; ?>')">
      <?php if ( ! function_exists( 'xsbf_categorized_blog' ) OR xsbf_categorized_blog() ) : ?>
        <?php $cats = wp_get_post_categories( $post->ID );
              $categories = array();
              $faicons = array(
                'asset'=>'fa-cogs',
                'challenge'=>'fa-lightbulb-o'
              );
              foreach($cats as $c){
                $cat = get_category( $c );
                $icon = $faicons[$cat->name];
                if(!isset($icon)){
                  $icon = 'fa-question';
                }
                $categories[] = $icon;
              }
        if ( $categories) :
          $curauth = get_userdata($post->post_author);

          if(strlen($curauth->user_url) > 0) :
            echo '<a href="' . $curauth->user_url . '" alt="Link to website for provider">';
            echo userphoto_the_author_thumbnail('', '', array(
              'class' => 'img-circle',
              'alt' => 'Provided by ' . get_the_author(),
              'title' => 'Provided by ' . get_the_author()
            ));
            echo '</a>';
          else :
            echo userphoto_the_author_thumbnail('', '', array(
              'class' => 'img-circle',
              'alt' => 'Provided by ' . get_the_author(),
              'title' => 'Provided by ' . get_the_author()
            ));
          endif;
          ?>
          <!-- <span class="fa fa-4x fa-inverse <?php echo implode($categories); ?>"></span> -->
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    <div class="panel-body">
      <?php get_template_part( 'content', 'post-header' ); ?>
      <?php if ( !is_single() ) : ?>
        <div class="card-fixed">
          <?php the_content(); ?>
        </div>
        <?php if(has_tag( $tag, $post )): ?>
          <div class="card-fixed">
            <h4>Properties</h4>
            <?php
              the_tags( '<span class="tags-links"><ul><li>', '</li><li>', '</li></ul></span>' );
            ?>
          </div>
        <?php endif; ?>
    </div><!-- .entry-summary -->
      <?php if ( 'post' == get_post_type() ) : ?>
        <div class="panel-footer">
      <?php get_template_part( 'content', 'post-footer' ); ?>
    </div>
      <?php endif; ?>
  <?php // For single posts and pages, display the full content ?>
<?php else : ?>
  <div class="panel-body">
    <?php
      the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'flat-bootstrap' ) );
      if(has_tag( $tag, $post )):
        the_tags( '<span class="tags-links">', ', ', '</span>' );
      endif;
    ?>
  </div>
  <div class="panel-footer">
    <?php
      if ( 'post' == get_post_type() ) :
        get_template_part( 'content', 'post-footer' );
      endif;
      get_template_part( 'content', 'page-nav' );
    ?>
  </div>
<?php endif; ?>
</div>
</article><!-- #post-## -->
</div>

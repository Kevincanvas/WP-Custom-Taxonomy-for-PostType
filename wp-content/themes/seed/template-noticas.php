<?php if (!defined('ABSPATH')) die('No direct access allowed');

/*

Template Name: Template Noticias

*/

?>

<?php get_header() ?>

        	      <h1><?php the_title(); ?></h1>



<!--categorias resp-->
<?php
$taxonomy = 'categoria-noticia';
$terms = get_terms($taxonomy); // Get all terms of a taxonomy
$lista = "";

if ( $terms && !is_wp_error( $terms ) ) :
?>

     <div class="aMenu-categorias-resp -naranja aDn aMt-50 aDb-767">
     
       <?php foreach ( $terms as $term ) { 
          $lista .= "<div class='aB-cat-resp aShadow aBg-blanco' id='".$term->slug."'><a href='".get_term_link($term->slug, $taxonomy)."' >".$term->name."</a></div>" ;
       } ?>
       <?php echo $lista; ?>
     </div>

<?php endif;?>
<!---->

<?php
$taxonomy = 'categoria-noticia';
$terms = get_terms($taxonomy); // Get all terms of a taxonomy
$lista = "<li class='active'><a href='".get_site_url()."/comunicacion/noticias/'>Todos</a></li>";

if ( $terms && !is_wp_error( $terms ) ) :
?>
    <ul class="aTabs aMenu-tabs-interna -naranja aListClean aBdib aBdib-t aTa-c aMt-60 aMb-30 aDn-767">
      
        <?php foreach ( $terms as $term ) :
           $lista .= "<li><a href='".get_term_link($term->slug, $taxonomy)."'>".$term->name."</a></li>" ;
        endforeach; ?>
        <?php echo $lista; ?>
    </ul>
<?php endif;?>

<?php

$taxonomy = 'categoria-noticia';
$terms = get_terms($taxonomy); // Get all terms of a taxonomy
$active_class_flag = true;

$posts_array = new WP_Query(
    array(
        'posts_per_page' => -1,
        'post_type' => 'noticia',
        'posts_per_page' => 6,
        'paged' => $paged
    )
);

?>

<?php if ( $posts_array->have_posts() ) : while ( $posts_array->have_posts() ) : $posts_array->the_post(); ?>

		<span><?php echo get_the_date( 'j' ); ?></span>
		<span><?php echo get_the_date( 'M' ); ?></span>
		<h1><?php the_title(); ?></h1>
		<p><?php the_content(); ?></p>
		<a href="<?php echo get_permalink(); ?>">Leer más</a>

    <?php endwhile; ?>
          
	<div class="pagination">
	    <?php 
	        echo paginate_links( array(
	            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
	            'total'        => $posts_array->max_num_pages,
	            'current'      => max( 1, get_query_var( 'paged' ) ),
	            'format'       => '/%#%',
	            'show_all'     => false,
	            'type'         => 'plain',
	            'end_size'     => 2,
	            'mid_size'     => 1,
	            'prev_next'    => true,
	            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Anterior', 'text-domain' ) ),
	            'next_text'    => sprintf( '%1$s <i></i>', __( 'Siguiente', 'text-domain' ) ),
	            'add_args'     => false,
	            'add_fragment' => '',
	        ) );
	    ?>
	</div>

<?php wp_reset_postdata(); endif; ?>

<?php get_footer() ?>

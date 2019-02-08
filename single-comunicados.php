<?php
/*
Template Name: Comunicados
Template Post Type: comunicados
*/
?>
<?php get_header(); ?>
            <?php
            $taxonomy = 'categoria-comunicados';
            $terms = get_terms($taxonomy); // Get all terms of a taxonomy
            $lista = "";
            $countAll = 0;
            if ( $terms && !is_wp_error( $terms ) ) :
            ?>
                <ul>
                	
                    <?php foreach ( $terms as $term ) { 
                    	 $lista .= "<li><a href='".get_term_link($term->slug, $taxonomy)."'>".$term->name." (".$term->count.")</a></li>" ;
                    	 $cont = intval($term->count);
                    	 $countAll += $cont;
                    } ?>
                    <li><a href="<?php echo get_site_url(); ?>/principal/comunicados-oefa/">Todos (<?php echo $countAll; ?>)</a></li>
                    <?php echo $lista; ?>
                </ul>
            <?php endif;?>
        </div>
        <div class="main-container single-news">

            <p class="breadcumbs"><a class="breadcumbsLink" href="<?php echo get_home_url(); ?>">Inicio</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a class="breadcumbsLink" href="<?php echo get_home_url(); ?>/principal/comunicados-oefa/">Comunicados</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  <a class="breadcumbsLink" href="#"><?php the_title(); ?></a></p>

            <h1><?php the_title(); ?></h1>

            <?php
            global $post;
            $postID = $post->ID; //get/put your post ID here
            $getProductCat = get_the_terms( $postID, 'categoria-comunicados' ); //as it's returning an array
            ?>

            <p class="autor">Publicado en <a href="<?php foreach ( $getProductCat as $productInfo ) { echo get_term_link($productInfo->slug,$taxonomy); } ?>"><span class="categ"><?php foreach ( $getProductCat as $productInfo ) { echo $productInfo->name; } ?></span></a></p>
            <p class="date-news"><?php the_field('fecha'); ?></p>
            <?php the_field('editor'); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
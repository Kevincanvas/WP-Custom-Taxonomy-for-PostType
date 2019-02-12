<?php get_header() ?>

<div class="container">

    <div class="row">
        <div class="col-lg-4">
            <h1><?php _e( 'Categoria: ', 'categoria' ); single_cat_title(); ?></h1>
            <p><?php echo category_description(); ?></p>
        </div>
    </div>

    <!--categorias resp-->
    <div class="row mb-5">
        <div class="col-lg-4">
            <?php

                $taxonomy = 'categoria-noticia';
                $terms = get_terms($taxonomy); // Get all terms of a taxonomy
                $lista = "";
             
                if ( $terms && !is_wp_error( $terms ) ) :
                $lista = "<ul class='list-group'>";
                    foreach ( $terms as $term ) :
                        $lista .=   "<li id='".$term->slug."' class='list-group-item'>
                                        <a class='h4' href='".get_term_link($term->slug, $taxonomy)."' >".$term->name."</a>
                                    </li>" ;
                    endforeach; 
                    echo $lista;
                $lista = "</ul>";
                endif;

            ?>
        </div>
    </div>
    <!---->


    

        <?php if ( have_posts() ) : ?>

            <div class="row row-eq-height">

            <?php while ( have_posts() ) : the_post(); ?>

                <div class="col-lg-4 mb-4">

                    <div class="shadow h-100">

                    <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                        <?php //the_post_thumbnail(); ?>
                        <img class="img-fluid w-100" src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'medium' ) ?>" alt="">
                    <?php endif; ?>

                        <div class="text-detail p-3">
                            <div class="row">

                                <div class="col-lg-12">
                                    <span class="h6 font-weight-bold text-capitalize"><?php echo get_the_date( 'l' ); ?></span>
                                    <span class="h6 font-weight-bold"><?php echo get_the_date( 'j' ); ?></span>
                                    <span class="h6 font-weight-bold"><?php echo get_the_date( 'M' ); ?></span>
                                    <span class="h6 font-weight-bold">del </span>
                                    <span class="h6 font-weight-bold"><?php echo get_the_date( 'Y' ); ?></span>
                                </div>

                                <div class="col-lg-12 pb-4">
                                    <h5 class="crop-text-2"><?php the_title(); ?></h5>
                                    <p><?php /*excerpt();*/ ?></p>
                                </div>

                                <div class="link-read-more">
                                    <a class="float-right h5 m-0" href="<?php echo get_permalink(); ?>">Leer más</a>
                                </div>

                            </div>
                        </div>

                    </div>
                
                </div>                

            <?php endwhile; ?>

            </div>

            <div class="pagination">
                <?php 
                    global $wp_query; 
                    $total_pages = $wp_query->max_num_pages; 
                    if ($total_pages > 1) :
                        $current_page = max(1, get_query_var('paged')); 
                        echo paginate_links(array( 
                        'base' => get_pagenum_link(1) . '%_%', 
                        'format' => '/page/%#%', 
                        'current' => $current_page, 
                        'total' => $total_pages,
                        )); 
                    endif;
                ?>
            </div>

        <?php endif;/* wp_reset_postdata(); */?>

    

</div>
    

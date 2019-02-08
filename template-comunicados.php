<?php /* Template Name: Comunicados */ get_header(); ?>
<section class="header-section">
    <div class="header-inner">
        <img src="<?php echo get_template_directory_uri(); ?>/img/bracket.png" class="" alt="">
        <h1>Comunicados</h1>
        <img src="<?php echo get_template_directory_uri(); ?>/img/bracket.png" class="reverse" alt="">
    </div>
</section>
<div class="white-line"></div>
<section>
    <div class="inner-continer-page">
        <div class="container-aside">
            
            <h3>Categoria</h3>
                
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
                <h3>Filtrar</h3>
                <input type="date" class="unstyled-datepicker search" id="datepicker-boletin">
                <p class="show-all-boletines">Mostrar todos</p>
        </div>
        <div class="main-container" id="noticias_list">
                <p class="breadcumbs"><a class="breadcumbsLink" href="<?php echo get_home_url(); ?>">Inicio</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a class="breadcumbsLink" href="#"><?php the_title(); ?></a></p>
                <?php 
                $args = array(
                    'post_type' => 'comunicados',
                    'order' => 'desc',
                    'posts_per_page'=>-1, 
                    'numberposts'=>-1
                );
                $hp_sections = get_posts( $args );
                ?>
                <div class="list">
                <?php 
                foreach ( $hp_sections as $post ) : setup_postdata( $post ); ?>
                <?php
                global $post;
                $postID = $post->ID; //get/put your post ID here
                $getProductCat = get_the_terms( $postID, 'categoria-comunicados' ); //as it's returning an array
                ?>
                <div class="news-card aTable-m">
                   <div class="aA-300"><img src="<?php the_field('foto_miniatura',$post->ID); ?>" alt=""></div>
                   <div class="detail-card aPl-30">
                       <h1 class=title-news><?php the_title(); ?></h1>
                       <p class="autor">Publicado en <a href="<?php foreach ( $getProductCat as $productInfo ) { echo get_term_link($productInfo->slug,$taxonomy); } ?>"><span class="categ"><?php foreach ( $getProductCat as $productInfo ) { echo $productInfo->name; } ?></span></a></p>
                       <p class="date-news"><?php echo get_the_date(); ?></p>
                       <p class="name hidden"><?php echo get_the_date('o-m-d'); ?></p>
                       <p class="desc-news"><?php the_field('resumen',$post->ID); ?></p>
                       <a href="<?php echo get_permalink($post->ID); ?>">Continua leyendo<span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                   </div>
                </div>
                <?php
                endforeach; wp_reset_postdata();
                ?>
                </div>
                 <ul class="pagination"></ul>
            
        </div>

    </div>
</section>
<?php get_footer(); ?>
<script>
    var monkeyList = new List('noticias_list', {
      valueNames: ['name'],
      page: 6,
      pagination: true
    });
</script>
<script>
    $('#datepicker-boletin').change(function() {
        var date_search = $(this).val(); 
           console.log(date_search);       
           monkeyList.search(date_search);
       });

    $('.show-all-boletines').click(function(){
            monkeyList.search("");
            $('#datepicker-boletin').val("");
    });    
</script>
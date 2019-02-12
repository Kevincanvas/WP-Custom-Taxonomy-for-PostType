<?php
/*
Template Post Type: noticia
*/
?>
<?php get_header(); ?>

<div class="container">

	<!--categorias resp-->
	<div class="row my-3">
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

	<div class="row">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<div class="col-lg-12 mt-3 mb-3">
		    <span class="h6 font-weight-bold text-capitalize"><?php echo get_the_date( 'l' ); ?></span>
		    <span class="h6 font-weight-bold"><?php echo get_the_date( 'j' ); ?></span>
		    <span class="h6 font-weight-bold"><?php echo get_the_date( 'M' ); ?></span>
		    <span class="h6 font-weight-bold">del </span>
		    <span class="h6 font-weight-bold"><?php echo get_the_date( 'Y' ); ?></span>
		</div>
		
		<div class="col-lg-12 mb-2">
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
			    <?php //the_post_thumbnail(); ?>
			    <img class="img-fluid w-100" src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'custom-size' ) ?>" alt="">
			<?php endif; ?>
		</div>

		<div class="col-lg-12">
			<h1><?php the_title(); ?></h1>
		</div>

		<div class="col-lg-12">
			<?php the_content(); // Dynamic Content ?>
		</div>

	<?php endwhile; ?>
	<?php endif; ?>

	</div>

</div>
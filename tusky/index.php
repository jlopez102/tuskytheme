<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tusky
 */

get_header();
?>

	<main id="primary" class="container" >
		
		
		
	<div class="post-wrap hero">
			<div class="T">
				<h1>T<span class="fish"></span></h1>
			</div>
			<div class="U">
				<h1>U<span class="fish"></span></h1>
			</div>	
			<div class="third">
				<h1>S<span class="fish"></span></h1>
			</div>	
			<div class="K">
				<h1>K<span class="fish"></span></h1>
			</div>				
		</div>

	<?php  
    $wpbp = new WP_Query(array(  
            'post_type' =>  'gallery',  
            'posts_per_page'  =>'6' ,
        )  
    );  
?> 	






<h2 class="fade-in">Featured</h2>
  <?php if ($wpbp->have_posts()) :  while ($wpbp->have_posts()) : $wpbp->the_post(); ?>  

	 <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :  ?>  
	<ul class="gallery-item group">
	<li class="fade-in">
	
	
	<div class="gallery-thumb">
		<a href="<?php the_permalink(); ?>"><figure>
     <?php  the_post_thumbnail('gallery-thumb'); ?> 
		</figure></a>
    </div>
	
	
	<div class="gallery-description" >
	<ul class="discipline">
	<li class="recent-header"><h3><?php echo substr( get_the_title(), 0, 40 ); ?></h3></li>
	<?php  $terms = get_the_terms( $post->ID , 'discipline' );
		   foreach ( $terms as $term ) {
			/*echo $term->name;*/
			echo '<li class="category">' . $term->name . '</li>';
			}
			?>
	</ul>

	</div>
	
	</li>
	</ul>
            <?php endif; ?>   
    <?php endwhile; endif; ?>  
    <?php wp_reset_query(); ?> 
    <?php rewind_posts(); ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

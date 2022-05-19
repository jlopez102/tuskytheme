<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tusky
 */

get_header();
?>

	<main id="primary" class="container" >

		<h2 class="ml16"> 

<?php
  $term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
echo $term->name;
    ?>
</h2>

<div class="archive-wrap">



  <?php while (have_posts()) : the_post(); ?>
	   <div class="archive-post fade-in" id="post-<?php the_ID(); ?>">
		<?php  
if ( has_post_thumbnail()): ?> 

	
		<div class="archive-img">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('gallery-thumb'); ?></a>
		</div>
		
			<h3 class="archive-title"><?php echo substr( get_the_title(), 0, 40 ); ?></h3>
	
		</div>
<?php endif;  ?>
			<?php endwhile; ?>	
	</div>


	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

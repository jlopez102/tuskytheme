<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tusky
 */

get_header();
?>

	<main id="primary" class="container">
<div class="single-wrap">
  <?php while (have_posts()) : the_post(); ?>
	   <div class="single-wrap single" id="post-<?php the_ID(); ?>">
		
	
		<?php  
if ( has_post_thumbnail()): ?> 
		<div class=" fade-in single-featured <?php  $terms = get_the_terms( $post->ID , 'discipline' );
		   foreach ( $terms as $term ) {
			/*echo $term->name;*/
			echo $term->name ;
			}
			?>">
		
		<?php the_post_thumbnail('modern-blog'); ?>
		</div>
		
			<div class="single-info">
		<h2 class="fade-in"><?php echo substr( get_the_title(), 0, 40 ); ?></h2>
		<div class="post-tags">
			
			<?php  $terms = get_the_terms( $post->ID , 'discipline' );
		   foreach ( $terms as $term ) {
			/*echo $term->name;*/
			echo '<p>' . $term->name . '</p>';
			}
			?>
		</div>
			</div>
		</div>
<?php endif;  ?>
<div class="post-content">
<?php the_content(); ?>

</div>
<?php endwhile; ?>	

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();





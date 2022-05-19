<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Tusky
 */

get_header();
?>

	<main id="primary" class="container">
	<div class="single-wrap">
		<section class="error-404 not-found ">
			<header class="page-header">
				<h1 class="page-title">404</h1>
				<h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'tusky' ); ?></h2>
			</header><!-- .page-header -->

	
		</section><!-- .error-404 -->
	</div>
	</main><!-- #main -->

<?php
get_footer();

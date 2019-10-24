<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Center_for_Data_and_Computation_Technologies
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			if (get_post_type()=='post'){
				get_template_part( 'template-parts/content-post', get_post_type('') );
			} else if ( get_post_type() == 'dich_vu_page') {
				echo 'Dich vu';
			} else if (get_post_type() == 'about_us'){
				echo "gioi thieu";	
			} else {
				get_template_part( 'template-parts/content', get_post_type('') );
			}
			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

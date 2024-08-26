<?php
/**
 * Template Name: Wide Page
 */

get_header();
?>

	<div class="container">
		<div class="row justify-content-center">

			<main id="primary" class="col-lg-10">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div>
	</div>

<?php
get_footer();

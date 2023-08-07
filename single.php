<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Starter
 */

get_header();
?>

	<div class="container">
		<div class="row">
			<main id="primary" class="col-lg-9">

				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php
							if ( is_singular() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
							else :
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif;

							if ( 'post' === get_post_type() ) :
								?>
								<div class="entry-meta">
									<?php
									strt_posted_on();
									strt_posted_by();
									?>
								</div><!-- .entry-meta -->
							<?php endif; ?>
						</header><!-- .entry-header -->

						<?php strt_post_thumbnail(); ?>

						<div class="entry-content">
							<?php
							the_content(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'strt' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									wp_kses_post( get_the_title() )
								)
							);

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'strt' ),
									'after'  => '</div>',
								)
							);
							?>
						</div><!-- .entry-content -->

						<footer class="entry-footer">
							<?php strt_entry_footer(); ?>
						</footer><!-- .entry-footer -->
					</article><!-- #post-<?php the_ID(); ?> -->

					<?php
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'strt' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'strt' ) . '</span> <span class="nav-title">%title</span>',
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php
get_footer();

<?php
/**
 * Posts layout
 *
 * @package Starter
 */

global $post;

$strt_post_columns       = get_sub_field( 'post_columns' );
$strt_post_amount        = get_sub_field( 'post_amount' );
$strt_post_excerptlength = get_sub_field( 'excerpt_length' );
$strt_post_options       = get_sub_field( 'post_options' );
$strt_post_tax           = get_sub_field( 'post_tax' );

// Thumbnail size.
if ( '2' === $strt_post_columns ) {
	$strt_thumbsize = 'col-6-4x3';
} elseif ( '3' === $strt_post_columns ) {
	$strt_thumbsize = 'col-3-16x9';
} else {
	$strt_thumbsize = 'col-3-16x9';
}

// Category.
$strt_tax_query = array( 'relation' => 'AND' );
if ( $strt_post_tax ) {
	$strt_tax_query[] = array(
		'taxonomy' => 'category',
		'field'    => 'id',
		'terms'    => $strt_post_tax,
	);
}

// WP Query.
$strt_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => $strt_post_amount,
		'ignore_sticky_posts' => true,
		'post_status'         => 'publish',
		'tax_query'           => $strt_tax_query, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
	)
);

strt_start_section();

echo '<div class="row row-cols-1 row-cols-md-2 row-cols-xl-' . esc_attr( $strt_post_columns ) . ' gx-4 mb-2">';
while ( $strt_query->have_posts() ) :
	$strt_query->the_post();
	$strt_permalink      = get_the_permalink();
	$strt_title          = get_the_title();
	$strt_excerpt        = get_the_excerpt();
	$strt_excerpt_length = ( $strt_post_excerptlength ) ? (int) $strt_post_excerptlength : 280;
	$strt_excerpt        = substr( $strt_excerpt, 0, $strt_excerpt_length );
	$strt_excerpt_crop   = substr( $strt_excerpt, 0, strrpos( $strt_excerpt, ' ' ) ) . '... <a href="' . $strt_permalink . '">' . __( 'Read More', 'strt' ) . '</a>';
	echo '<div class="col">';
	echo '<article class="card h-100">';
	if ( has_post_thumbnail() ) :
		echo get_the_post_thumbnail( $post->ID, $strt_thumbsize, array( 'class' => 'card-img-top' ) );
	endif;
	echo '<div class="card-body d-flex flex-column">';
	echo '<h3 class="card-title"><a href="' . esc_url( $strt_permalink ) . '">' . wp_kses_post( $strt_title ) . '</a></h3>';
	if ( in_array( 'show_date', $strt_post_options, true ) || in_array( 'show_author', $strt_post_options, true ) ) :
		echo '<div class="post-meta small">';
		if ( in_array( 'show_date', $strt_post_options, true ) ) :
			strt_posted_on();
		endif;
		if ( in_array( 'show_author', $strt_post_options, true ) ) :
			strt_posted_by();
		endif;
		echo '</div>';
	endif;
	echo '<p class="card-text flex-fill">' . wp_kses_post( $strt_excerpt_crop ) . '</p>';
	if ( in_array( 'show_cats', $strt_post_options, true ) ) :
		echo '<div class="categories small">' . esc_attr__( 'Posted in: ', 'strt' ) . wp_kses_post( get_the_category_list( ', ' ) ) . '.</div>';
	endif;
	echo '</div>';
	echo '</article>';
	echo '</div>';
endwhile;
wp_reset_postdata();
echo '</div>';

if ( in_array( 'show_more', $strt_post_options, true ) ) :
	echo '<div class="row pb-5"><div class="col-12">';
	if ( have_rows( 'button' ) ) :
		while ( have_rows( 'button' ) ) :
			the_row();
			include get_template_directory() . '/flexbuilder/templates/components/buttons.php';
		endwhile;
	endif;
	echo '</div></div>';
endif;

strt_end_section();


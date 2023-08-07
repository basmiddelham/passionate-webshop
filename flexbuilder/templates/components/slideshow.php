<?php
/**
 * Slideshow Component
 *
 * @package Starter
 */

$strt_slideshow      = get_sub_field( 'slideshow' );
$strt_zoom           = get_sub_field( 'enable_zoom' );
$strt_image_ratio    = get_sub_field( 'image_ratio' );
$strt_effect         = get_sub_field( 'effect' );
$strt_image_size     = ( ! empty( $strt_columns_layout ) ) ? strt_image_size( $strt_columns_layout, $strt_image_ratio ) : 'col-12-16x9';
$strt_slideshow_id   = 'slideshow_' . wp_unique_id();
$strt_slideshow_data = array(
	'effect'       => $strt_effect,
	'slideshow_ID' => $strt_slideshow_id,
);

if ( $strt_slideshow ) :
	wp_enqueue_script( 'swiper', get_stylesheet_directory_uri() . '/assets/dist/js/swiper.js', array(), '1.0.0', true );
	wp_enqueue_style( 'swiper', get_stylesheet_directory_uri() . '/assets/dist/css/swiper.css', array(), '1.0.0' );
	if ( $strt_zoom ) :
		wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri() . '/assets/dist/js/fancybox.js', array(), '1.0.0', true );
		wp_enqueue_style( 'fancybox', get_stylesheet_directory_uri() . '/assets/dist/css/fancybox.css', array(), '1.0.0' );
	endif;
	?>
	<div class="swiper" id="<?php echo esc_attr( $strt_slideshow_id ); ?>" data-slideshow='<?php echo wp_json_encode( $strt_slideshow_data ); ?>'>
		<div class="swiper-wrapper">
			<?php foreach ( $strt_slideshow as $strt_slide ) : ?>
				<div class="swiper-slide w-100">
					<?php
					$strt_caption = wp_get_attachment_caption( $strt_slide );
					if ( $strt_zoom ) :
						echo '<a href="' . esc_url( wp_get_attachment_image_url( $strt_slide, 'full' ) ) . '" target="_blank">';
					endif;
					echo '<figure class="m-0 position-relative">';
					if ( $strt_caption ) :
						echo '<figcaption class="slide-caption bg-light bg-opacity-75">' . esc_attr( $strt_caption ) . '</figcaption>';
					endif;
					echo wp_get_attachment_image( $strt_slide, $strt_image_size, false, array( 'class' => 'img-fluid d-table mx-auto' ) );
					echo '</figure>';
					echo ( $strt_zoom ) ? '</a>' : '';
					?>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="swiper-pagination"></div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>
	<?php
endif; ?>

<?php
/**
 * Template for rendering different ACF Flexbuilder layouts
 *
 * @package Starter
 */

$strt_image   = get_sub_field( 'image' );
$strt_content = get_sub_field( 'editor' );
$strt_btn     = get_sub_field( 'button_link' );
?>
<div class="pageheader container-fluid">
	<div class="row mb-5 mb-xxl-6">
		<div class="pageheader__img bg-img col-12 col-lg-6" style="background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $strt_image, 'col-8' ) ); ?>);"></div>
		<div class="pageheader__content p-5 py-xxl-6 col-12 col-lg-6 col-xl-5 text-center bg-light d-flex align-items-center">
			<div class="inner">
				<?php echo wp_kses_post( $strt_content ); ?>
				<?php if ( $strt_btn ) : ?>
					<a class="btn btn-primary btn-lg d-table mx-auto" href="<?php echo esc_url( $strt_btn['url'] ); ?>" target="<?php echo ( '_blank' === $strt_btn['target'] ) ? $strt_btn['target'] : '_self'; ?>"><?php echo esc_html( $strt_btn['title'] ); ?></a>
				<?php endif; ?>
			</div>
		</div>
		<div class="pageheader__blend col-xl-1 d-none d-xl-block p-0">
			<div class="inner h-100" style="background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $strt_image, 'col-8' ) ); ?>);">
			</div>
		</div>
	</div>
	<svg class="colorswatch" width="90px" height="154.565217px" viewBox="0 0 90 154.565217" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<g id="Design-" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<g id="Home" transform="translate(-1590, -465)" fill-rule="nonzero">
				<g id="colorswatch" transform="translate(1590, 465)">
					<polygon id="Path" fill="#FFFFFF" points="52.826087 154.565217 89.0217391 154.565217 89.0217391 0.97826087"></polygon>
					<polygon id="Path" fill="#1E6C9A" points="0 83.8337715 22.4511931 105.652174 90 0"></polygon>
					<polygon id="Path" fill="#F08E00" points="1.95652174 93.3621457 27.0562095 114.456522 90 0"></polygon>
					<polygon id="Path" fill="#AF0917" points="2.93478261 104.869565 31.3662491 125.217391 90 0"></polygon>
					<polygon id="Path" fill="#E2017B" points="5.86956522 115.658466 37.4798336 135 90 0"></polygon>
					<polygon id="Path" fill="#D9ABAB" points="9.7826087 126.843215 44.6512183 144.782609 90 0"></polygon>
					<polygon id="Path" fill="#50813D" points="16.6304348 137.496894 53.7979119 153.586957 90 0"></polygon>
				</g>
			</g>
		</g>
	</svg>
</div>

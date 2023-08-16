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
		<div class="pageheader__content p-5 py-xxl-6 col-12 col-lg-6 col-xl-5 text-center d-flex align-items-center">
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
</div>

<?php
/**
 * Image Grid 2 Component
 *
 * @package Starter
 */

$strt_img_lg_id = get_sub_field( 'image-large' );
$strt_img_sm_id = get_sub_field( 'image-small' );
if ( ! is_admin() ) {
	$strt_row = ( 0 === $i ) ? 'justify-content-start' : 'justify-content-end';
	$strt_col = ( 0 === $i ) ? 'end-0' : 'start-0';
} else {
	$strt_row = 'justify-content-xl-start';
}
?>
<div class="image-grid-2 position-relative row pb-5 pb-xxl-6 <?php echo $strt_row; ?>">
	<div class="col-11 col-xl-10">
		<?php echo wp_get_attachment_image( $strt_img_lg_id, 'col-5-4x3', false, array( 'class' => 'img-fluid w-100 rounded shadow' ) ); ?>
	</div>
	<div class="col-6 position-absolute bottom-0 <?php echo $strt_col; ?>">
		<?php echo wp_get_attachment_image( $strt_img_sm_id, 'col-3-4x3', false, array( 'class' => 'img-fluid w-100 rounded shadow' ) ); ?>
	</div>
</div>

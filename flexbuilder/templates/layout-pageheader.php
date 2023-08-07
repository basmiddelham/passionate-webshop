<?php
/**
 * Template for rendering different ACF Flexbuilder layouts
 *
 * @package Starter
 */

$strt_heading = get_sub_field( 'heading' );
$strt_text    = get_sub_field( 'text' );

if ( isset( $strt_heading ) || isset( $strt_text ) ) : ?>
	<section class="bg-primary-subtle text-secondary-emphasis py-3 py-md-4 py-lg-6">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 mx-auto text-center">
					<h1 class="pageheader-heading"><?php echo esc_attr( $strt_heading ); ?></h1>
					<?php echo wp_kses_post( $strt_text ); ?>
				</div>
			</div>
		</div>
	</section>
	<?php
endif;

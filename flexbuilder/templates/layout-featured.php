<section class="container mb-4 mb-xxl-5">
	<div class="row justify-content-center">
		<div class="col-lg-9 col-xl-7">
			<div class="mb-4">
				<?php the_sub_field( 'editor' ); ?>
			</div>
		</div>
	</div>
	<?php echo do_shortcode( '[featured_products limit="4" columns="4" orderby="popularity"]' ); ?>
</section>

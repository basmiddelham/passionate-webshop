<section class="shopnav-layout container">
	<nav class="row justify-content-center">
		<div class="col-lg-8 mb-5 mb-xxl-6 text-center">
			<h2 class="text-center mb-3">Kies je doelgroep:</h2>
			<div class="mx-auto d-table">
				<?php
				$strt_doelgroep = get_terms(
					array(
						'taxonomy'   => 'pa_doelgroep',
						'hide_empty' => false,
					)
				);
				if ( ! empty( $strt_doelgroep ) ) :
					$strt_output = '<div class="list-group list-group-horizontal">';
					foreach ( $strt_doelgroep as $strt_cat ) {
						$strt_output .= '<a class="list-group-item btn btn-primary" href="' . get_term_link( $strt_cat->term_id ) . '">' . $strt_cat->name . '</a>';
					}
					$strt_output .= '</div>';
					echo $strt_output;
				endif;
				?>
			</div>
		</div>
	</nav>
	
	<nav class="row justify-content-center">
		<div class="col-lg-8 mb-5 mb-xxl-6 text-center">
			<h2 class="text-center mb-3">Kies een product categorie:</h2>
			<div class="mx-auto d-table">
				<?php
				$strt_taxonomies = get_terms(
					array(
						'taxonomy'   => 'product_cat',
						'hide_empty' => true,
						'exclude'    => array( 15 ),
					)
				);
				if ( ! empty( $strt_taxonomies ) ) :
					$strt_output = '<div class="list-group list-group-horizontal">';
					foreach ( $strt_taxonomies as $strt_cat ) {
						$strt_output .= '<a class="list-group-item btn btn-primary" href="' . get_term_link( $strt_cat->term_id ) . '">' . $strt_cat->name . '</a>';
					}
					$strt_output .= '</div>';
					echo $strt_output;
				endif;
				?>
			</div>
		</div>
	</nav>
	
</section>

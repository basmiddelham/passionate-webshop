<section class="shopnav-layout container">
	<h2 class="text-center mb-3"><?php the_sub_field( 'shopnav_title' ); ?></h2>
	<nav class="shopnav widget d-flex justify-content-center flex-wrap mb-3 mb-lg-5 mb-xxl-6">
		<a class="shopnav-item nav-jj" href="<?php echo get_home_url(); ?>/jongejury">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/nav-jj.png" srcset="<?php echo get_template_directory_uri(); ?>/assets/dist/images/nav-jj@2x.png 2x" width="140" height="105" alt="Passionate Bulkboek Shop">
		</a>
		<a class="shopnav-item nav-dlo" href="<?php echo get_home_url(); ?>/dlo">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/nav-dlo.png" srcset="<?php echo get_template_directory_uri(); ?>/assets/dist/images/nav-dlo@2x.png 2x" width="140" height="105" alt="Passionate Bulkboek Shop">
		</a>
		<a class="shopnav-item nav-pl" href="<?php echo get_home_url(); ?>/pabo-leest">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/nav-pl.png" srcset="<?php echo get_template_directory_uri(); ?>/assets/dist/images/nav-pl@2x.png 2x" width="140" height="105" alt="Passionate Bulkboek Shop">
		</a>
		<a class="shopnav-item nav-ia" href="<?php echo get_home_url(); ?>/de-inktaap">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/nav-ia.png" srcset="<?php echo get_template_directory_uri(); ?>/assets/dist/images/nav-ia@2x.png 2x" width="140" height="105" alt="Passionate Bulkboek Shop">
		</a>
		<a class="shopnav-item nav-dvdl" href="<?php echo get_home_url(); ?>/dvdl">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/nav-dvdl.png" srcset="<?php echo get_template_directory_uri(); ?>/assets/dist/images/nav-dvdl@2x.png 2x" width="140" height="105" alt="Passionate Bulkboek Shop">
		</a>
		<a class="shopnav-item nav-ewe" href="<?php echo get_home_url(); ?>/er-was-eens">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/nav-ewe.png" srcset="<?php echo get_template_directory_uri(); ?>/assets/dist/images/nav-ewe@2x.png 2x" width="140" height="105" alt="Passionate Bulkboek Shop">
		</a>
	</nav>

	<nav class="row justify-content-center">
		<div class="col-lg-8 mb-5 mb-xxl-6 text-center">
			<h2 class="text-center mb-3">Kies je doelgroep:</h2>
			<div class="mx-auto d-table">
				<div class="list-group list-group-horizontal">
					<a class="list-group-item btn btn-primary" href="<?php home_url('/') ?>/doelgroep/havo">Havo</a>
					<a class="list-group-item btn btn-primary" href="<?php home_url('/') ?>/doelgroep/vwo">Vwo</a>
					<a class="list-group-item btn btn-primary" href="<?php home_url('/') ?>/doelgroep/mbo">Mbo</a>
					<a class="list-group-item btn btn-primary" href="<?php home_url('/') ?>/doelgroep/vmbo">Vmbo</a>
					<a class="list-group-item btn btn-primary" href="<?php home_url('/') ?>/doelgroep/vo">Vo</a>
				</div>
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

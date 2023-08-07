<?php
/**
 * Template for rendering different ACF Flexbuilder layouts
 *
 * @package Starter
 */

wp_register_script( 'mapbox', get_stylesheet_directory_uri() . '/assets/dist/js/mapbox.js', array(), '1.0.0', true );
wp_enqueue_script( 'mapbox' );
wp_enqueue_style( 'mapbox', get_stylesheet_directory_uri() . '/assets/dist/css/mapbox.css', array(), '1.0.0' );

$strt_main_marker = get_sub_field( 'mainMarker' );
$strt_map_id      = wp_unique_id();
if ( $strt_main_marker ) :
	$strt_map = array(
		'accessToken'     => 'pk.eyJ1IjoibWlkZGVsaGFtIiwiYSI6ImNsZGtkYThxajAwcnQzeG1pamg5NzZwM2MifQ.Vhgse19VgRURwN-cbKU4hg',
		'mapStyleId'      => 'mapbox://styles/middelham/cldr3trbe005o01seu9y3ez07',
		'mainMarker'      => $strt_main_marker,
		'mainMarkerTitle' => get_sub_field( 'mainMarkerTitle' ),
		'mainMarkerColor' => get_sub_field( 'mainMarkerColor' ),
		'mapZoom'         => get_sub_field( 'mapZoom' ),
		'mapPitch'        => get_sub_field( 'mapPitch' ),
		'mapBearing'      => get_sub_field( 'mapBearing' ),
		'mapOffsetX'      => get_sub_field( 'mapOffsetX' ),
		'mapOffsetY'      => get_sub_field( 'mapOffsetY' ),
		'rowCount'        => $strt_map_id,
	);
endif;
?>

<style>
	.mapbox {
		position: relative;

	}

	.mapbox-stylemenu {
		position: absolute;
		z-index: 1;
		top: 10px;
		left: 10px;
	}

	.mapboxgl-popup-content {
		padding: 5px 10px!important;
	}
</style>

<section class="mapbox">
	<div style="height: 480px" data-map='<?php echo wp_json_encode( $strt_map ); ?>'></div>
	<div id="menu-<?php echo esc_attr( $strt_map_id ); ?>" class="mapbox-stylemenu"></div>
</section>

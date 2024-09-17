<?php
/**
 * WooCommerce Email - Add salutation to email
 *
 * @package strt
 */

$strt_gender      = get_post_meta( $order->get_id(), '_billing_salutation', true );
$strt_middle_name = get_post_meta( $order->get_id(), '_billing_middle_name', true );
$strt_name        = $order->get_billing_last_name();
$full_name        = ( $strt_middle_name ) ? $strt_middle_name . ' ' . $strt_name : $strt_name;
$strt_aanhef      = ( 'male' === $strt_gender ) ? 'heer' : 'mevrouw';

if ( ! empty( $strt_gender ) ) {
	$strt_aanhef = ( 'male' === $strt_gender ) ? 'heer' : 'mevrouw';
} else {
	$strt_aanhef = 'heer/mevrouw';
}

$strt_opening = 'Geachte ' . $strt_aanhef . ' ' . $full_name . ',';

?>
<p><?php echo esc_attr( $strt_opening ); ?></p>
<p>Bedankt voor uw bestelling bij <a href="https://webshop.passionatebulkboek.nl/" target="_blank"><strong>Passionate Bulkboek</strong></a>!
Fijn dat u aan de slag gaat met lezen en leesplezier. We kijken ernaar uit om samen van jongeren lezers te maken!
Hieronder ziet u een overzicht van uw aankoop. U kunt deze e-mail als factuur gebruiken.</p>
<?php

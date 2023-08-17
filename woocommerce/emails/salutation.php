<?php
/**
 * WooCommerce Email - Add salutation to email
 *
 * @package strt
 */

$strt_gender  = get_post_meta( $order->get_id(), '_billing_gender', true );
$strt_name    = $order->get_billing_last_name();
$strt_aanhef  = ( 'male' === $strt_gender ) ? 'heer' : 'mevrouw';
$strt_opening = 'Geachte ' . $strt_aanhef . ' ' . $strt_name . ',';
?>
<p><?php echo esc_attr( $strt_opening ); ?></p>
<p>Bedankt voor uw bestelling bij <a href="<?php echo home_url(); ?>"><strong><?php echo get_option( 'blogname' ); ?></strong></a>!
	Hieronder ziet u een overzicht van uw aankoop. U kunt deze e-mail als factuur gebruiken.</p>
<?php

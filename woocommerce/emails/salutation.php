<?php
$gender  = get_post_meta( $order->get_id(), '_billing_gender', true );
$name    = $order->get_billing_last_name();
$aanhef  = ( 'male' === $gender ) ? 'heer' : 'mevrouw';
$opening = 'Geachte ' . $aanhef . ' ' . $name . ',';
?>
<p><?php echo $opening; ?></p>
<p>Bedankt voor uw bestelling bij <a href="<?php echo home_url(); ?>"><strong><?php echo get_option( 'blogname' ); ?></strong></a>!
	Hieronder ziet u een overzicht van uw aankoop. U kunt deze e-mail als factuur gebruiken.</p>
<?php

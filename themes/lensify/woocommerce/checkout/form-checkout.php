<?php
/**
 * Checkout Form
 *
 * This template overides the template under plugins/woocommerce/checkout/form-checkout.php.
 *
 * If the original woocommerce template is updated, this template will need
 * to be updated to maintain compatibility.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If user is not logged in, he/she cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __( 'Billing address', 'woocommerce' ),
			'shipping' => __( 'Shipping address', 'woocommerce' ),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __( 'Billing address', 'woocommerce' ),
		),
		$customer_id
	);
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout grid-x grid-padding-x" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<section class="cell large-8 medium-9 small-12 grid-x">
	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
		<section class="lensify-checkout-addresses cell small-12 grid-x">
			<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
				<div class="u-columns woocommerce-Addresses col2-set addresses cell small-12 grid-x">
			<?php endif; ?>

			<?php foreach ( $get_addresses as $name => $address_title ) : ?>
				<?php
					$address = wc_get_account_formatted_address( $name );
					$col     = $col * -1;
					$oldcol  = $oldcol * -1;
				?>

				<div class="cell large-4 medium-6 small-12 u-column<?php echo $col < 0 ? 1 : 2; ?> col-<?php echo $oldcol < 0 ? 1 : 2; ?> woocommerce-Address">
					<header class="woocommerce-Address-title title">
						<strong><?php echo esc_html( $address_title ); ?></strong>
					</header>
					<address>
						<?php
							echo $address ? wp_kses_post( $address ) : esc_html_e( 'You have not set up this type of address yet.', 'woocommerce' );
						?>
					</address>
					<a class="edit checkout-edit"><?php echo $address ? esc_html__( 'Edit', 'woocommerce' ) : esc_html__( 'Add', 'woocommerce' ); ?></a>
				</div>
			<?php endforeach; ?>

			<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
				</div>
				<?php
			endif; ?>
			<article class="cell small-12 col2-set" id="customer_details">
				<div class="col-1 lensify-hidden" id="lensify-checkout-shipping">
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>
	
				<div class="col-2 lensify-hidden" id="lensify-checkout-billing">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
				</div>
			</article>
		</section>

		<section class="cell small-12">
			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
			<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
		</section>

		<section class="cell small-12 wp-block-group is-style-sandwich-group lensify-order-review-wrapper">
			<h3 id="order_review_heading"><?php esc_html_e( 'My Order', 'woocommerce' ); ?></h3>
			
			<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
		</section>

	<?php endif; ?>
	</section>
	
	<section class="cell large-4 medium-3 small-12">
		<div class="lensify-totals-wrapper">
			<div class="cart-subtotal">
				<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
				<td><?php wc_cart_totals_subtotal_html(); ?></td>
			</div>
			
			<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
				<div class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
					<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
				</div>
			<?php endforeach; ?>

			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

				<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

				<?php wc_cart_totals_shipping_html(); ?>

				<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

			<?php endif; ?>

			<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
				<div class="fee">
					<th><?php echo esc_html( $fee->name ); ?></th>
					<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
				</div>
			<?php endforeach; ?>

			<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
				<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
					<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
						<div class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
							<th><?php echo esc_html( $tax->label ); ?></th>
							<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
						</div>
					<?php endforeach; ?>
				<?php else : ?>
					<div class="tax-total">
						<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
						<td><?php wc_cart_totals_taxes_total_html(); ?></td>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

			<div class="order-total">
				<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
				<td><?php wc_cart_totals_order_total_html(); ?></td>
			</div>
		</div>

		<div class="lensify-payment-wrapper">
		<?php 
		do_action( 'woocommerce_review_order_after_order_total' ); 
		?>
		</div>

	</section>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

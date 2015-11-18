<?php
/*
  Plugin Name: Stripe Mailchimp Merge
  Plugin URI: http://honeyonsys.com
  Description: This extension can use to setup stripe payment and mailchimp account on a page and on successful payment via stripe the recipient's email address will be added to the admin mailchimp's account.
  Version: 1.0.0
  Author: Harish Kumar
  Author URI: http://honeyonsys.com/
  Developer: Harish Kumar
  */


// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/*Admin section starts here */
function main_admin_menu(){
	add_menu_page('Stripe Mailchimp Configuration','Stripe-mailchimp','None',plugins_url( 'stripe-mailchimp/stripe.png' ),6);
}

add_action('admin_menu','main_admin_menu');

/*Admin section ends here*/



/* Front section starts*/


function front_form(){

	
	wp_enqueue_style('form-css-stripe',plugins_url('/stripe-mailchimp/stripe.css'));
	wp_enqueue_script('form-js-stripe', plugins_url('/stripe-mailchimp/buy.js'),array( 'jquery'));
	$form = '<form action="buy.php" method="POST" id="payment-form">';
	$form .= '<table>';
	$form .= '<tr><td><label>Your Name :</label></td><td><input type="text" size="20" autocomplete="off" class="fname input-medium"></td></tr>';
	$form .= '<tr><td><label>E-Mail :</label></td><td><input type="email" size="20" autocomplete="off" class="e-mail input-medium"></td></tr>';
	$form .= '<tr><td><label>Credit Card :</label></td><td><input type="text" size="20" autocomplete="off" class="card-number input-medium"></td></tr>';
	$form .= '<tr><td><label>CVC</label></td><td><input type="text" size="4" autocomplete="off" class="card-cvc input-mini"></td></tr>';
	$form .= '<tr><td><label>Expiration (MM/YYYY)</label></td><td><input type="text" size="2" class="card-expiry-month input-mini"><span> / </span><input type="text" size="4" class="card-expiry-year input-mini"></td></tr>';
	
	$form .= '<tr><td colspan="2"><button type="submit" class="btn" id="submitBtn">Submit Payment</button></td></tr>';
	$form .= '</table>';
	$form .= '</form>';

	echo $form;
	

}

add_shortcode('STRIPE-MAILCHIMP','front_form');

/*front section ends*/
?>
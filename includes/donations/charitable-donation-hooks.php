<?php 
/**
 * Charitable Donation Hooks. 
 *
 * Action/filter hooks used for Charitable donations. 
 * 
 * @package     Charitable/Functions/Donations
 * @version     1.0.0
 * @author      Eric Daams
 * @copyright   Copyright (c) 2014, Studio 164a
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License  
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Start a donation. 
 *
 * In default Charitable, this happens when the donation form is loaded. The
 * donation is not saved to the database yet; it just exists in the user's 
 * session.
 *
 * @see Charitable_Donation_Controller::start_donation()
 */
add_action( 'charitable_start_donation', array( 'Charitable_Donation_Controller', 'start_donation' ) );

/**
 * Make a donation. 
 *
 * This is when a donation is saved to the database. 
 *
 * @see Charitable_Donation_Controller::make_donation()
 */
add_action( 'charitable_make_donation', array( 'Charitable_Donation_Controller', 'make_donation' ) );

/**
 * AJAX hook to make a donation.
 *
 * @see Charitable_Donation_Controller::ajax_make_donation()
 */
add_action( 'wp_ajax_add_donation', array( 'Charitable_Donation_Controller', 'ajax_make_donation' ) );
add_action( 'wp_ajax_nopriv_add_donation', array( 'Charitable_Donation_Controller', 'ajax_make_donation' ) );

/**
 * Make a streamlined donation. 
 * 
 * This hook is fired when a form generated by Charitable_Donation_Amount_Form 
 * is submitted. By default, it just includes the amount to be donated and 
 * the campaign. 
 * 
 * @see Charitable_Donation_Controller::make_donation_streamlined()
 */
add_action( 'charitable_make_donation_streamlined', array( 'Charitable_Donation_Controller', 'make_donation_streamlined' ) );

/**
 * Send donation to gateway. 
 *
 * This is called after the donation is stored in the database.
 *
 * @see Charitable_Donation_Controller::send_donation_to_gateway
 */
add_action( 'charitable_after_save_donation', array( 'Charitable_Donation_Controller', 'send_donation_to_gateway' ), 10, 3 );

/**
 * Send donation to the Offline gateway.
 *
 * This is called on the charitable_after_save_donation hook. 
 *
 * @see Charitable_Gateway_Offline::process_donation
 */
add_action( 'charitable_make_donation_offline', array( 'Charitable_Gateway_Offline', 'process_donation' ), 10, 2 );

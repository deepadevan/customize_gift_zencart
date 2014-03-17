<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: header_php.php,euphontec
//
  require(DIR_WS_MODULES . 'require_languages.php');
  $breadcrumb->add(NAVBAR_TITLE);

  $error = false;
  $name = '';
  $email = '';
  $confirm = '';
  $phone = '';
  $today = '';
  $desc = '';
  


  if (isset($_GET['action']) && ($_GET['action'] == 'send')) {
    $name = zen_db_prepare_input($_POST['name']);
    
    $phone = zen_db_prepare_input($_POST['phone']);
	
    $email = zen_db_prepare_input($_POST['email']);
	
    $confirm = zen_db_prepare_input($_POST['confirm']);
    $desc = zen_db_prepare_input(strip_tags($_POST['desc']));
	
$today = zen_db_prepare_input($_POST['today']);

    if (!zen_validate_email($email))  {
      $error = true;
      $messageStack->add('customize_gift', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
      }
	   if (!zen_validate_email($confirm))  {
      $error = true;
      $messageStack->add('customize_gift', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
      }
    if (!zen_not_null($name))  {
      $error = true;
      $messageStack->add('customize_gift', 'Please fill in the Name');
      }
  
    if (!zen_not_null($phone))  {
      $error = true;
      $messageStack->add('customize_gift', 'Please fill in the phone');
      }
 if (!zen_not_null($desc))  {
      $error = true;
      $messageStack->add('customize_gift', 'Please fill in the description');
      }
	  
if (strcmp($email , $confirm))  {
      $error = true;
      $messageStack->add('customize_gift', 'The emails do not match');
      }
	  
   if ($error == false) {

// grab some customer info if logged in
      if(isset($_SESSION['customer_id'])) {
        $check_customer = $db->Execute("select customers_firstname, customers_lastname, customers_email_address from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$_SESSION['customer_id'] . "'");
        $customer_email = $check_customer->fields['customers_email_address'];
        $customer_name = $check_customer->fields['customers_firstname'] . ' ' . $check_customer->fields['customers_lastname'];
      } else {
        $customer_email = 'Not logged in';
        $customer_name = 'Not logged in';
      }

//assemble the email contents:
      $email_text = 'Customize Your Gift Submission: ' . "\n" .
        '------------------------------------------------------' . "\n" .
        'Name:' . "\t" . $name . "\n" .
        'Phone Number:' . "\t" . $phone . "\n" .
        'Email:' . "\t" . $email . "\n" . 
        'Description:' . "\t" . $desc . "\n\n" .
        '------------------------------------------------------' . "\n" .
        OFFICE_USE . "\t" . "\n" .
        OFFICE_LOGIN_NAME . "\t" . $customer_name . "\n" .
        OFFICE_LOGIN_EMAIL . "\t" . $customer_email . "\n" .
        OFFICE_IP_ADDRESS . "\t" . $_SERVER['REMOTE_ADDR'] . "\n" .
        OFFICE_HOST_ADDRESS . "\t" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "\n" .
        OFFICE_DATE_TIME . "\t" . date("D M j Y G:i:s T") . "\n" .
        '------------------------------------------------------' . "\n\n" .
      $email_text = zen_output_string_protected($email_text);
      $email_html = nl2br("\n" . $email_text);

//send the email
      zen_mail(STORE_NAME, SEND_TO_ADDRESS, EMAIL_SUBJECT, $email_text, $name, $email, array('EMAIL_MESSAGE_HTML' => $email_html), 'customize_gift');

      zen_redirect(zen_href_link(FILENAME_CUSTOMIZE_GIFT, 'action=success'));
      } //endif $error=false

  } // endif action

// default email and name if customer is logged in
  if(isset($_SESSION['customer_id'])) {
      $check_customer = $db->Execute("select customers_firstname, customers_lastname, customers_email_address from " . TABLE_CUSTOMERS . " where customers_id = '" . $_SESSION['customer_id'] . "'");
      if ($contact1_email == '') $contact1_email = $check_customer->fields['customers_email_address'];
      if ($contact1_firstname == '') $contact1_firstname = $check_customer->fields['customers_firstname'];
      if ($contact1_lastname == '') $contact1_lastname = $check_customer->fields['customers_lastname'];
  }

?>
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

//
?>




<?php if ($messageStack->size('customize_gift') > 0) echo $messageStack->output('customize_gift'); ?>

<?php
  if (isset($_GET['action']) && ($_GET['action'] == 'success')) {
?>
<div class="mainContent success"><?php echo TEXT_SUCCESS; ?></div>
<?php

$url_back = strstr(zen_back_link(), '&', true); 
echo zen_back_link();
?>
<div class="buttonRow"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>

<?php
  } else {
?>
<h1 id="pageFiveHeading">Customize Your Gift! </h1>
<div class="customize_gift">
<p>
If you have a gift in your mind and want to send to your loved ones in Lebanon, just use our "Customize your gift" form and send it to us. The procedure is quite simple.<br><br>
Your idea could be a combination of personalized gifts that you have gathered from our site (for example: buying a box of our collections and want to include a piece of jewelry, or ordering a cake specially designed with a size or shape specific or a jewel with a specific name). <br> <br>
Or it could be any item in your mind that you want a specific store in Lebanon (Special bouquet of flowers from your store promoted or cake, or Sugar Arab your favorite pastry).
It could be even any original idea which is not included in our website (for example purchasing a gift certificate for 2 in a restaurant or a specific airline ticket to a certain destination, or a night for two in a hotel you choose... etc.). <br><br>
After receiving your request by e-mail, we will evaluate it and will answer you with the expected price, time needed for execution and guidelines for pursuing your order. <br><br>
With this type of gifts made to order, please let us an execution time of at least 3 days.
It might take more or less, but we will do everything possible to make your idea as quickly as possible with the best possible price.
After the placement of your order, your gift will be sent to the recipient. <br>
</p>

<?php echo zen_draw_form('customize_gift', zen_href_link(FILENAME_CUSTOMIZE_GIFT, 'action=send')); ?>

<fieldset style="color: #666666; font-family: Arial,Helvetica,sans-serif; font-size: 12px; font-weight: bold; line-height: 20px;">

<table>
<tr><td>&nbsp;</td><td><span class="alert"><?php echo FORM_REQUIRED_INFORMATION; ?></span></td></tr>
		<tr><td><label class="inputLabel" for="name">NAME:</label></td>
		<td><?php echo zen_draw_input_field('name', zen_output_string_protected($name), ' size="30" id="name"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></td></tr>
		<tr><td><label class="inputLabel" for="name">EMAIL:</label></td>
		<td><?php echo zen_draw_input_field('email', zen_output_string_protected($email), ' size="30" id="email"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></td></tr>
<tr><td><label class="inputLabel" for="name">CONFIRM EMAIL ADDRESS:</label></td>
		<td><?php echo zen_draw_input_field('confirm', zen_output_string_protected($confirm), ' size="30" id="confirm"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></td></tr>
		
		<tr><td><label class="inputLabel" for="name">PHONE NUMBER:</label></td>
		<td><?php echo zen_draw_input_field('phone', zen_output_string_protected($phone), ' size="30" id="phone"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></td></tr>
<tr><td><label class="inputLabel" for="name">DATE:</label></td>
		<td>
		<?php $today1= date("Y-m-d");
		?><input type=text name='today' value = '<?php echo date("Y-m-d")?>'> <span class="alert"><?php echo ENTRY_REQUIRED_SYMBOL . '</span>'; ?></td></tr>

		</table>
		
		<label for="desc">Please explain your customized gift:</label>
<?php echo zen_draw_textarea_field('desc', 20, 10, zen_output_string_protected($desc), 'id="desc"'); ?>

</fieldset>




<div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?></div>
<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>

<br class="clearBoth" />
</div>
</form>

<?php
  }
?>
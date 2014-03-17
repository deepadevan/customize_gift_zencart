### SAMPLE CUSTOM FORM
###
### Customize Gift Form
###
### Designed for Zen Cart v1.3.x and newer
###
###########################
### 
### This example simply collects a number of fields of information 
### and emails them to the store owner after validation
###
### It is intended as an example from which to base additional forms if desired.
###
### More thorough field validation including javascript notices etc could be added as enhancements.
###
###########################
### Use at own risk. Do not install on live site until tested thoroughly in a test environment.
### No warranties applied or implied.

Installation
------------
1. Unzip the files while retaining the included file structure.
2. In the includes/templates folder, rename the YOURTEMPLATE folder to match the name of your custom template.
3. Upload the files to your site.
4. You can access the form by going to your store and entering www.yourdomain.com/index.php?main_page=customize_gift
   (the key is:   index.php?main_page=customize_gift )

CUSTOMIZING
-----------
1. If you wish to add the Band Signup link to your "Information Sidebox":
   Edit the /includes/modules/sideboxes/YOURTEMPLATE/information.php file and add this where you want the link to show:

      $information[] = '<a href="' . zen_href_link(FILENAME_CUSTOMIZE_GIFT) . '">' . SIDEBOX_LINK_TEXT_CUSTOMIZE_GIFT . '</a>';

2. If you wish to have form data emailed to someplace other than the store's default address, 
   you may edit the includes/languages/english/customize_gift.php file and insert your desired
   alternate email address instead:
   
   define('SEND_TO_ADDRESS', STORE_OWNER_EMAIL_ADDRESS);
   would be changed to:
   define('SEND_TO_ADDRESS', 'myemailaddress@mydomain.com');

3. If you wish to alter the styling of the page, there is a customize_gift.css file in 
   the /includes/templates/YOURTEMPLATE/css folder. Change it as you desire.
   

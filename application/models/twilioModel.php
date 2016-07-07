<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Services/Twilio.php'); 

class TwilioModel extends CI_Model {
	function text_message(){
	$account_sid = 'AC2abf300f0bc0cf240ed8f73516301e27'; 
	$auth_token = 'fef9a83636cb9e37b096cd71bac4b2a3'; 
	$client = new Services_Twilio($account_sid, $auth_token); 

	$client->account->messages->sendMessage( 
		"+16692363614",
		"+15102098634", 
		"TEST" 
	);
	return true;

	}
}
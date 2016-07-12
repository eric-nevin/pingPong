<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Services/Twilio.php'); 

class TwilioModel extends CI_Model {

	function get_user($id){
		$query = "SELECT * FROM users WHERE id = ?";
		return $this->db->query($query, $id)->row_array();
	}
	function text_message($texted_info, $user_info){
		$challenger = $user_info['first_name']. " " .$user_info['last_name'];
		$account_sid = 'AC2abf300f0bc0cf240ed8f73516301e27'; 
		$auth_token = 'fef9a83636cb9e37b096cd71bac4b2a3'; 
		$client = new Services_Twilio($account_sid, $auth_token);
		$texted_number = $texted_info['phone_number'];
		// var_dump($user_info);
		// var_dump($texted_number);
		// var_dump($challenger);
		// die();
		if ($texted_info['availability'] == 1){
			$client->account->messages->sendMessage( 
				"+16692363614",
				"+15102098634", 
				$challenger. " " ."Has challenged you to a game of ping pong!" 
			);
			return true;
		} else {
			return false;
		}

	}
}
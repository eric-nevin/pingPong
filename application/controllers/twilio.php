<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twilio extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		// Load the library, call by the name of the
		// helper that you put the above function in to
		$this->load->helper('my-twilio-helper');  // references library/my-twilio-helper.php	}


		// Request the service object
		$service = get_twilio_service();

		// make a call
		try {
		$service->account->calls->create(
				'4150000000', // from this number
				'4150000000', // to this number
				site_url('/twiml/call') // callback url
			);
		}
		catch (Exception $e) {
	// handle any error conditions here
	}
}
?>




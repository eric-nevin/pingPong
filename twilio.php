<?php
 
// ==== Control Vars =======
$strFromNumber = "+15005550006";
$strToNumber = "+15102098634";
$strMsg = "Did you catch Olivier's nip slip last night? OMG right?"; //Olivier accidentally pulled up a porn site on a projector 
$aryResponse = array();
 
    // include the Twilio PHP library - download from 
    // http://www.twilio.com/docs/libraries/
    require_once ("Services/Twilio.php");
 
    // set our AccountSid and AuthToken - from www.twilio.com/user/account
    $AccountSid = "ACe95e64d3a1613bc32d947bb8be176772";
    $AuthToken = "f9e8ef6229fff2e691019d00faddad4c";
 
    // ini a new Twilio Rest Client
    $objConnection = new Services_Twilio($AccountSid, $AuthToken);
    // Send a new outgoinging SMS by POSTing to the SMS resource */
    $bSuccess = $objConnection->account->sms_messages->create(
        
        $strFromNumber, 	// number we are sending From 
        $strToNumber,           // number we are sending To
        $strMsg			// the sms body
    );
		
    $aryResponse["SentMsg"] = $strMsg;
    $aryResponse["Success"] = true;
    
    
    echo json_encode($aryResponse);
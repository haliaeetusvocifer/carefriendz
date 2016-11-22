<?php
	
	/* Input Cleansing/Sterilization */
	function protect($string){
		$string = htmlentities(trim($string ), ENT_QUOTES, 'UTF-8') ;
		return $string;
	}
	function protectNoUTF8($string){
		$string = htmlentities(trim($string ), ENT_QUOTES) ;
		return $string;
	}
	function protectPlain($string){
		$string = htmlentities(trim($string )) ;
		return $string;
	}
	function protectNoTrim($string){
		$string = htmlentities($string , ENT_QUOTES, 'UTF-8') ;
		return $string;
	}
	function noProtect($string){
		return trim($string ) ;
	}
	function protectExactText($str){
		$str = protectNoTrim($str);
		return keepStringForm($str) ;
	}
	function decodeURLEncodedString($string){
		return rawurldecode($string) ;
	}

	/* Other */
	function genRandomString($length = 4, $characters = '0123456789'){
		$string = '';
		for ($p = 0; $p < $length; $p++) {
			$string .= $characters[mt_rand(0, strlen($characters) - 1)];
		}
		
		return $string;
	}
	function generateViewCode($DB_con, $donor_email){
		$view_code = genRandomString(4);
		$chkem = checkViewCode($DB_con, $donor_email, $view_code) ;
		while($chkem === true){ 
			$view_code = genRandomString(4);
			$chkem = checkViewCode($DB_con, $donor_email, $view_code) ;
		}
		return $view_code ;
	}
	
	function checkViewCode($DB_con, $donor_email, $view_code){
		$stmt = $DB_con->prepare('SELECT itemID, itemName FROM tbl_items WHERE itemMail = :donor_email AND viewCode = :view_code ');
		$stmt->execute(array(':donor_email' => $donor_email, ':view_code' => $view_code));
		
		if($stmt->rowCount() > 0){
			return true;
		}
		return false;
	}
	
	function fetchItemDetails($DB_con, $donor_email, $view_code){
		$stmt = $DB_con->prepare('SELECT * FROM tbl_items WHERE itemMail = :donor_email AND viewCode = :view_code ');
		$stmt->execute(array(':donor_email' => $donor_email, ':view_code' => $view_code));
		
		if($stmt->rowCount() > 0){
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			return $row;
		}
		return false;
	}

	function fetchItemDetailsByID($DB_con, $item_id){
		$stmt = $DB_con->prepare('SELECT * FROM tbl_items WHERE itemID = :item_id');
		$stmt->execute(array(':item_id' => $item_id));
		
		if($stmt->rowCount() > 0){
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			return $row;
		}
		return false;
	}
	
	function fetchItemRequests($DB_con, $item_id){
		$stmt = $DB_con->prepare('SELECT * FROM claimcontact WHERE item_id = :item_id ');
		$stmt->execute(array(':item_id' => $item_id));
		
		if($stmt->rowCount() > 0){
			$res_array = array();
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$res_array[] = $row;
			}
			return $res_array;
		}
		return false;
	}
	
	function fetchSingleItemRequestInfo($DB_con, $request_id){
		$stmt = $DB_con->prepare('SELECT * FROM claimcontact WHERE id = :request_id ');
		$stmt->execute(array(':request_id' => $request_id));
		
		if($stmt->rowCount() > 0){
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			return $row;
		}
		return false;
	}
	
	function updateDescription($DB_con, $item_id, $new_description){
		
		$stmt = $DB_con->prepare('UPDATE tbl_items SET itemDescription = :new_description WHERE itemID = :item_id');
		
		if($stmt->execute(array(':new_description' => $new_description, ':item_id' => $item_id))){
			return true;
		}
		return false;
	}
	
	function confirmClaim($DB_con, $request_id, $item_id){
		
		$stmt = $DB_con->prepare('UPDATE tbl_items SET claimStatus = :status WHERE itemID = :item_id');
		
		if($stmt->execute(array(':status' => 1, ':item_id' => $item_id))){
			
			$stmt2 = $DB_con->prepare('UPDATE claimcontact SET status = :status WHERE id = :request_id AND item_id = :item_id');
			
			if($stmt2->execute(array(':request_id' => $request_id, ':item_id' => $item_id, ':status' => 1))){
				return true;
			}
		}
		return false;
	}
	
	function getOtherClaimantsEmail($DB_con, $claim_item_id){
		$stmt = $DB_con->prepare('SELECT fname, email FROM claimcontact WHERE item_id = :claim_item_id AND status = :status');
		$stmt->execute(array(':claim_item_id' => $claim_item_id, ':status' => 0));
		
		if($stmt->rowCount() > 0){
			$res_array = array();
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$res_array[] = $row;
			}
			return $res_array;
		}
		return false;
	}
	
	function sendNoticeOfRequestEmailToDonor($donor_email, $item_name){
				
		//email notification start
		$subject = "Notice of New Claim Request" ;
		$message = "Dear Donor,
		
		We have received a request for your item (".$item_name.").
		
		Go to the 'Donors' >> 'View Recipient' Page on our website to view the request details.
		
		Thank you.
		
		We hope to see you again soon on Carefriendz.
		
		Care Advance is a platform under carefriendz.
		
		For more information about us and our services , please connect with us online though the following media;
		
		Facebook: www.facebook.com/
		Twitter: 
		Email: info@carefriendz.com.ng
		Website: www.carefriendz.com
		Phone: +234 703 355 4128 | 
		
		";
		
		$headers = "From: no-reply@carefriendz.com.ng" . "\r\n";
		
		if(mail($donor_email, $subject, $message, $headers)){
			return true;
		}
		
		return false;
	}
	
	function sendConfirmEmailToDonor($contactmail, $c_array){
		
		extract($c_array);
		
		//email notification start
		$subject = "You have confirmed a Claim Request" ;
		$message = "Dear Donor,
		
		You have confirmed a request for your item.
		
		Find the details of the claimant requesting for the items so you can call the person to come collect the item.
		
		CLAIMANT DETAILS:
		
		Name: ".$c_name."
		Location: ".$c_location."
		Phone Number: ".$c_phone."
		Gender: ".$c_gender."
		Reason: ".$c_reason."
		Email: ".$c_email."
		
		Thank you.
		
		We hope to see you again soon on Carefriendz.
		
		Care Advance is a platform under carefriendz.
		
		For more information about us and our services , please connect with us online though the following media;
		
		Facebook: www.facebook.com/
		Twitter: 
		Email: info@carefriendz.com.ng
		Website: www.carefriendz.com
		Phone: +234 703 355 4128 | 
		
		";
		
		$headers = "From: no-reply@carefriendz.com.ng" . "\r\n";
		
		if(mail($contactmail, $subject, $message, $headers)){
			return true;
		}
		
		return false;
	}
	
	
	function sendConfirmEmailToClaimant($contactmail, $d_array){
		
		extract($d_array);
		
		//email notification start
		$subject = "Claim Request Confirmed" ;
		$message = "Dear ".$c_fname.",
		
		The donor has accepted and confirmed your request for the item.
		
		Item Name: ".$d_item_name."
		
		Contact the Donor to collect the Item.
		
		DONOR EMAIL: ".$d_email."
		
		Thank you.
		
		We hope to see you again soon on Carefriendz.
		
		Care Advance is a platform under carefriendz.
		
		For more information about us and our services , please connect with us online though the following media;
		
		Facebook: www.facebook.com/
		Twitter: 
		Email: info@carefriendz.com.ng
		Website: www.carefriendz.com
		Phone: +234 703 355 4128 | 
		
		";
		
		$headers = "From: no-reply@carefriendz.com.ng" . "\r\n";
		
		if(mail($contactmail, $subject, $message, $headers)){
			return true;
		}
		
		return false;
	}
	
	function sendClosureEmailToUnsuccessfulClaimant($contactmail, $d_array){
		
		extract($d_array);
		
		//email notification start
		$subject = "Claim Request Not Confirmed" ;
		$message = "Dear ".$c_fname.",
		
		The donor did not accept/confirm your request for the item.
		
		Item Name: ".$d_item_name."
		
		Please kindly check and request for another item.
		
		Thank you.
		
		We hope to see you again soon on Carefriendz.
		
		Care Advance is a platform under carefriendz.
		
		For more information about us and our services , please connect with us online though the following media;
		
		Facebook: www.facebook.com/
		Twitter: 
		Email: info@carefriendz.com.ng
		Website: www.carefriendz.com
		Phone: +234 703 355 4128 | 
		
		";
		
		$headers = "From: no-reply@carefriendz.com.ng" . "\r\n";
		
		if(mail($contactmail, $subject, $message, $headers)){
			return true;
		}
		
		return false;
	}
	
?>
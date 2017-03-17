<?php
/**
 * Author: Kanchan Khatri
 * This is the Common_helper class which is included in the auto_load of Base provided by autoload_common file.
 * This class is available globaly in the app to use common functions.
 * This extends Base as their properties like loading modules might be used by common functions.
 */

use App\Classes\Core\Base;

Class Common_helper extends Base {

/**
 * fn: valid_ticket
 * @param $ticket -  either array of tickets objects or associative array of tickets .
 * @return boolean .
 */
	public function valid_ticket($ticket){
		if(is_array($ticket)){
			if(!empty($ticket['source']) && !empty($ticket['destination'])){
				return true;
			}
		} else if(is_object($ticket)){
			if($ticket->source!='' && $ticket->destination!=''){
				return true;
			}
		}
		return false;
	}
/**
 * fn: show_error
 * @param string $msg -  error msg, boolean return.
 * @returns $response Array or Prints response. .
 */
	public function show_error($msg, $return = true){
		$response['status']='fail';
		$response['msg']=$msg;
		if($return)
			return $response;
		print_r($response);
	}
}
<?php
/**
 * Author: Kanchan Khatri
 * This is the Sorter class which will provide helper functions to custom sort the entities.
 * sort_tickets - will sort the unorganized boarding tickets by source and destination.
 */

Class Sorter {
	// sorted_tickets  will be used as an array which will include the passes in sorted order of source and destination.
	protected static $sorted_tickets = array();
	
	protected static $tickets = array();		
	protected static $temp = array();
	/** sort_tickets - will sort the unorganized boarding tickets by source and destination.
		@param $tickets  - array of ticket objects input.
	*/
	public static function sort_tickets($tickets) {
	    self::$tickets = $tickets;    	    
	    if (count(self::$sorted_tickets) == 0) {
	        array_push(self::$sorted_tickets, array_shift(self::$tickets));
	    }    
	    foreach (self::$tickets as $key => $item) {
	      if (!$item->source || !$item->destination) {	      	
	        throw new Exception("Invalid $item->transport Ticket Format");
	      }
	      $source = reset(self::$sorted_tickets);
	      $source = $source->source;	      
	      $destination = end(self::$sorted_tickets);
	      $destination = $destination->destination;	      
	      if ($destination == $item->source || $source == $item->destination) {	        
	        if ($item->source == $destination) {
	          array_push(self::$sorted_tickets, $item);
	        }	        
	        if ($item->destination == $source) {
	          array_unshift(self::$sorted_tickets, $item);
	        }	        
	        if (isset(self::$temp[$key])) {
	          unset(self::$temp[$key]);
	        }        
	      }
	      else {
	        array_push(self::$temp, $item);
	      }
	    }    
	    if (count(self::$temp) > 0) {
	      self::sort_tickets(self::$temp);
	    }    
	    return self::$sorted_tickets;
  	}
}
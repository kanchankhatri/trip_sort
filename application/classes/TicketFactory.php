<?php
/**
 * Author: Kanchan Khatri
 * TicketFactory Class - creates the Tickets objects for various modes of transport.
 */

use App\Classes\core\Base;
use App\Classes\GenericTicket;

abstract class TicketFactory extends Base {
    
    /**
     * Creates Ticket instance from ticket array provided.
     * @return TicketObject - Object of class GenericTicket If transport is not defined else {transport}Ticket object where transport can be bus, flight etc.
     * @param array $ticket
     */    
    public static function create($ticket) {            
      try {
        if (!isset($ticket['transport'])) {
          $obj = new GenericTicket($ticket);                    
        } else {          
          
            $class = ucfirst($ticket['transport']) . 'Ticket';            
            if(class_exists($class,true)){
              $obj = new $class($ticket);
            } else {                            
              $obj = new GenericTicket($ticket);
            }
            return $obj;                    
        }
        }
          catch (Exception $e) {            
            die(self::$helper_objects['common_helper']->show_error($e->getMessage(),false));
          }
      } 
    
    /*
    This will import the input json file of tickets in assets/ dir which is paralled to application/ dir.
    *@return - array of Ticket Objects.
    */      
    public static function import($ticket_file_json) {
      /*      
      if(empty($ticket_file))
        throw new Exception('Importing File not found! ' . $e);      
      else {
        // then use the type like PlaneCard, BusCard, MetroCard, TaxiCard
        try {
          $import_json = ASSETS_DIR.$ticket_file_json;
          $tickets_arr = json_decode(file_get_contents($import_json));
          $tickets = array();
          foreach ($tickets_arr as $key => $value) {
            $tickets[] = self::create($value);
          }
        }
        catch (Exception $e) {
          throw new Exception( 'Ticket' . ' class not found! ' . $e);
        }
        return $tickets;
      }
      */
    }
}

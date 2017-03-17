<?php
/**
 * Author: Kanchan Khatri
 * Generic Class - Generic Ticket initiated for tickets if transport is not defined or transport class {Transport}Ticket is not found.
 * Inherited From Ticket Class.
 */

namespace App\Classes;
use Exception;

use App\Classes\TicketAbstract;


class GenericTicket extends TicketAbstract {
  
  /**
   * Seat number of the ticket.
   */
  protected $seat;
  
  /**
   * Constructor for the GenericTicket class.
   * @param array of ticket
   */
  function __construct(array $ticket) {    
    parent::__construct();
    $this->auto_load();    
    $this->transport      = isset($ticket['transport'])?strtolower($ticket['transport']):'generic';
    if($this->common_helper->valid_ticket($ticket)){
      $this->source       = strtolower($ticket['source']);
      $this->destination  = strtolower($ticket['destination']);
      $this->seat         = isset($ticket['seat'])?$ticket['seat']:'';      
      return $this;
    } 
    throw new Exception('Invalid '.ucfirst($this->transport).' Ticket Format');
  }
}

<?php
/**
 * Author: Kanchan Khatri
 * Generic Class - Generic Ticket initiated for tickets if transport is not defined or transport class {Transport}Ticket is not found.
 * Inherited From Ticket Class.
 */

namespace App\Classes;
// use Exception;

use App\Classes\TicketAbstract;


class GenericTicket extends TicketAbstract {

  /**
   * Seat number of the ticket.
   */
  protected $seat;
  
  /**
   * Constructor for the GenericTicket class.
   * @param associative array of ticket with property as key value pair
   * @return {Transporttype}Ticket i.e., GenericTicket Object
   */
  function __construct(array $ticket) {    
    parent::__construct($ticket);    
    $this->source       = strtolower($ticket['source']);
    $this->destination  = strtolower($ticket['destination']);
    $this->seat         = isset($ticket['seat'])?$ticket['seat']:'';      
    return $this;    
  }
}

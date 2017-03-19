<?php
/**
 * Author: Kanchan Khatri
 * FlightTicket Class - Flight Ticket.
 * Inherited From Ticket Class.
 */

use App\Classes\TicketAbstract;

class FlightTicket extends TicketAbstract {
  /**
   * Seat number.
   */
  protected $seat;
  /**
   * Flight number.
   */
  protected $flight_no;
  /**
   * Baggage Info of the ticket.
   */
  protected $baggage;
  /**
   * gate number in the ticket.
   */
  protected $gate;
  
  /**
   * Constructor for the FlightTicket class.
   * @param associative array of ticket with property as key value pair
   * @return {Transporttype}Ticket i.e., FlightTicket Object
   */
  function __construct(array $ticket) {
    parent::__construct($ticket);    
    $this->seat         = isset($ticket['seat'])?$ticket['seat']:'';
    $this->flight_no         = (isset($ticket['flight_no'])?$ticket['flight_no']:'');
    $this->baggage         = isset($ticket['baggage'])?$ticket['baggage']:'';
    $this->gate         = isset($ticket['gate'])?$ticket['gate']:'';    
    return $this;    
  }
}

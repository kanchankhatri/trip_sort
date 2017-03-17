<?php
/**
 * Author: Kanchan Khatri
 * FlightTicket Class - Flight Ticket.
 * Inherited From Ticket Class.
 */

use App\Classes\Ticket;

class FlightTicket extends Ticket {
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
   * @param array of flight ticket
   */
  function __construct(array $ticket) {
    parent::__construct();
    $this->auto_load();      
    if($this->common_helper->valid_ticket($ticket)){
      $this->source       = strtolower($ticket['source']);
      $this->destination  = strtolower($ticket['destination']);
      $this->transport      = isset($ticket['transport'])?$ticket['transport']:'';
      $this->seat         = isset($ticket['seat'])?$ticket['seat']:'';
      $this->flight_no         = (isset($ticket['flight_no'])?$ticket['flight_no']:'');
      $this->baggage         = isset($ticket['baggage'])?$ticket['baggage']:'';
      $this->gate         = isset($ticket['gate'])?$ticket['gate']:'';    
      return $this;
    }
    throw new Exception('Invalid Flight Ticket Format');
  }
}

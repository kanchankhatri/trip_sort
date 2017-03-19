<?php
/**
 * Author: Kanchan Khatri
 * TrainTicket Class - Train Ticket.
 * Inherited From Ticket Class.
 */

use App\Classes\TicketAbstract;


class TrainTicket extends TicketAbstract {
  
  /**
   * Seat number of the ticket.
   */
  protected $seat;
  /**
   * Train no. of the ticket.
   */  
  protected $train_no;

  
  /**
   * Constructor for the TrainTicket class.
   * @param associative array of ticket with property as key value pair
   * @return {Transporttype}Ticket i.e., TrainTicket Object
   */
  function __construct(array $ticket) {
    parent::__construct($ticket);
    // $this->auto_load();        
    // if($this->common_helper->valid_ticket($ticket)){
      // $this->source       = strtolower($ticket['source']);
      // $this->destination  = strtolower($ticket['destination']);
      // $this->transport      = isset($ticket['transport'])?strtolower($ticket['transport']):'';
      $this->seat         = isset($ticket['seat'])?$ticket['seat']:'';
      $this->train_no         = (isset($ticket['train_no'])?$ticket['train_no']:'');      
      return $this;
    // }
    // throw new Exception('Invalid Train Ticket Format');
  }
}

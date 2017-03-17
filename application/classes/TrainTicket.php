<?php
/**
 * Author: Kanchan Khatri
 * TrainTicket Class - Train Ticket.
 * Inherited From Ticket Class.
 */

use App\Classes\Ticket;


class TrainTicket extends Ticket {
    
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
   * @param array of train ticket
   */
  function __construct(array $ticket) {
    parent::__construct();
    $this->auto_load();        
    if($this->common_helper->valid_ticket($ticket)){
      $this->source       = strtolower($ticket['source']);
      $this->destination  = strtolower($ticket['destination']);
      $this->transport      = isset($ticket['transport'])?$ticket['transport']:'';
      $this->seat         = isset($ticket['seat'])?$ticket['seat']:'';
      $this->train_no         = (isset($ticket['train_no'])?$ticket['train_no']:'');      
      return $this;
    }
    throw new Exception('Invalid Train Ticket Format');
  }
}

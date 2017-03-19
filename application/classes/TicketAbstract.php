<?php
/**
 * Author: Kanchan Khatri
 * Ticket Class - Ticket includes common ticket params like source, destination, transport.
 * Inherited By Other Ticket classes of various transports.
 */

namespace App\Classes;
use App\Classes\core\Base;
use Exception;
// use App\Classes\core\TicketAbstract;

abstract class TicketAbstract extends Base {
  /**
   * Ticket Source
   */
  protected $source;
  /**
   * Ticket Destination.
   */
  protected $destination;
  
  /**
   * Mode of Transport.
   */
  protected $transport;
  
  /**
   * Constructor for the TicketAbstract class. 
   * @param associative array of ticket with property as key value pair   
   * Checks validity of ticket array else throws an exception.
  */
  function __construct($ticket) {
    parent::__construct();
    $this->auto_load();     
    if($this->common_helper->valid_ticket($ticket)) {
      $this->source       = strtolower($ticket['source']);
      $this->destination  = strtolower($ticket['destination']);
      $this->transport      = isset($ticket['transport'])?strtolower($ticket['transport']):'generic';
    } else {
      throw new Exception('Invalid '.ucfirst($ticket['transport']).' Ticket Format');
    }
  }
  
  /**
   * Magic Function
   * @param string $property
   */
  public function __get($property)
  {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }
}

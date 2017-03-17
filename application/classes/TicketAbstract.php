<?php
/**
 * Author: Kanchan Khatri
 * Ticket Class - Ticket includes common ticket params like source, destination, transport.
 * Inherited By Other Ticket classes of various transports.
 */

namespace App\Classes;
use App\Classes\core\Base;

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
  
  // /**
  //  * Constructor for the CommonCard class.  
  //  */
  function __construct() {
    parent::__construct();
    $this->auto_load(); 
  }
  
  /**
   * PHP Magic getter
   * @param string $property 
   */
  public function __get($property)
  {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  } 
}

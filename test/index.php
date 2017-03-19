<?php
/**
 * Simple Test File
 */

require_once __DIR__ . '/../application/autoload.php';  

echo PHP_EOL . 'Test Cases' . PHP_EOL;
echo '-----------------------' . PHP_EOL; 

  // sample tickets unordered.
$sample_tickets[0]=array('source'=>'Stockholm','destination'=>'new_york_jfk','transport'=>'flight','seat'=>'7B','flight_no'=>'SK22','gate'=>'22','baggage'=>'automatically transferred from your last leg');  
$sample_tickets[1]=array('source'=>'barcelona','destination'=>'gerona_airport','transport'=>'bus');
$sample_tickets[2]=array('source'=>'madrid','destination'=>'barcelona','transport'=>'train','seat'=>'45B','train_no'=>'78A');
$sample_tickets[3]=array('source'=>'gerona_airport','destination'=>'stockholm','transport'=>'flight','seat'=>'3A','flight_no'=>'SK455','gate'=>'45B','baggage'=>'ticket counter 344');

/*
*Test: This will test all the tickets created based on their transport.
*Each ticket will be an instance of its associated transport class
*If info of transport is missing or transportTicket class file is missing, that ticket will be an instance of GenericTicket 
*Array of tickets above cover all possible cases.
*If the ticket is of invalid format, it will result the array with status fail and error message.
*/
// Array of Ticket Objects
$tickets = array();

echo 'Ticket Creation Test: Tickets Instances check'.PHP_EOL;
foreach ($sample_tickets as $key => $value) {
  $obj = TicketFactory::create($value);
  if($value['transport']!=''){
    $class = ucfirst($value['transport']).'Ticket';
    if(class_exists($class,true)){
      if ($obj instanceof $class){
        echo 'PASS: ' . ucfirst($value['transport']) .' ticket should be an instance of '.$class.' class' . PHP_EOL;          
      } else {
        echo 'Fail: ' . ucfirst($value['transport']) .' ticket is not an instance of '.$class.' class' . PHP_EOL;
      }
    } else  if ($obj instanceof GenericTicket) {
      echo 'PASS: ' . ucfirst($value['transport']) .'Ticket class is not defined, so '.$value['transport'].' ticket  should be an instance of GenericTicket' . PHP_EOL;
    } else {
      echo 'FAIL: ' . ucfirst($value['transport']) .' ticket is not an instance of '.$class.' class' . PHP_EOL;
    }
  } else if ($obj instanceof GenericTicket) {
    echo 'PASS: ' . $value['transport'] .' should be an instact of GenericTicket' . PHP_EOL;
  }

  $tickets[] = $obj;
}
/*
*Test: This will test the sorting of the tickets
*$tickets - array of Ticket objects sorted below in $sorted_tickets_assert
*sorted_tickets_assert is compared to the response of Trip arrange_tickets.
*sorted_tickets_assert and $sorted_tickets_arr are now compared.
*/

echo PHP_EOL.'Sort Tickets Test: Tickets should be sorted'.PHP_EOL;
$sorted_tickets_assert[0] = $tickets[2];
$sorted_tickets_assert[1] = $tickets[1];
$sorted_tickets_assert[2] = $tickets[3];
$sorted_tickets_assert[3] = $tickets[0];
$trip_obj = new Trip($tickets);
$sorted_tickets_arr = $trip_obj->arrange_tickets('array');
if($sorted_tickets_arr === $sorted_tickets_assert){
  echo 'PASS: Array of Tickets objects are sorted.'.PHP_EOL;
} else {
  echo 'FAIL: Array of Tickets objects are not sorted.'.PHP_EOL;
}
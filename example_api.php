<?php
/**Author: Kanchan Khatri
 * This is the example usage of the API. Input - Associative Array of Tickets
 * Steps to perform: 
 * 1. Create an Array of TicketFactory Objects. Each TicketFactory Object is the Ticket formed from the assoc array of Ticket.
 * 2. Pass Array of TicketFactory Objects to Trip.
 * 3. call Trip fn - arrange_tickets which will output the response.
 */

require_once 'application/autoload.php';
// sample tickets
// $tickets[2]=array('source'=>'madrid','destination'=>'barcelona','transport'=>'train','seat'=>'45B','train_no'=>'78A');
// $tickets[1]=array('source'=>'barcelona','destination'=>'gerona_airport','transport'=>'bus');
// $tickets[3]=array('source'=>'gerona_airport','destination'=>'stockholm','transport'=>'flight','seat'=>'3A','flight_no'=>'SK455','gate'=>'45B','baggage'=>'ticket counter 344');
// $tickets[0]=array('source'=>'Stockholm','destination'=>'new_york_jfk','transport'=>'flight','seat'=>'7B','flight_no'=>'SK22','gate'=>'22','baggage'=>'automatically transferred from your last leg');


// // create Ticket Objects and assign in an array,
// foreach ($tickets as $key => $ticket) {

// 	$ticket_arr[] =  TicketFactory::create($ticket);
// }

// defaul trip class - no array of objects passed, on constuctor level, it will read json file and generate array of objects.
$t = new Trip();
$response = $t->arrange_tickets();
if($response['status']=='success')
	echo $response['msg'];
else	
	echo 'Error In Sorting Tickets - '.$response['msg'];
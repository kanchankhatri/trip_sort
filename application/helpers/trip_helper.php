<?php
/**
 * Author: Kanchan Khatri
 * This is the Trip_helper class which will provide helper functions to organize or get Trip info.
 */

Class Trip_helper {	
/**
 * fn: generate_trip_html
 * @param $plan which is array of tickets objects.
 * passing sorted array of tickets objects in $plan here will return the planned iternary in html.
 * @return plain html response of tickets.
 */

  function generate_trip_html($plan){  	
  	$plan_li = '';
  	foreach ($plan as $ticket) {
        switch (strtolower($ticket->transport)) {
            case "train":
                    $plan_li .= '<li>Take train '.$ticket->train_no.' from '.$ticket->source.' to '.$ticket->destination.'.';
                    if($ticket->seat!='') {                    	
                        $plan_li .= ' Sit in seat '.$ticket->seat.'.';
                    }
                    $plan_li .= '</li>';
                    break;
                case "bus":
                    $plan_li .= '<li>Take the bus from '.$ticket->source.' to '.$ticket->destination.'.';
                    if($ticket->seat!='')
                        $plan_li .= ' Sit in seat '.$ticket->seat.'.</li>';
                    else
                        $plan_li .= ' No seat assignment.'.'</li>';
                    break;
                case "flight":
                    $plan_li .= '<li>From '.$ticket->source.', take flight '.$ticket->flight_no.' to '.$ticket->destination.'.';
                    if($ticket->seat!='')
                        $plan_li .= ' Seat: '.$ticket->seat.'.';
                    if($ticket->gate!='')
                        $plan_li .= ' Gate: '.$ticket->gate.'.';
                    if($ticket->baggage!='')
                        $plan_li .= ' Baggage Drop: '.$ticket->baggage.'.';
                    $plan_li .= '</li>';
                    break;
                Default :
                    $plan_li .= '<li>Source:'.$ticket->source.', Destination:'.$ticket->destination;
                    if($ticket->seat!='')
                        $plan_li .= ' Seat: '.$ticket->seat.'.';
                    if($ticket->transport!='')
                        $plan_li .= ' Transport: '.$ticket->transport.'.';                    
                    $plan_li .= '</li>';
                    break;
        }
    }
    return $plan_li;
  }
}
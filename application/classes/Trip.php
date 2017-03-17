<?php
/**
 * Author: Kanchan Khatri
 * Trip class - plans, creates, sorts, provides info of a Trip
 * @param initializing requires - array of objects of tickets.
 * objects of tickets created by TicketFactory
 */

use App\Classes\Core\Base;
use App\Classes\TicketFactory;

class Trip extends Base {
	/*
    tickets - array of ticket objects.
    */
    protected $tickets;
    
    function __construct(array $tickets) {
        parent::__construct();
        $this->auto_load();
        $this->tickets = $tickets;
        foreach ($tickets as $key => $value) {            
            if(!$this->common_helper->valid_ticket($value)){
                $transport = isset($value->transport)?$value->transport:'';
                return ($this->common_helper->show_error('Invalid '. ucfirst($transport).' Ticket Format'));
            }
        }
    }
    /**
    * fn: arrange_tickets
    * @param $response_type string.
    * sorts the unorganized array of tickets object to organized planned iternary
    * @return array of tickets object sorted in order of source and destination.
    */

    public function arrange_tickets($response_type='html') {
        $this->load_helper('sorter');
        $data['plan'] = $this->sorter->sort_tickets($this->tickets);
        if(strtolower($response_type) == 'json'){
        	/*process array of objects to return json*/
        	
        } else {
        	$html = $this->load_view('ticket_sort',$data,true);
        	$res['status']='success';
        	$res['msg'] = $html;
        	return $res;
    	}
    }

    /**
    * fn: trip_cost - process total trip and returns cost
    */
    public function trip_cost(){

    }
    public function trip_duration(){

    }
    public function plan_iternary(){

    }
}
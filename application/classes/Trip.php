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
    
    function __construct(array $tickets = array()) {
        parent::__construct();
        $this->tickets = array();
        $ticket_arr=array();
        $this->auto_load();        
        if(empty($tickets)){            
            $tickets_arr = json_decode(file_get_contents(ASSETS_DIR.'tickets.json'),true);                        
            foreach ($tickets_arr as $key => $value) {
                $tickets[] =  TicketFactory::create($value);                
            }            
        }
        $this->tickets = $tickets;        
        foreach ($tickets as $key => $value) {
            if(!$this->common_helper->valid_ticket($value)){
                $transport = isset($value->transport)?$value->transport:'';                
                return ($this->common_helper->show_error('Invalid '. ucfirst($transport).' Ticket Format'));
            }
        }
    }
    
    function index(){
        if(!empty($this->tickets)){            
            $data['plan'] = $this->tickets;            
            $data['content'] = $this->load_view('ticket_sort',$data,true);
            $this->load_view('main',$data);
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
        try{
            $data['plan'] = $this->sorter->sort_tickets($this->tickets);
            $data['sorted']=true;
            $data['success']='Trip is Sorted';        
            if(strtolower($response_type) == 'json'){
            	/*process array of objects to return json*/            	
            } else if(strtolower($response_type) == 'array') {
                return $data['plan'];
            }
        } catch(Exception $e){
            $data['fail']='Error in Sorting'.$e->getMessage();        
            $data['sorted']=false;                        
        }
        $this->load_view('ticket_sort',$data);        
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
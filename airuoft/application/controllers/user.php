<?php



class User extends CI_Controller {

    
    function __construct() {
    	// Call the Controller constructor
    	parent::__construct();
    }
        
    function index() {
    		
	    	$data['main']='user/index_view';
	    	$this->load->view('template_view', $data);
    }
    
    // Generate list of available flights for the user.
    function getDepartures(){
    	//Default campus and date is defined, making "isset" check unnessesary.
    	$data = array(
    			'date' => $this->input->post('departureDate'),
    			'campus' => $this->input->post('departureCampus')
    	);
    	
    	//First we load the model
    	$this->load->model('flight_model');
    		
   		//Then we call our model's get_departures function
   		//and place our created array into a new array variable
   		$data['departures'] = $this->constructList(
   				$this->flight_model->get_departures($data)
   				);
   		
    	//Now we are prepared to call the view
    	$data['main']='user/departure_view';
    	$this->load->view('template_view', $data);
    }
    	
    // Construct an array of flights from an SQL query.
    private function constructList($departures){
    	if ($departures->num_rows() > 0){
	   		//Prepare the array that will contain the data
	   		$table = array();
	   		$table[] = array('From','Time','Date','Available', 'Select Flight');
	    		
	   		foreach ($departures->result() as $row){
	    				
    			// Allow users to select flights for a perticular time.
    			$action = anchor("user/selectFlight/". $row->id . "/", "Buy Now!");
	    				
    			$table[] = array($row->from, $row->time,$row->date,$row->available, $action);
    		}
    		return $table;
   		}
   	}	
    	
    // Generate list of available seats and allow the user to select one.
    function selectFlight($id) {
    	//First we load the model
    	$this->load->model('flight_model');
		$i = 0;
    	//Then we call our model's get_seats function and save occupipied seats.
    	foreach ($this->flight_model->get_seats($id)->result() as $row){
    		$data['seat'][$i] = $row->seat;
    		$i++;
    	}
    	
    	//Now we are prepared to call the view
    	$data['main']='user/seat_view';
    	$this->load->view('template_view', $data);					
   	}
    	
}



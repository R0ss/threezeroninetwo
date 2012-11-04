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
    
    // Generate list of flights and pass it into a flight selector view.
    function getDepartures(){
    	//Default campus and date is defined, making "isset" check unnessesary.
    	$data = array(
    			'date' => $this->input->post('departureDate'),
    			'campus' => $this->input->post('departureCampus')
    	);
    	
    	
    	//First we load the model
    	$this->load->model('flight_model');
    		
   		//Then we call our model's get_departures function
   		$departures = $this->flight_model->get_departures($data);
    		
   		//If it returns some results we continue
   		if ($departures->num_rows() > 0){
   			
   			//Prepare the array that will contain the data
    		$table = array();
    		$table[] = array('From','Time','Date','Available', 'Select Flight');
    		
   			foreach ($departures->result() as $row){
   				
   				// Allow users to select flights for a perticular time.
   				$action = anchor("user/selectFlight/". $row->date ."/". $row->time ."/", "Buy Now!");
   				
   				$table[] = array($row->from, $row->time,$row->date,$row->available, $action);
   			}
   			//Next step is to place our created array into a new array variable, 
   			//one that we are sending to the view.    			
   			$data['departures'] = $table;
    		} else {
    			// Message: No flights...
    		}
    		
    		//Now we are prepared to call the view, 
    		//passing all the necessary variables inside the $data array
    		$data['main']='user/departure_view';
    		$this->load->view('template_view', $data);
			
    	} 	
    	   
    
}



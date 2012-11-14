<?php
class Index extends CI_Controller {
    function __construct() {
    	// Call the Controller constructor
    	parent::__construct();	
    }
        
    function index() {
    		
	    	$data['main']='index/index_view';
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
    	$this->load->model('index_model');
    		
   		//Then we call our model's get_departures function
   		//and place our created array into a new array variable
   		$query = $this->index_model->get_departures($data);
   		$data['departures'] = $this->constructList($query);
   		   		
    	//Now we are prepared to call the view
    	$data['main']='index/departure_view';
    	$this->load->view('template_view', $data);
    }
    	
    // Construct an array of flights from an SQL query.
    private function constructList($departures){
    	if ($departures->num_rows() > 0){
	   		//Prepare the array that will contain the data
	   		$table = array();
	   		$table[] = array('From','Time','Date','Available', 'Click Below');
	    		
	   		foreach ($departures->result() as $row){
	    				
    			// Allow users to select flights for a perticular time.
    			$action = anchor("index/selectFlight/". $row->id . "/", "Buy Now for $20!");
	    				
    			$table[] = array($row->from, $row->time,$row->date,$row->available, $action);
    		}
    		return $table;
   		}
   	}	
    	
    // Generate list of available seats and allow the user to select one.
    function selectFlight($fid) {
    	//First we load the model
    	$this->load->model('index_model');
		//Call get_seats function in model
		$query = $this->index_model->get_seats($fid)->result();
		
		$i = 0;
    	//store occupied seats.
    	foreach ($query as $row){
    		$data['seat'][$i] = $row->seat;
    		$i++;
    	}
    	
    	//save flight ID
   		$this->session->sess_destroy();
   		$this->session->set_userdata('flightID', $fid); 
    	
    	//Now we are prepared to call the view
    	$data['main']='index/seat_view';
    	$this->load->view('template_view', $data);					
   	}
   	
   	// Collect customers information
   	function getCustomerInfo($sid){  		 
   		//get flight ID for selected flight
   		$flightID = $this->session->userdata('flightID');
   		
   		//query db for information about flight
   		$this->load->model('index_model');
   		$query = $this->index_model->get_flightInfo($flightID);

   		//Save flight data
   		$data['seatID'] = $sid;
   		$data['flightData'] = $query;
   		
   		//Now we are prepared to call the view
   		$data['main']='index/customerInfo_view';

   		$this->form_validation->set_rules('fname', 'First name', 'trim'
   																	.'|required'
   																	);
   		$this->form_validation->set_rules('lname', 'Last Name', 'trim'
   																	.'|required'
   																	);
   		$this->form_validation->set_rules('cardNumber', 'Credit card number Confirmation','trim'
   																	.'|required'
													   				.'|is_natural'
													   				.'|greater_than[0]'
													   				.'|exact_length[16]'
   																	);
   		$this->form_validation->set_rules('expirationM', 'Expiration month', 'trim'
													   				.'|required'
													   				.'|is_natural'
													   				.'|less_than[13]'
													   				.'|greater_than[0]'
													   				.'|exact_length[2]'
													   				);
   		$this->form_validation->set_rules('expirationY', 'Expiration year', 'trim'
													   				.'|required'
													   				.'|is_natural'
													   				.'|exact_length[2]'
													   				.'|greater_than[0]'
													   				.'|callback_expiry_check'
													   				);
   		
   		// Redirect user to correct form, until it satisfies the requirements
   		if ($this->form_validation->run() == FALSE){
   			$this->load->view('template_view', $data);
   		}else{	   	
   			// Store all POST data in a session
   			$this->saveCredentials($sid, $flightID);
   			
   			// Commit successful transaction to database ticket table and provide a receipt
   			$this->index_model->save_flight($flightID, $sid);
   			   			   			
   			//prevent user from inserting duplicate tickets via resfresh
   			redirect('index/load_receipt');
   		}	
   	}
   	
   	//Verify the card is not expired
   	function expiry_check(){
   		//current time
   		$time = time();
   		$expM = $this->input->post('expirationM');
   		$expY = $this->input->post('expirationY');
   		//Combining the year and month into a decimal value makes comparison easier
   		if( (($expM/12) + $expY) > ((mdate("%m", $time)/12) + mdate("%y", $time)) ){
   			return true;
   		} else {
   			$this->form_validation->set_message('expiry_check', 'The credit card is expired.');
   			return false;
   		}
   	}
   	
   	// Saves all POST data before redirect clears it.
   	function saveCredentials($sid, $flightID){
   		$this->session->set_userdata('seat', $sid );
   		$this->session->set_userdata('flightID', $flightID );
   		$this->session->set_userdata('fname', $this->input->post('fname'));
   		$this->session->set_userdata('lname', $this->input->post('lname'));
   		$this->session->set_userdata('cardNumber', $this->input->post('cardNumber'));
   		$this->session->set_userdata('expirationM', $this->input->post('expirationM'));
   		$this->session->set_userdata('expirationY', $this->input->post('expirationY'));	 
   	}
   	
   	// Save transaction and provide receipt to user
   	function load_receipt(){
   		$flightID = $this->session->userdata('flightID');
   		
   		//query db for information about flight
   		$this->load->model('index_model');
   		$query = $this->index_model->get_flightInfo($flightID);
   		$data['flightData'] = $query;
   		
   		$data['main']='index/customerReceipt_view';
   		$this->load->view('template_view', $data);
   	}
}
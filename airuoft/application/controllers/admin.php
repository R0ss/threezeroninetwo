<?php
class Admin extends CI_Controller {
    
    function __construct() {
    	// Call the Controller constructor
    	parent::__construct();
    }
        
    function index() {
    		
	    	$data['main']='admin/admin_view';
	    	$this->load->view('template_view', $data);
    }
    
    // Display flight table from database
	function showFlights()
    {
		//First we load the library and the model
		$this->load->model('admin_model');
		
		//Then we call our model's get_flights function
		$flights = $this->admin_model->get_flights();

		//If it returns some results we continue
		if ($flights->num_rows() > 0){
		
			//Prepare the array that will contain the data
			$table = array();	
	
			$table[] = array('From','To','Time','Date','Available');
		
		   foreach ($flights->result() as $row){
		   		//Insert query data into table, row by row
				$table[] = array($row->from,$row->to,$row->time,$row->date,$row->available);
		   }
			$data['flights'] = $table; 		   
		}		
		$data['main']='admin/flights_view';
		$this->load->view('template_view', $data);
    }
    
    // Display ticket table from database
    function showTickets()
    {
    	//First we load the library and the model
    	$this->load->model('admin_model');
    
    	//Then we call our model's get_flights function
    	$tickets = $this->admin_model->get_tickets();
    
    	//If it returns some results we continue
    	if ($tickets->num_rows() > 0){
    
    		//Prepare the array that will contain the data
    		$table = array();
    
    		$table[] = array('Row', 'Date', 'Seat', 'First name', 'Last name', 'Credit card #', 'Expiration (MM/YY)');
    		$i = 1;
    		foreach ($tickets->result() as $row){
    			//Insert query data into table, row by row
    			$expiration_data = substr($row->creditcardexpiration, 0, 2). "/". substr($row->creditcardexpiration, 2,2);
    			$table[] = array($i, $row->date,$row->seat,$row->first,$row->last,$row->creditcardnumber, $expiration_data);
    			$i++;
    		}
    		$data['tickets'] = $table;
    	}
    	$data['main']='admin/tickets_view';
    	$this->load->view('template_view', $data);
    }
    
    // Fill database with flight data for next two weeks
    function populate()
    {
	    $this->load->model('admin_model');
	    $this->admin_model->populate();
	    
	    //Then we redirect to the index page again
	    redirect('admin', 'refresh');    
    }
    
    // Remove all flight and ricket data
    function delete()
    {
    	$this->load->model('admin_model');    	 
    	$this->admin_model->delete();
    	 
    	//Then we redirect to the index page again
    	redirect('admin', 'refresh');
    }  
}
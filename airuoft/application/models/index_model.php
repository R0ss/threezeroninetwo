<?php
class Index_model extends CI_Model {
	
	//Create flight reservation and update available space on that flight
	function save_flight($fid, $sid){
			//Insert item into ticket table
			$this->db->query("	
							INSERT INTO ticket (first, last, creditcardnumber, creditcardexpiration, flight_id, seat)
							VALUES('{$this->input->post('fname')}',
							'{$this->input->post('lname')}',
							'{$this->input->post('cardNumber')}',
							'{$this->input->post('expirationM')}{$this->input->post('expirationY')}',
							'{$fid}',
							'{$sid}')
							");
		
			//update flight table
			$this->db->query("
							UPDATE flight f 
							SET available=available-1 
							WHERE f.id='{$fid}'
							");
	}
	
	//Get information about a specific flight based on its unqiue flight id
	function get_flightInfo($fid){
		$query = 
			$this->db->query("
							SELECT c.name AS 'From', t.time AS 'Time', f.date AS 'Date', f.id AS 'Flight #'
							FROM flight f, campus c, timetable t
							WHERE f.id = '{$fid}'
							AND c.id = t.leavingfrom
							AND f.timetable_id = t.id
							");
		return $query;
	}
	
	//Get list of available seats on flight
	function get_seats($id){
		$query = 
			$this->db->query("
							SELECT t.seat
							FROM ticket t
							WHERE t.flight_id = '{$id}'
							");
		return $query;
	}
	
	//Get list of available flights on specified date and location
	function get_departures($data){
		$query = 
			$this->db->query("
							SELECT c.name AS 'from', t.time, f.date, f.available, f.id
							FROM flight f, campus c, timetable t
							WHERE f.date = '{$data['date']}'
							AND c.id = '{$data['campus']}'
							AND c.id = t.leavingfrom
							AND f.timetable_id = t.id
							AND f.available > 0
							");
		return $query;
	}
}
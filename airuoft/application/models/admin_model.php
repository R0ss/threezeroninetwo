<?php
class Admin_model extends CI_Model {
		
	// Get entire flight list
	function get_flights(){
			$query = 
				$this->db->query("
								SELECT c1.name AS 'from', c2.name AS 'to', t.time, f.date, f.available
								FROM flight f, timetable t, campus c1, campus c2
								WHERE f.timetable_id = t.id 
								AND	t.leavingfrom = c1.id 
								AND	t.goingto = c2.id
								");
			return $query;	
	}  
	
	// Empties Flight table, then populates it with flights for next two weeks
	function populate() {
				$this->db->query("
								DELETE 
								FROM flight
								");
		
		for ($i=1; $i < 15; $i++) {
			for ($j=1; $j < 9; $j++) {
				$this->db->query("
								INSERT INTO flight (timetable_id, date, available) 
								VALUES ($j,adddate(current_date(), interval $i day),3)
								");
			}
		}	
	}
	
	// Delete flight list and ticket data
	function delete() {
				$this->db->query("
								DELETE 
								FROM flight
								");
		
				$this->db->query("
								DELETE
								FROM ticket
								");
	}
	
	// Get entire ticket list with flight date information
	function get_tickets(){
			$query = 
				$this->db->query("
								SELECT f.date, t.seat, t.first, t.last, t.creditcardnumber, t.creditcardexpiration
								FROM ticket t, flight f
								WHERE t.flight_id = f.id
								");
			return $query;
	}	
}
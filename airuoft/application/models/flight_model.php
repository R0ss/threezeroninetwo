<?php
class Flight_model extends CI_Model {
	
	//Need to add in variables...
	function get_departures($data){
		$query = $this->db->query("SELECT c.name as 'from', t.time, f.date, f.available
								   FROM flight f, campus c, timetable t
								   WHERE f.date = '{$data['date']}'
								   AND c.id = '{$data['campus']}'
								   AND f.timetable_id = t.id");
		return $query;
	}

	function get_flights()
	{
		$query = $this->db->query("SELECT c1.name as 'from', c2.name as 'to', t.time, f.date, f.available
								   FROM flight f, timetable t, campus c1, campus c2
								   WHERE f.timetable_id = t.id and
								         t.leavingfrom = c1.id and
								         t.goingto = c2.id;");
		return $query;	
	}  

	function populate() {
		for ($i=1; $i < 15; $i++) {
			for ($j=1; $j < 9; $j++) {
				$this->db->query("INSERT INTO flight (timetable_id, date, available) 
						          VALUES ($j,adddate(current_date(), interval $i day),3)");
			}
		}
		
		
	}

	function delete() {
		$this->db->query("DELETE 
						  FROM flight");
	}
	
	
}
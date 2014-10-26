<?php
	require_once('MainModel.php');

	class SchoolWorkModel extends MainModel
	{
	    public function __construct(){
	    	parent::__construct();
	    }

	    public function getActivityDates ($studentId, $activityId) {
	    	
	    	$sql = "SELECT id, DATE_FORMAT(date,'%d.%m.%Y') as date FROM activities WHERE student_id=? AND type_id=? ORDER BY date ASC";
	    	 
	    	$stmt = $this->dbc->prepare($sql);
	    	$stmt->execute(array($studentId, $activityId));
	    	 
	    	$activities = $stmt->fetchAll(PDO::FETCH_OBJ);
	    	return $activities;
	    }
	    
	    public function saveActivity ($studentId, $activityId, $date) {
	    	
	    	$sql = "INSERT INTO activities (student_id, type_id, date) VALUES (?, ?, STR_TO_DATE(?, '%d.%m.%Y'))";
	    	 
	    	$stmt = $this->dbc->prepare($sql);
	    	$status = $stmt->execute(array($studentId, $activityId, $date));

	    	return $status;	    	
	    }
	    
	    public function deleteActivity ($activityId) {
	    
	    	$sql = "DELETE FROM activities WHERE id=?";
	    	 
	    	$stmt = $this->dbc->prepare($sql);
	    	$stmt->execute(array($activityId));
	    }	    
	}
?>
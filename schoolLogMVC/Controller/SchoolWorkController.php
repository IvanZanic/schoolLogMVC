<?php

	class SchoolWorkController extends MainController
	{
	 
	    public function __construct($model){
	        $this->model = $model;
	        parent::__construct();
	    }

	    public function getActivityDates() {    	
	    	
		    $datesArray = $this->model->getActivityDates($_SESSION['studentId'], $_POST['activity']);
			return json_encode($datesArray);
	    }
	    
	    public function saveActivity () {
	    	
	    	$status = $this->model->saveActivity($_SESSION['studentId'], $_POST['activity'], $_POST['date']);
	    	
	    	$data = array($status);
	    	if ($status) {
	    		$datesArray = $this->model->getActivityDates($_SESSION['studentId'], $_POST['activity']);
	    		$data[1] = $datesArray;
	    	}
	    	
	    	return json_encode($data);
	    }
	    
	    public function deleteActivity () { 	
	    	
	    	$this->model->deleteActivity($_POST['activityDateId']);
	    	$datesArray = $this->model->getActivityDates($_SESSION['studentId'], $_POST['activity']);
	    	return json_encode($datesArray);
	    }
	}
?>
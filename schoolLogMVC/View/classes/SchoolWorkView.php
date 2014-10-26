<?php

	class SchoolWorkView extends MainView
	{
		private $activityDates;
	 
	    public function __construct($controller, $model) {
	        $this->controller = $controller;
	        $this->model = $model;
	        parent::__construct();
	    }
	 
	    public function output() {

	    	parent::output();
	    	
	    	if(isset($_SESSION['studentId']) && !empty($_SESSION['studentId'])) {
	    		$this->createActivityTable();
	    	}    	
	    	
        	require_once(__DIR__.$this->model->getTemplate());
	    }
	    
	    private function createActivityTable() {
	    	$datesArray = $this->model->getActivityDates($_SESSION['studentId'], 1);
	    	
	    	if (is_array($datesArray) && count($datesArray) > 0) {
	    		for($i = 0; $i < count($datesArray); $i++) {
	    			$this->activityDates .= '<tr><td>'.($i+1).'.</td>';
	    			$this->activityDates .= '<td>'.$datesArray[$i]->date.'</td>';
	    			$this->activityDates .= '<td><button value="'.$datesArray[$i]->id.'" class="btn btn-default btn-sm"><i class="fa fa-times"></i></button></td></tr>';
	    		}
	    	} else {
	    		$this->activityDates = '<tr><td>nema podataka</td></tr>';
	    	}
	    }	    
	}
?>
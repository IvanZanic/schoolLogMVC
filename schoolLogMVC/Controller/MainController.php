<?php

	abstract class MainController
	{
	    protected $model;

	    public function __construct() {
	    	if(isset($_POST['studentId']) && !empty($_POST['studentId'])) {
	    		$_SESSION['studentId'] = $_POST['studentId'];
	    	}
	    	if(isset($_POST['classId']) && !empty($_POST['classId'])) {
	    		$_SESSION['classId'] = $_POST['classId'];
	    	}
	    }
	    
	    public function getStudentsByClass() {
	    	if(isset($_POST['classId'])) {
	    		$classId = $_POST['classId'];
	    		$students = $this->model->getStudentsByClass($classId);
	    		return json_encode($students);
	    	}
	    }	    
	    
	    public function getStudentData () {
	    	$student = $this->model->getStudentData($_SESSION['studentId']);
	    	return json_encode($student);
	    }	    
	    
	    /* getters and setters*/
	    public function getModel() {
	    	return $this->model;
	    }
	    public function setModel($model) {
	    	$this->model = $model;
	    }
	}
?>
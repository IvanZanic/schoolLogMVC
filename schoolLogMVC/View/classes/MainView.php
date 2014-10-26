<?php
	require_once('View/viewElements/ViewElement.php');

	abstract class MainView
	{
	    protected $controller;
	    protected $model;
	    protected $loadFile;
	    protected $classList;
	    protected $studentList;
	    protected $viewElement;
	    protected $studentName;
	    protected $className;
	    
	    public function __construct() {
	    	$this->viewElement = new ViewElement();
	    }
	 
	    protected function output() {
	        $this->loadFile = $this->model->getLoadFile();
	        $this->createClassList();

	        if(isset($_SESSION['studentId']) && !empty($_SESSION['studentId'])) {
	        	$this->getStudentData();
	        	$this->createStudentList($_SESSION['classId']);
	        } else {
	        	$this->studentName = '';
	        	$this->className = '';
	        } 
	    }
	    
	    private function getStudentData () {
	    	$studentData = $this->model->getStudentData($_SESSION['studentId']);
	    	$this->studentName = $studentData[0]->name;
	    	$this->className = $studentData[0]->className;
	    }

	    private function createClassList () {
	    	
	    	$selectedId = 1;
	    	if(isset($_SESSION['classId']) && !empty($_SESSION['classId'])) {
	    		$selectedId = $_SESSION['classId'];
	    	}
	    	
    		$file = 'people.txt';
    		date_default_timezone_set('Europe/Zagreb');
    		file_put_contents($file, "[".date('d-m-Y H:i:s', time())."] INFO: ".$selectedId ); //, FILE_APPEND	    	
	    	
	    	$classes = $this->model->getClassList();
	    	
	    	$this->classList = '';
	    	foreach ($classes as $class) {
	    		$selected = '';
	    		if($class->id == $selectedId) {
	    			$selected = 'selected';
	    		}
	    		$this->classList .= $this->viewElement->optionElement($class->id, $class->name, $selected);
            }
	    }
	    private function createStudentList($classId) {
	    	$selectedId = 0;
	    	if(isset($_SESSION['studentId']) && !empty($_SESSION['studentId'])) {
	    		$selectedId = $_SESSION['studentId'];
	    	}
	    	$students = $this->model->getStudentsByClass($classId);
	    	
	    	$this->studentList = '';
	    	foreach ($students as $student) {
	    		$selected = '';
	    		if($student->id == $selectedId) {
	    			$selected = 'selected';
	    		}
	    		$this->studentList .= $this->viewElement->optionElement($student->id, $student->name, $selected);
	    	}
	    }
	}
?>
<?php

	abstract class MainModel
	{
	    protected $template;
	    protected $loadFile;
	    protected $dbc;

	    public function __construct(){
	        $this->template = "/../main.php";

	        $db_obj = new DatabaseClass("schoolLog");
       		$this->dbc = $db_obj->connect();
	    }

	    public function getClassList () {

			$sql = "SELECT * FROM class";

			$stmt = $this->dbc->prepare($sql);
			$stmt->execute();

		    $classes = $stmt->fetchAll(PDO::FETCH_OBJ);

		    return $classes;
	    }
	    
	    public function getStudentsByClass($classId) {
	    	 
	    	$sql = "SELECT CONCAT(student.name, ' ', surname) as name, id FROM student WHERE class_id=?";
	    	 
	    	$stmt = $this->dbc->prepare($sql);
	    	$stmt->execute(array($classId));
	    	 
	    	$students = $stmt->fetchAll(PDO::FETCH_OBJ);
	    	return $students;
	    }	 

	    public function getStudentData ($studentId) {
	    	$sql = "SELECT CONCAT(student.name, ' ', surname) as name, class.name as className FROM student
		    		JOIN class ON student.class_id=class.id WHERE student.id=?";
	    	 
	    	$stmt = $this->dbc->prepare($sql);
	    	$stmt->execute(array($studentId));
	    	 
	    	$student = $stmt->fetchAll(PDO::FETCH_OBJ);
	    	return $student;
	    }

	    /*getters and setters*/
	    public function getTemplate() {
	    	return $this->template;
	    }
	    public function setTemplate($template) {
	    	$this->template = $template;
	    }
	    
	    public function getLoadFile() {
	    	return $this->loadFile;
	    }
	    public function setLoadFile($loadFile) {
	    	$this->loadFile = $loadFile;
	    }	    
	}
?>
<?php

	class Validation
	{
		protected $studentIdSession = false;
		protected $classIdSession = false;
	
		public function __construct() {
			if(isset($_POST['studentId']) && !empty($_POST['studentId'])) {
				$_SESSION['studentId'] = $_POST['studentId'];
				$this->studentIdSession = true;
			}
			if(isset($_POST['classId']) && !empty($_POST['classId'])) {
				$_SESSION['classId'] = $_POST['classId'];
				$this->classIdSession = true;
			}
		}
		
		public function getStudentIdSession() {
			return $this->studentIdSession;
		}
		public function setStudentIdSession($studentIdSession) {
			$this->studentIdSession = $studentIdSession;
		}
		
		public function getClassIdSession() {
			return $this->classIdSession;
		}
		public function setClassIdSession($classIdSession) {
			$this->classIdSession = $classIdSession;
		}		
	}
?>

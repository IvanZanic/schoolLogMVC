<?php 
	
	class EvaluationView extends MainView
	{
			
		public function __construct($controller, $model) {
			$this->controller = $controller;
			$this->model = $model;
			parent::__construct();
		}
		
		public function output() {
		
			parent::output();
		
			require_once(__DIR__.$this->model->getTemplate());
		}		
	}

?>
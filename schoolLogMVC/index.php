<?php
//	-- for logging --
// 	$file = 'people.txt';
// 	date_default_timezone_set('Europe/Zagreb');
// 	file_put_contents($file, "[".date('d-m-Y H:i:s', time())."] INFO: "); //, FILE_APPEND

	session_start();

	error_reporting(E_ALL);
	ini_set('display_startup_errors',1);
	ini_set('display_errors', 1);

	header('Content-Type: text/html; charset=utf-8');

    require_once("../db_func/pdo_connect.php");
    require_once("Enum/enums.php");

    if (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) {
        $page = $_REQUEST['page'];

        $dataURL = array(
            'schoolWork' => array('model' => 'SchoolWorkModel', 'view' => 'SchoolWorkView', 'controller' => 'SchoolWorkController'),
            'evaluation' => array('model' => 'EvaluationModel', 'view' => 'EvaluationView', 'controller' => 'EvaluationController'),
            'gramatika' => array('model' => 'GramatikaModel', 'view' => 'GramatikaView', 'controller' => 'GramatikaController'),
            'vokabular' => array('model' => 'VokabularModel', 'view' => 'VokabularView', 'controller' => 'VokabularController'),
            'civilizacija' => array('model' => 'CivilizacijaModel', 'view' => 'CivilizacijaView', 'controller' => 'CivilizacijaController'),
            'biljeske' => array('model' => 'BiljeskeModel', 'view' => 'BiljeskeView', 'controller' => 'BiljeskeController')
        );
     
        foreach($dataURL as $key => $components){
            if ($page == $key) {
                $model = $components['model'];
                $view = $components['view'];
                $controller = $components['controller'];
                break;
            }
        }

        if (isset($model)) {
        	
        	require_once('Model/MainModel.php');
        	require_once('View/classes/MainView.php');
        	require_once('Controller/MainController.php');
        	
        	require_once('Model/'.$model.'.php');
        	require_once('View/classes/'.$view.'.php');
        	require_once('Controller/'.$controller.'.php');
            
            $m = new $model();
            $m->setLoadFile($page);
            $c = new $controller($m);
            
            if (isset($_POST['isAjax']) && isset($_POST['action'])) {
            	echo $c->$_POST['action']();
            } else {
            	$v = new $view($c, $m);
            	echo $v->output();
            }
        }
    }   
?>
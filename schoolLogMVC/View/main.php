<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>School Log</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="Resources/adminBoot/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="Resources/adminBoot/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="Resources/adminBoot/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="Resources/adminBoot/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="Resources/adminBoot/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="Resources/adminBoot/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">



        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
				Školski dnevnik
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-right">



                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="Resources/adminBoot/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p id="studentName"><?php echo $this->studentName; ?></p>

                            <p id="studentClass"><?php echo $this->className; ?></p>
                        </div>
                    </div>

                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php?page=">
                                <i class="fa fa-dashboard"></i> <span>Sve</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?page=schoolWork">
                                <i class="fa fa-th"></i> <span>Odnos prema radu</span> 
                            </a>
                        </li>
                        <li>
                            <a href="index.php?page=evaluation">
                                <i class="fa fa-edit"></i> <span>Elementi ocjenjivanja</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?page=biljeske.php?page=">
                                <i class="fa fa-folder"></i> <span>Biljeske</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
				<section class="content-header">
					<div class="row">
	                	<div class="col-md-6">
	                        <div class="col-md-4">
	                            <div class="form-group">
	                                <select class="form-control" id="classListID" >
	                                	<option value="0" selected>Izaberi razred</option>
	                                    <?php echo $this->classList; ?>
	                                </select>
	                            </div> 
	                        </div>
	
	                        <div class="col-md-4">
	                            <div class="form-group">
	                                <select class="form-control" id="studentListID">
	                                	<?php echo $this->studentList; ?>
	                                </select>
	                            </div> 
	                        </div>
	               		</div>
	            	</div>  	
				</section>            	

				<section class="content">
					<div class="row">
	                    <?php 
	                        include("pages/" . $this->loadFile . ".php"); 
	                    ?>
		            </div>
	            </section> 
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="Resources/adminBoot/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="Resources/adminBoot/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="Resources/adminBoot/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="Resources/adminBoot/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="Resources/adminBoot/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="Resources/adminBoot/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="Resources/adminBoot/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="Resources/adminBoot/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="Resources/adminBoot/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="Resources/adminBoot/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="Resources/adminBoot/js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="Resources/adminBoot/js/AdminLTE/demo.js" type="text/javascript"></script>
        
        <!-- my js and ajax -->
        <script src="Resources/js/ajaxCalls.js" type="text/javascript"></script>

        <script type="text/javascript">
        	$('.datepicker').datepicker({
			    format: 'dd.mm.yyyy'
			}).on('changeDate', function(e){
			    $(this).datepicker('hide');
			});
        </script>

    </body>
</html>
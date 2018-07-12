<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="patins.ico">

<title>Pool des séries 2015</title>

<!-- Bootstrap core CSS -->
<link href="./dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="poolDesSeries.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="./assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="./assets/js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

<!-- <script type="text/javascript" src="poolDesSeries.js"></script> -->
	<?php
	//header('Content-type: text/html; charset=utf-8');
	$rondeDeSelection = 1;
	require(str_replace('//', '/', dirname(__FILE__).'/')."includes/cfgMySQL.inc.php");
	require(str_replace('//', '/', dirname(__FILE__).'/')."includes/cl_connect_mysql.inc.php");
	$phDB = new dbConnectMySQL();
	$cdBD = $phDB->connect();
	
//	require_once("./includes/config_core.inc.php");
/*
	try {
		$cdBD = new PDO('mysql:host='.DB_MYSQL_HOST.';dbname='.DB_MYSQL_DB.';charset=utf8',DB_MYSQL_LOGIN, DB_MYSQL_PASS);
		
		if($cdBD == null)
		{
			echo "<h2> Connexion non-établie</h2>";
			die();
		}
	}

//	catch (PDOException $e)
//	{
//		echo "PDOException:". $e->getMessage();
//	}
	catch (Exception $e)
	{
		print "Exception:";
		print_r($e);
		die();
	}
*/
	?>

</head>

<body>

	<!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button id="BTmenu" type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
				</button>
				<img class="navbar-brand" alt="Vieux Patins"
					src="./assets/img/patins.png"> <a class="navbar-brand">Pool
					des séries 2015</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="menu nav navbar-nav">
					<li class="active"><a id="sommaireBT">Sommaire</a>
					</li>
					<li><a class="ronde" data-ronde="1">Ronde 1</a>
					</li>
					<li><a class="ronde" data-ronde="2">Ronde 2</a>
					</li>
					<li><a class="ronde" data-ronde="3">Ronde 3</a>
					</li>
					<li><a class="ronde" data-ronde="4">Ronde 4</a>
					</li>
					<li><a id="resultatsBT">Résultats</a>
					</li>
					<li><a id="participantsBT">Participants</a>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>

	<!-- Begin page content -->
	<div class="container">
	
			<div class="donnees" id="dataContainer">
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<p class="text-muted">Copyright Sylvain Huppé 2015</p>
		</div>
	</footer>


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function()
    {
    	$(".ronde").click(function() {
    		var myClasses = $(this).classList;
    		console.log(this);
    		console.log($(this).data("ronde"));
    		console.log(myClasses);
			$rondeDeSelection = $(this).data("ronde");
    		//alert(myClasses.length + " " + myClasses[0]);
	    	$("#dataContainer").load("predictions.php", {'rondeDeSelection' : $rondeDeSelection}, function(responseTxt, statusTxt, xhr){
        	});
    	    		});
    	$("#sommaireBT").click(function() {
	    	$("#dataContainer").load("sommaire.php", function(responseTxt, statusTxt, xhr){
        	});
    	});
		
    	$("#participantsBT").click(function(){
	    	$("#dataContainer").load("participants.php", function(responseTxt, statusTxt, xhr){
        	});
	    });

        $("#resultatsBT").click(function() {
            getPage("resultats.php");
      	});

        $('.menu li').click(function(e) {
            $('#BTMenu').click();
            $('.menu li.active').removeClass('active');
        	  var $this = $(this);
        	  if (!$this.hasClass('active')) {
        	    $this.addClass('active');
        	  }
        	  e.preventDefault();
        	});
    	$("#dataContainer").load("sommaire.php", function(responseTxt, statusTxt, xhr){
    	});
    	$(".navbar-nav").click(function() {
            if($('.navbar-toggle').css('display') !='none'){
                $(".navbar-toggle").trigger( "click" );
            }
    		//$('.navbar-collapse').collapse('hide');
    	});
    });
    
	    		    
	function getPage(page) {
		$("#dataContainer").load(page, function(responseTxt, statusTxt, xhr){
    	});
	};
    	</script>
	<script src="./dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="./assets/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>

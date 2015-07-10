<?php
session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
	header("location:dashboard.php");
}
	
}
    if(isset($_POST['onclik']))
    {

    $name=$_POST['name'];
	$psw=md5($_POST['password']);
    $sql="select id,name from admin where name=:name AND password=:psw";
	$stmt=$conn->prepare($sql);
	$stmt->bindValue(':name',$name);
	$stmt->bindValue(':psw',$psw);
	try{
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$id=$result[0]['id'];
		$uname=$result[0]['name'];
		if($id){
			
			$_SESSION['id']=$id;
			$_SESSION['name']=$uname;
			header("location:dashboard.php");
		}
		else{
			
			?>
			<script>
            alert("Incorrect username or password");

			</script>
			<?php
		}
		}
	catch(PDOException $e){
		echo  $e->getMessage();
    }
}
?> 

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
        <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 </head>
<body style="background-color:black;">

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="index.php" method="POST">
		        <h2 class="form-login-heading">Sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="Username" name="name" autofocus="">
		            <br>
		            <input type="password" class="form-control" placeholder="Password" name="password">
		            <br>
		            <button class="btn btn-theme btn-block" type="submit" name="onclik"><i class="fa fa-lock"></i> LOG IN</button>
		            <hr>
		            
		            </div>
		
		          
		      </form>	  	
	  	
	  	</div>
	  </div>

   <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
     

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom switch-->
  <script src="assets/js/bootstrap-switch.js"></script>
  
  <!--custom tagsinput-->
  <script src="assets/js/jquery.tagsinput.js"></script>
  
  <!--custom checkbox & radio-->
  
  
  <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  
  
  <script src="assets/js/form-component.js"></script> 
</body>
</html>
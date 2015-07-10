<?php
session_start();

include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
$id=$_GET['id'];
$sql="SELECT title FROM aisles where id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindValue(':id',$id);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php 
 Require 'head.php';
 ?>
</head>
<body>
      <section id="container" >
        <?php 
          Require 'header.php';
          Require 'sidebar.php'; 
        ?>

        <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>Edit Aisles </h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  
                      <form class="form-horizontal style-form" id="recipe" method="POST" action="eventHandler.php" enctype='multipart/form-data'>
                          <input type="hidden" class="form-control" name="action" value="edit_aisle" >
                          <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Aisle Name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="title" value="<?php echo$result[0]['title'];?>" required>
                                  
                              </div>
                          </div>

                          <div class="form-group">

                            <div class="col-sm-12">
                          <center><button type="submit" class="btn btn-theme">Update</button></center>
                          </div>
                          </div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 -- recipes
              <a href="edit_aisle.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <?php  
    
   require 'script.php';
    ?>
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
      </script>
      
  </body>
</html>
<?php }} 
else
{
	header("location:index.php");
}?>
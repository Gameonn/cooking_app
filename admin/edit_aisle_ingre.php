<?php
session_start();

include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
$id=$_GET['id'];

$sql="SELECT * FROM aisles";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result1=$stmt->fetchAll(PDO::FETCH_ASSOC);

$sql="SELECT * FROM ingredient_type";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result2=$stmt->fetchAll(PDO::FETCH_ASSOC);

$sql="SELECT * FROM ingredients WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindValue(':id',$id);
$stmt->execute();
$result3=$stmt->fetchAll(PDO::FETCH_ASSOC);

$aisle_id=$result3[0]['aisle_id'];
$ingredient_type_id=$result3[0]['ingredient_type_id'];

$sql="SELECT * FROM aisles WHERE id=:aisle_id";
$stmt=$conn->prepare($sql);
$stmt->bindValue(':aisle_id',$aisle_id);
$stmt->execute();
$result4=$stmt->fetchAll(PDO::FETCH_ASSOC);

$sql="SELECT * FROM ingredient_type WHERE id=:ingredient_type_id";
$stmt=$conn->prepare($sql);
$stmt->bindValue(':ingredient_type_id',$ingredient_type_id);
$stmt->execute();
$result5=$stmt->fetchAll(PDO::FETCH_ASSOC);



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
          	<h3><i class="fa fa-angle-right"></i>Edit Aisle or Ingredient type </h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  
                      <form class="form-horizontal style-form" id="recipe" method="POST" action="eventHandler.php" enctype='multipart/form-data'>
                          <input type="hidden" class="form-control" name="action" value="edit_aisle_ingre" >
                          <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                          
                          <div class="form-group">
						               <label class="col-sm-12 control-label">Aisle Name: </label>
						               <div class="col-sm-12">
            						      <select class="form-control" name="aisle_name" required> 
            						      <option value="<?php echo $result4[0]['id'];?>"><?php echo $result4[0]['title']?></option>
            						        <?php  foreach($result1 as $row){
            						            echo '<option value="'.$row['id'].'" >'.$row['title'].'</option>';
            						        }?>
            						      </select>
            						      </div>
            						  </div>

						  <div class="form-group">
							  <label class="col-sm-12 control-label">Ingredient TYPE: </label>
							      <div class="col-sm-12">
							      <select class="form-control" name="ing_type" required> 
							      <option value="<?php echo $result5[0]['id']?>"><?php echo $result5[0]['title']?></option>
							        <?php  foreach($result2 as $row){
							            echo '<option value="'.$row['id'].'" >'.$row['title'].'</option>';
							        }?>
							      </select>
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
      <a href="edit_aisle_ingre.php#" class="go-top">
          <i class="fa fa-angle-up"></i>
      </a>
  </div>
</footer>
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
}
?>
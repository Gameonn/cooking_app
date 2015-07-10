<?php
session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
$sql="SELECT id,title FROM aisles ";
$stmt=$conn->prepare($sql);
    try           
                  {
        $stmt->execute();
        $result1=$stmt->fetchAll(PDO::FETCH_ASSOC);
                   }
     
    catch(Exception $e){
                     echo $e->getMessage();
                       }

$sql="SELECT id,title FROM recipes ";
$stmt=$conn->prepare($sql);
    try           
                  {
        $stmt->execute();
        $result2=$stmt->fetchAll(PDO::FETCH_ASSOC);
                   }
     
    catch(Exception $e){
                     echo $e->getMessage();
                       }
                       
$sql="SELECT id,title FROM ingredient_type ";
$stmt=$conn->prepare($sql);
    try           
                  {
        $stmt->execute();
        $result3=$stmt->fetchAll(PDO::FETCH_ASSOC);
                   }
     
    catch(Exception $e){
                     echo $e->getMessage();
                       }

$sql="SELECT id,title FROM ingredient_type WHERE `title`='Generic Ingredient'";
$stmt=$conn->prepare($sql);
    try           
                  {
        $stmt->execute();
        $result4=$stmt->fetchAll(PDO::FETCH_ASSOC);
                   }
     
    catch(Exception $e){
                     echo $e->getMessage();
                       }

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
          	<h3><i class="fa fa-angle-right"></i> Ingredients</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">

                  	<form class="form-horizontal style-form" id="recipe" method="POST" action="eventHandler.php" enctype='multipart/form-data'>
                          <input type="hidden" class="form-control" name="action" value="ingredients" >
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Ingredient Name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="title" required>
                                  
                              </div>
                          </div>

                             <div class="form-group">

                              <label class="col-sm-2 col-sm-2 control-label">Aisle Name</label>
                              <div class="col-sm-10">
                              <select class="form-control" name="aisle_id" required> 
                               
                                <?php  foreach($result1 as $row){
                                   echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                                   
                                 }?>
                               </select>
                               </div>
                           </div>
                       
                              <div class="form-group">

                              <label class="col-sm-2 col-sm-2 control-label">Recipe Name</label>
                              <div class="col-sm-10">
                              <select class="form-control" name="recipe_id" required> 
                               
                                <?php  foreach($result2 as $row){
                                   echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                                   
                                 }?>
                             
                               </select>
                               </div>
                               </div>
                               <div class="form-group">

                              <label class="col-sm-2 col-sm-2 control-label">Ingredient Type</label>
                              <div class="col-sm-10">
                              <select class="form-control" name="ingredient_id" required> 
                                   <option value="<?php echo $result4[0]['id']; ?>"> <?php echo $result4[0]['title']; ?></option>
                                <?php  foreach($result3 as $row){
                                   echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                                   
                                 }?>
                               </select>
                               </div>
                           </div>
                            <div class="form-group">

                            <div class="col-sm-12">
                          <center><button type="submit" class="btn btn-theme">Submit</button></center>
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
              <a href="#" class="go-top">
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
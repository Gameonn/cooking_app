<?php
session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
$sql="SELECT id,title FROM recipe_type ";
$stmt=$conn->prepare($sql);
    try           
                  {
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
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
          	<h3><i class="fa fa-angle-right"></i> Recipe Details</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  
                      <form class="form-horizontal style-form" id="recipe" method="POST" action="eventHandler.php" enctype='multipart/form-data'>
                          <input type="hidden" class="form-control" name="action" value="add_recipe" >
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Recipe Name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="title" required>
                                  
                              </div>
                          </div>
                        <div class="form-group">

                          <label class="col-sm-2 col-sm-2 control-label">Image</label>
                      <div class="col-sm-10 image-upload">
                         <img src="assets\img\noimage.gif"; class="def-image" style="width: 40%;height: 200px; padding: 3px;border: 1px solid rgb(213, 206, 206)  ;
                   border-radius: 4px;">
                     <input type="file" name="image" class="filestyle" data-input="false" data-size="sm" data-buttonText="Select file" required>
                           </div>

                        </div>
                          
                          <div class="form-group">
                              
                                <span>
                                  <label class="col-sm-2 col-sm-2 control-label">Preparation time (min.)</label><div class="col-sm-4"><input type="number" min="1" step="1" class="form-control" name="prep_time" required></div>
                                  <label class="col-sm-2 col-sm-2 control-label">Cook time (min.)</label><div class="col-sm-4"><input type="number" min="1" step="1"  class="form-control" name="cook_time" required></div>
                                </span>
                              
                          </div>
                          
                          <div class="form-group">
                              
                                <span>
                                  <label class="col-sm-2 col-sm-2 control-label">Difficulty Level</label><div class="col-sm-4"><input type="number" min="1" max="3" class="form-control" name="diff_level" required></div>
                                  <label class="col-sm-2 col-sm-2 control-label">Serves</label><div class="col-sm-4"><input type="number" min="1" class="form-control" name="serves" required></div>
                                </span>
                              
                          </div>

                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Spicy</label>
                              <div class="col-sm-4" >
                                  <input type="number" min="0" max="5" class="form-control " name="spicy" required>
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Video URL</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="video_url" required>
                                  
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Method</label>
                              <div class="col-sm-10">
                                  <textarea rows="10" cols="70" class="form-control" name="method_html" required></textarea>
                              </div>
                          </div>
                          <div class="form-group">

                              <label class="col-sm-2 col-sm-2 control-label">Recipe Type</label>
                              <div class="col-sm-10">
                              <select class="form-control" name="recipe_type" required> 
                               
                                <?php  foreach($result as $row){
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
              <a href="add_recipes.php#" class="go-top">
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
        <script type="text/javascript">

      $('.image-upload').on("change","input[type='file']",function () {
                // alert('hey');
                var files = this.files;
                var reader = new FileReader();
                name=this.value;
                var this_input=$(this);
                reader.onload = function (e) {

                 this_input.parent('.image-upload').find(".def-image").attr('src', e.target.result).width('100 %').height(200);
               }
               reader.readAsDataURL(files[0]);
             });

    </script>

  </body>
</html>
<?php }}
else
{
	header("location:index.php");
} ?>
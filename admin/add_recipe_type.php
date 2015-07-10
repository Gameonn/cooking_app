<?php
session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{

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
          	<h3><i class="fa fa-angle-right"></i> Recipe Types</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	<form class="form-horizontal style-form" id="recipe" method="POST" action="eventHandler.php" enctype='multipart/form-data'>
                          <input type="hidden" class="form-control" name="action" value="recipe_type" >
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Recipe Type</label>
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
              <a href="recipe_type.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

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
}?>
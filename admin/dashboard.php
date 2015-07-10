<?php
session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{

$sql="SELECT count(id) as cid, (SELECT count(id) FROM recipe_type )as rid,(SELECT count(id) FROM aisles )as aid,(SELECT count(id) FROM ingredient_type )as inid FROM users ";
$sth=$conn->prepare($sql);
try{$sth->execute();}
catch(Exception $e){
echo $e->getMessage();
}
  $res=$sth->fetchAll();
 
$sql="SELECT id,name,created_on FROM users ORDER BY id DESC LIMIT 6";
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
    require 'head.php';
    ?>  
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <?php
      require 'header.php';
      ?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <?php
      require 'sidebar.php';
      ?>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  <div class="row mtbox">
                      <div class="col-md-4 col-sm-4 col-md-offset-1 box0">
                        <div class="box1">
                           <span class="li_heart"></span>
                           <h3><?php echo $res[0][cid];?></h3>
                        </div>
                          <p><?php echo $res[0][cid];?> people are using this application Whoohoo!</p>
                      </div>
                      <div class="col-md-4 col-sm-4 col-md-offset-1 box0">
                        <div class="box1">
                           <span class="fs6" style="font-size: 3.8em;" aria-hidden="true" data-icon=""></span>
                           <h3><?php echo $res[0][rid];?></h3>
                        </div>
                          <p><?php echo $res[0][rid];?> recipe types are there in the application!</p>
                      </div>
                      </div>
                      <div class="row mtbox">
                      <div class="col-md-4 col-sm-4 col-md-offset-1 box0">
                        <div class="box1">
                           <span class="fs1" style="font-size: 3.8em;" aria-hidden="true" data-icon=""></span>
                           <h3><?php echo $res[0][aid];?></h3>
                        </div>
                          <p><?php echo $res[0][aid];?> aisles are there in the application!</p>
                      </div>
                      <div class="col-md-4 col-sm-4 col-md-offset-1 box0">
                        <div class="box1">
                           <span class="fs1" style="font-size: 3.8em;" aria-hidden="true" data-icon=""></span>
                           <h3><?php echo $res[0][inid];?></h3>
                        </div>
                          <p><?php echo $res[0][inid];?> ingredient types are there in the application!</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                   <h3>Latest Users!!</h3>
                                        
                      <!-- First Action -->
                      <?php
                               foreach($result as $key=>$subarray)
                               {
                                
                      ?>
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted><?php echo $subarray['created_on']; ?></muted><br/>
                             <a href="#"><?php echo $subarray['name'];?></a> Started using the application.<br/>
                          </p>
                        </div>
                      </div>
                      <?php 
                           }   
                      ?>
                      
                      <div class="desc">
                        <div class="thumb">
                          
                        </div>
                        <div class="details">
                          
                            <center><a href="list_users.php"> View All Users!!</a> </center> 
                          
                        </div>
                      </div>
                      </div>

                </div>
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015--recipes
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <?php
    require 'script.php';
	   ?>
		
  </body>
</html>
<?php
}
}
else
{
	header("location:index.php");
}
?>  
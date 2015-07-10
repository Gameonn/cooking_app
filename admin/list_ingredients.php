<?php session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);  
$limit = 20;
$startpoint = ($page * $limit) - $limit;
$key=$_GET['key'];
if($key)
  $search= "where I.title LIKE '%$key%'";
  else 
  $search='where 1';

$sql="SELECT  I.id as i_id,I.title as i_title,A.title as a_title, IT.title as it_title FROM ingredients I JOIN aisles A ON I.aisle_id=A.id JOIN recipes R ON I.recipe_id=R.id JOIN ingredient_type IT ON I.ingredient_type_id=IT.id $search LIMIT {$startpoint}, {$limit}";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

$sql="SELECT id,title FROM recipes ";
$stmt=$conn->prepare($sql);
    try           
                  {
        $stmt->execute();
        $result1=$stmt->fetchAll(PDO::FETCH_ASSOC);
                   }
     
    catch(Exception $e){
                     echo $e->getMessage();
                       }

$sql1="SELECT id FROM ingredients";
$stmt=$conn->prepare($sql1);
$stmt->execute();
$result2=$stmt->fetchAll(PDO::FETCH_ASSOC);
$total_records=count($result2);


?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php 
 Require 'head.php';
 ?>
</head>
<body>
      <section id="container">
        <?php 
          Require 'header.php';
          Require 'sidebar.php'; 
        ?>
        <section id="main-content">
          <section class="wrapper">


          <div class="col-md-4">
          	<h3><i class="fa fa-angle-right"></i> Ingredients Till Now!!</h3>
				     </div>


	              <div class="col-md-4">
              <div class="input-group" style="margin-top:20px;">
                <input class="form-control" id="search" type="text" aria-controls="example1" 
                 placeholder="Search by Name" value="">
                <span class="input-group-btn"><button id="btnenter" class="btn btn-primary btn-flat fa fa-search" style="line-height: 20px;" 
                onclick="window.location.href='?&key='+(document.getElementById('search').value);'&page=<?php echo $page;?>&limit=<?php echo $limit;?>'">
                </button></span>
              </div>
           </div>
              

              <div class="col-md-4" style="text-align:right;">      
                <div class="dataTables_paginate paging_bootstrap">
                  <ul class="pagination">
                    <li <?php if($page==1) echo "class='prev disabled'><a href='#'>"; else { echo "class='prev'><a href='?page=".--$page."&limit=$limit&key=$key'>"; $page++; } ?>← </a></li>
                    <?php 
                    if(ceil($total_records/$limit) > 6){
                      $forstart=1+$page-1;
                      $forend = (6+$page-1)<=ceil($total_records/$limit) ? 6+$page-1 : ceil($total_records/$limit);
                    }
                    else {
                      $forstart=1;
                      $forend=ceil($total_records/$limit);
                    }  
                    for($i=$forstart;$i<=$forend;$i++){ 
                    ?>
                    <li <?php if($page==$i) echo "class='active'"; ?>><a href="<?php echo "?page=$i&limit=$limit&key=$key"; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                    <li <?php if($page==ceil($total_records/$limit)) echo "class='next disabled'><a href='#'>"; else { echo "class='next'><a href='?page=".++$page."&limit=$limit&key=$key'>"; $page--; } ?> → </a></li>
                  </ul>
                </div>  
              </div>     


              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel"  style="overflow-x:scroll;">
                           
                       <form class="form-horizontal " role="form" method="post" action="eventHandler.php">
                       <input type="hidden" class="form-control" name="action" value="add_ingre_to_recipe">
                       <center>
                           <div class="col-md-4" style="float: inherit;">
                               <center>
                               <div class="form-group">
                                  <select class="form-control" name="optval" required> 
                                  <?php  foreach($result1 as $row){
                                  echo '<option value="'.$row['id'].'" >'.$row['title'].'</option>';
                                  }?>
                                  </select>
                                  </div>
                                  <button style="margin-top:10px;" class="btn btn-primary btn-xs " type="submit"><i class="fa fa-plus"></i></button>
                            </div> 
                         </center>
                          <table class="table table-striped table-advance table-hover">
	                  	  	  
                              <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>Title</th>
                                   <th>Aisle Name</th>
                                   <th>Ingredient Type</th>
                                   <th>Edit</th>
                                   <th>Select Ingredients</th>
                              </tr>
                              </thead>
                              <tbody>
                               <?php
                               
                               foreach($result as $key=>$subarray)
                               {
                                
                                 ?>
                                   <tr>
                                  <td><?php echo $subarray['i_id'];?> </td>
                                  <td><?php echo $subarray['i_title'];?> </td>
                                  <td><?php echo $subarray['a_title'];?> </td>
                                  <td><?php echo $subarray['it_title'];?> </td>
                                  <td><div class="btn btn-primary btn-xs" type="submit">
                                      <a href="edit_aisle_ingre.php?id=<?php echo $subarray['i_id'];?>" style="color:white"><i class="fa fa-pencil"></i></a></div></td>
                                  <td><div class="task-checkbox col-sm-1">
                                     <input type="checkbox" class="list-child" name="add_to_ingre[]" value="<?php echo $subarray['i_id'];?>">
                                    </div></td>
                              </tr>
                              <?php 
                              }
                              ?>
                              </tbody>
                          </table>
                          </form>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

		</section><!-- --/wrapper ---->
      </section>

<footer class="site-footer">
          <div class="text-center">
              2015 -- recipes
              <a href="list_aisle.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

  

    <?php  
    
   require 'script.php';
    ?>
 
 <script type="text/javascript">
 $("#search").keyup(function(event){
    if(event.keyCode == 13){
        $("#btnenter").click();
    }
});
  </script> 

 </body>
</html>
<?php }} 
else
{
  header("location:index.php");
}?>
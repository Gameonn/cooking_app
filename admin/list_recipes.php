<?php session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);	
$limit = 9;
$startpoint = ($page * $limit) - $limit;	
$filterby = (int) (!isset($_GET["filterby"]) ? 0 : $_GET["filterby"]);
$key=$_GET['key'];

if($filterby)
	$searchkey= "where recipe_type_id=:filterby";
	else 
	$searchkey='where 1';
if($key)
	$search= "and title LIKE '%$key%'";
	else 
	$search='and 1';

$sql="SELECT * FROM recipes  $searchkey $search order by title LIMIT {$startpoint}, {$limit}";
$stmt=$conn->prepare($sql);
$stmt->bindValue(':filterby',$filterby);
//$stmt->bindValue(':key',$key);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

$sql2="SELECT id FROM recipes";
$stmt=$conn->prepare($sql2);
$stmt->execute();
$result2=$stmt->fetchAll(PDO::FETCH_ASSOC);
$total_records=count($result2);

$sql1="SELECT id,title FROM recipe_type ";
$stmt=$conn->prepare($sql1);
try           
{
$stmt->execute();
$result1=$stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch(Exception $e)
{
//echo $e->getMessage();

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
      <section id="container">
        <?php 
          Require 'header.php';
          Require 'sidebar.php'; 
        ?>

<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <div class="col-md-2"><h3><i class="fa fa-angle-right"></i> Recipes</h3></div>
   
  <div class="col-md-2">
		<div id="example2_length" class="dataTables_length ">
			<label style="margin-top:20px;"> 
			<select size="1" name="example2_length" class="form-control btn btn-default " 
			aria-controls="example2" onchange="window.location.href='?&filterby='+(this.options[this.selectedIndex].value);'&limit=<?php echo $limit;?>&page=<?php echo $page;?>'">
				
				<option value="0"> Recipe Type</option>
				<?php  foreach($result1 as $row)
				                {
                         echo '<option value="'.$row['id'].'"';
					if($row['id']==$filterby) echo "selected";
					echo ">".$row['title']."</option>";
								}
								
				?>
			</select>
			</label>
		</div>
	</div>
<div class="col-md-3">
			<div class="input-group" style="margin-top:20px;">
				<input class="form-control" id="search" type="text" aria-controls="example1" onkeyup=" window.location.href='?&filterby=<?php echo $filterby;?>" 
				 placeholder="Search by Name" value="">
				<span class="input-group-btn"><button id="btnenter" class="btn btn-primary btn-flat fa fa-search" style="line-height: 20px;" 
				onclick="window.location.href='?&filterby=<?php echo $filterby;?>&page=<?php echo $page;?>&limit=<?php echo $limit;?>&key='+(document.getElementById('search').value)"></button></span>
			</div>
</div>
<div class="col-md-5" style="text-align:right;">			
			<div class="dataTables_paginate paging_bootstrap">
		<ul class="pagination">
			<li <?php if($page==1) echo "class='prev disabled'><a href='#'>"; else { echo "class='prev'><a href='?page=".--$page."&limit=$limit&key=$key&filterby=$filterby'>"; $page++; } ?>← </a></li>
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
			<li <?php if($page==$i) echo "class='active'"; ?>><a href="<?php echo "?page=$i&limit=$limit&key=$key&filterby=$filterby"; ?>"><?php echo $i; ?></a></li>
			<?php } ?>
			<li <?php if($page==ceil($total_records/$limit)) echo "class='next disabled'><a href='#'>"; else { echo "class='next'><a href='?page=".++$page."&limit=$limit&key=$key&filterby=$filterby'>"; $page--; } ?> → </a></li>
		</ul>
	</div>	
</div> 

      <! -- ROW OF PANELS -->
          <div class="row">
            
            <!-- WEATHER-2 PANEL -->
            <?php foreach($result as $key=>$value)
            {?>
            <div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="weather-2 pn">
                <div class="weather-2-header">
                  <div class="row">
                    <div class="col-sm-12 col-xs-12">
                      <p><?php echo strtoupper($value['title']);?></p>
                    </div>
                  </div>
                </div><!-- /weather-2 header -->
                <div class="row centered" style="margin-top:15px; margin-bottom:15px;">
                  <a href="list_recipe_details.php?id=<?php echo $value['id'];?>"
                  ><img src="../uploads/<?php if($value['image']) { echo $value['image']; } else { echo "recipedefault.png"; }?>" class="img-circle" width="120" height="120"></a>     
                </div>



                <div class="row data">
                  <div class="col-sm-7 col-xs-7 goleft">
                    <h5>Cooking Time: <?php echo $value['cook_time'];?></h5>
                    <h5>Preparation Time: <?php echo $value['prep_time'];?></h5>
                  </div>
                  <div class="col-sm-5 col-xs-5 goright">
                    <h5>Spicy: <?php echo $value['spicy'];?></h5>
                    <h5>Serves: <?php echo $value['serves'];?></h5>
                  </div>
                </div>
              </div>
              
            </div><! --/col-md-4 -->
            <?php }?>
            
          </div><!-- /END ROW OF PANELS -->


    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
<footer class="site-footer">
    <div class="text-center">
        2015 -- recipes
          <a href="#" class="go-top">
            <i class="fa fa-angle-up"></i>
          </a>
    </div>
</footer>
      <!--footer end-->
  
<?php  
    
   require 'script.php';
   //require_once('list_ingredients.php');
    ?>
  
  </script>
  <script type="text/javascript">
  $("#search").keyup(function(event){
    if(event.keyCode == 13){
        $("#btnenter").click();
    }
});
  </script>

 
                </div>
                </div>
                </div>
                </div> 
   
 </body>
</html>        
<?php }} 
else
{
	header("location:index.php");
}?>
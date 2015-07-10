<?php
session_start();
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
	$search= "where name LIKE '%$key%'";
	else 
	$search='where 1';

$sql="SELECT * FROM users $search LIMIT {$startpoint}, {$limit}";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

$sql1="SELECT name FROM users";
$stmt=$conn->prepare($sql1);
$stmt->execute();
$result1=$stmt->fetchAll(PDO::FETCH_ASSOC);
$total_records=count($result1);
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
          <section class="wrapper site-min-height">
            <div class="col-md-4">
              <h3><i class="fa fa-angle-right"></i> User Details </h3>
            </div>
            <div class="col-md-4">
			        <div class="input-group" style="margin-top:20px;">
        				<input class="form-control" id="search" type="text" aria-controls="example1" 
        				 placeholder="Search by Name" value="">
        				<span class="input-group-btn"><button id="btnenter" class="btn btn-primary btn-flat fa fa-search" style="line-height: 20px;" 
        				onclick="window.location.href='?&key='+(document.getElementById('search').value);'&page=<?php echo $page;?>&limit=<?php echo $limit;?>'"></button></span>
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
				
	                  

              <div class="row mt" >
                  <div class="col-md-12 col-sm-12 col-xs-12" >
                      <div class="content-panel" style="overflow-x:scroll;">
                          <table class="table table-striped table-advance table-hover" >
	                  	  	  
	                  	  	  
                              <thead>
                              <tr>
                                  <th style="width:15%">Id</th>
                                  <th >Name</th>
                                  <th >Email</th>
                                  <th >Joining Date</th>
                              </tr>
                              </thead>
                              <tbody>
                               <?php
                               foreach($result as $key=>$subarray)
                               {
                               ?> 
                                   <tr>
                                  <td ><?php echo $subarray['id'];?> </td>
                                  <td ><?php echo $subarray['name'];?> </td>
                                  <td ><?php echo $subarray['email'];?> </td>
                                  <td ><?php echo $subarray['created_on'];?> </td>
                                  </tr>
                              <?php 
                              }
                              ?>
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

		</section><!-- --/wrapper ---->
      </section>

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
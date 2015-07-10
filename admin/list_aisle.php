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
	$search= "where title LIKE '%$key%'";
	else 
	$search='where 1';

$sql="SELECT * FROM aisles $search LIMIT {$startpoint}, {$limit}";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

$sql1="SELECT id FROM aisles";
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
              <h3><i class="fa fa-angle-right"></i> Aisle Details </h3>
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
				
	                  

              <div class="row mt" >
                  <div class="col-md-12 col-sm-12 col-xs-12" >
                      <div class="content-panel" style="overflow-x:scroll;">
                          <table class="table table-striped table-advance table-hover" >
	                            <thead>
                              <tr>
                                  <th style="width:15%">Id</th>
                                  <th style="width:70%">Title</th>
                                  <th style="width:15%">Edit/Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                               <?php
                               foreach($result as $key=>$subarray)
                               {
                                
                                ?> 
                                   <tr>
                                  <td ><?php echo $subarray['id'];?> </td>
                                  <td ><?php echo $subarray['title'];?> </td>
                                    
                                  
                                  <td>
                                      
                                      <div class="btn btn-primary btn-xs" type="submit">
                                      <a href="edit_aisle.php?id=<?php echo $subarray['id'];?>" style="color:white"><i class="fa fa-pencil"></i></a></div>
                                      <div class="btn btn-danger btn-xs" type="submit"><a href="#myModal2" data-toggle="modal" data-target="#myModal2" 
                                      class="evtSend1" vid="<?php echo $subarray['id'];?>" style="color:white" ><i class="fa fa-trash-o "></i></a></div>
                                  </td>
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

<script>
$('.evtSend1').on('click', function (e) { 

e.preventDefault();

var vid=$(this).attr('vid');

//alert(vid);

$.post("functions1.php",
{
vid: vid,
},

function(data){
//alert(data);

$('#inside1').empty();

$('#inside1').append(data).fadeIn(1000);
});
}); 
</script>
</script>
  <script type="text/javascript">
  $("#search").keyup(function(event){
    if(event.keyCode == 13){
        $("#btnenter").click();
    }
});
  </script>


  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Do You Really Want To Delete The Aisle ?</h4>
                      </div>
                      <div class="modal-body" style="max-height:40%;">
                      <div id="inside1">
                                             
                      </div>
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
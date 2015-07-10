<?php
session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);	
$limit = 9;
$startpoint = ($page * $limit) - $limit;
$key=$_GET['key'];
if($key)
	$search= "where title LIKE '%$key%'";
	else 
	$search='where 1';	
	
	
$sql="SELECT * FROM recipe_type $search order by title LIMIT {$startpoint}, {$limit}";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

$sql1="SELECT title FROM recipe_type";
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

<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
<div class="col-md-4">
<h3><i class="fa fa-angle-right"></i> Recipe Types </h3>
</div>
  
<div class="col-md-3">
			<div class="input-group" style="margin-top:20px;">
				<input class="form-control" id="search" type="text" aria-controls="example1" 
				 placeholder="Search by Name" value="">
				<span class="input-group-btn"><button id="btnenter" class="btn btn-primary btn-flat fa fa-search" style="line-height: 20px;" 
				onclick="window.location.href='?&key='+(document.getElementById('search').value);'&page=<?php echo $page;?>&limit=<?php echo $limit;?>'"></button></span>
			</div>
</div>
<div class="col-md-5" style="text-align:right;">			
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

      <! -- ROW OF PANELS -->
          <div class="row">
            <! -- PROFILE 01 PANEL -->
            <?php foreach($result as $key=>$value){?>
            <div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="content-panel pn">
              <a href="edit_recipe_type.php?id=<?php echo $value['id'];?>" style="color:white">
                <div style="height:80%; width:100%; overflow:hidden;">
                  <img src="../uploads/<?php if($value['image']) { echo $value['image']; } else { echo "recipedefault.png"; }?>" height="100%" width="100%     " />
                </div>
                </a>
                <div class="profile-01 centered" style="padding-left:10px; padding-right:10px;">
                 <a href="#myModal21" data-toggle="modal" data-target="#myModal21" 
                  class="del_rec_type" vid="<?php echo $value['id'];?>" style="color:white" ><p><?php echo strtoupper($value['title']);?></p></a>
                </div>
              </div><! --/content-panel -->
            </div><! --/col-md-4 -->
            <?php }?>
          </div><! --/END ROW OF PANELS -->

    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
<footer class="site-footer">
          <div class="text-center">
              2015 -- recipes
              <a href="list_recipe_types.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  
<?php  
    
   require 'script.php';
    ?>
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
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
<script>
$('.del_rec_type').on('click', function (e) { 

e.preventDefault();

var vid=$(this).attr('vid');

//alert(vid);

$.post("functions5.php",
{
vid: vid,
},

function(data){
//alert(data);

$('#inside21').empty();

$('#inside21').append(data).fadeIn(1000);
});
}); 
</script>

<div class="modal fade" id="myModal21" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Do You Really Want To Delete The Recipe Type ?</h4>
                      </div>
                      <div class="modal-body" style="max-height:40%;">
                      <div id="inside21">
                                             
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
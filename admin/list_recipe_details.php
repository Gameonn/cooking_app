<?php
session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{

$id=$_GET['id'];
$sql1="SELECT r.id,r.title,r.image,r.created_on,r.prep_time,r.cook_time,r.diff_level,r.serves,r.spicy,r.video_url,r.method_html,r.recipe_type_id,r.is_featured,rt.title as rt_title FROM recipes r JOIN recipe_type rt ON r.recipe_type_id=rt.id WHERE r.id=:id"; 
$stmt=$conn->prepare($sql1);
$stmt->bindValue(':id',$id);
$stmt->execute();
$result1=$stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($result1);die;

$sql2="SELECT title FROM ingredients WHERE recipe_id=:id";
$stmt=$conn->prepare($sql2);
$stmt->bindValue(':id',$id);
$stmt->execute();
$result2=$stmt->fetchAll(PDO::FETCH_ASSOC);
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
           <div class="col-md-4"><h2><i class="fa fa-angle-right"></i> Recipe Details!! 
          </h2></div>
          <div class="col-md-4"><h4 style="margin-top: 25px;"><a style="color: #666666;
                  font-size: 16px;
                  border-radius: 4px;
                  -webkit-border-radius: 4px;
                  border: 1px solid #666666 !important;
                  padding: 2px 6px;
                  margin-right: 15px;"
                   href="#myModal22" data-toggle="modal" data-target="#myModal22" class="del_recipe" vid="<?php echo $result1[0]['id']; ?>">Delete Recipe</a>
                             </h4> </div>
              <div class="row mt">
                  <div class="col-md-12">
                   <div class="col-md-6">
				   
                   <h3><?php echo $result1[0]['title'];?></h3>
				   
                   <img src="../uploads/<?php if($result1[0]['image']) { echo $result1[0]['image']; } else { echo "recipedefault.png"; }?>" height="250px" width="80%">
                   
				          </div>
                   <div class="col-md-6"> 
				   
                   <ul class="nav pull-right top-menu">
                    <li><a href="#myModal5" data-toggle="modal" data-target="#myModal5" class="evtRecipe" vid="<?php echo $result1[0]['id']; ?>">Edit Recipe</a>
                   
                    </li></ul>
					
                   <ul style="list-style-type:none; color:black; margin-top: 50px; word-wrap:break-word;">
				   
                   <li class="col-sm-4"> Preparation Time :  </li>
                   <li class="col-sm-8"><?php echo $result1[0]['prep_time'];?></li><br><br>
                   <li class="col-sm-4"> Cooking Time : </li>
				           <li class="col-sm-8"><?php echo $result1[0]['cook_time'];?> </li><br><br>
                   <li class="col-sm-4"> Serves : </li>
				           <li class="col-sm-8"><?php echo $result1[0]['serves'];?> </li><br><br>
                   <li class="col-sm-4"> Difficulty Level : </li>
				           <li class="col-sm-8"><?php echo $result1[0]['diff_level'];?> </li><br><br>
                   <li class="col-sm-4"> Spicy : </li>
				           <li class="col-sm-8"><?php echo $result1[0]['spicy'];?> </li><br><br>
                   <li class="col-sm-4"> Link for the Video : </li>
        				   <li class="col-sm-8"><?php echo $result1[0]['video_url'];?> </li><br><br>
        				   <li class="col-sm-4"> Featured : </li>
        				   <li class="col-sm-8"><?php echo $result1[0]['is_featured'];?> </li><br><br>
                   <li class="col-sm-4"> Recipe_type : </li>
                   <li class="col-sm-8"><?php echo $result1[0]['rt_title'];?> </li>
        				   </ul>
				   
                  
                  </div>
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->



             <div class="row mt">
                  <div class="col-md-12" style="padding-top:20px;">
                   <div class="col-md-6">
                   <h3>Directions</h3>
                   <div class="well">
				   <?php 
                   echo str_ireplace(".","."."<br>",$result1[0]['method_html']);
                   ?>
                   </div>

                   </div>
                   <div class="col-md-6"> 
				   
                   <ul class="nav pull-right top-menu">
                    <li><a href="#myModal7" data-toggle="modal" data-target="#myModal7" class="evtIngre" vid="<?php echo $result1[0]['id']; ?>" style="color:#666666; border: 1px solid #666666;">Edit Ingredients</a>
                   
                    </li></ul>
                   <h3>Ingredients</h3>
                   <div class="well">
				   <?php foreach($result2 as $key=>$value){
					   echo $value['title']."<br>";
				   }
                   
                   ?>
                  
				      </div>
                   <a href="#myModal9" data-toggle="modal" data-target="#myModal9" class="evtDltIngre" vid="<?php echo $result1[0]['id']; ?>" 
                    style="color:#666666; border: 1px solid #666666; float:right;font-size: 16px;-webkit-border-radius: 4px;border: 1px solid #666666;padding: 2px 6px;margin-right: 15px;">Delete Ingredients</a>
                  </div>
				  
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
$('.evtRecipe').on('click', function (e) { 

e.preventDefault();

var vid=$(this).attr('vid');

//alert(vid);

$.post("functions.php",
{
vid: vid,
},

function(data){
//alert(data);

$('#myModal6').empty();

$('#myModal6').append(data).fadeIn(1000);
});
}); 
</script>


<script>
$('.evtIngre').on('click', function (e) { 

e.preventDefault();

var vid=$(this).attr('vid');

//alert(vid);

$.post("functions2.php",
{
vid: vid,
},

function(data){
//alert(data);

$('#myModal8').empty();

$('#myModal8').append(data).fadeIn(1000);
});
}); 
</script>

<script>
$('.evtDltIngre').on('click', function (e) { 

e.preventDefault();

var vid=$(this).attr('vid');

//alert(vid);

$.post("functions3.php",
{
vid: vid,
},

function(data){
//alert(data);

$('#myModal10').empty();

$('#myModal10').append(data).fadeIn(1000);
});
}); 
</script>

<script>
$('.del_recipe').on('click', function (e) { 

e.preventDefault();

var vid=$(this).attr('vid');

//alert(vid);

$.post("functions6.php",
{
vid: vid,
},

function(data){
//alert(data);

$('#inside22').empty();

$('#inside22').append(data).fadeIn(1000);
});
}); 
</script>

<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">RECIPE DETAILS</h4>
</div>
                      <div class="modal-body" style="max-height: 450px; overflow-y: auto;" >
                      <div id="myModal6"></div>
                       
                </div>
                </div>
                </div>
                </div>

<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">INGREDIENT DETAILS</h4>
</div>
                      <div class="modal-body" style="max-height: 450px; overflow-y: auto;" >
                      <div id="myModal8"></div>
                       

                </div>
                </div>
                </div>
                </div>                 

<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">DELETE INGREDIENT</h4>
</div>
                      <div class="modal-body" style="max-height: 450px; overflow-y: auto;" >
                      <div id="myModal10"></div>
                       

                </div>
                </div>
                </div>
                </div> 

<div class="modal fade" id="myModal22" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Do You Really Want To Delete The Recipe ?</h4>
                      </div>
                      <div class="modal-body" style="max-height:40%;">
                      <div id="inside22">
                                             
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
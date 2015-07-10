<?php
session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
?>
<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-danro.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">All Details.....</h5>
       
                  <li class="mt">
                      <a href="dashboard.php" <?php if(stripos($_SERVER['REQUEST_URI'],"dashboard.php")) echo 'class="active "'; ?>>
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  
                  

                  <li class="sub-menu" >
                      <a href="#" <?php if(stripos($_SERVER['REQUEST_URI'],"list_aisle.php")) echo 'class="active"'; ?>>
                          <i class="fa fa-tasks"></i>
                          <span>Aisles</span>
                      </a>
                      <ul class="sub" style="overflow: hidden; display: block;">
                          <li  <?php if(stripos($_SERVER['REQUEST_URI'],"list_aisle.php")) echo 'class="active"'; ?>><a href="list_aisle.php">List Aisles</a></li>
                          <li><a href="#" data-toggle="modal" data-target="#myModal">Add Aisles</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu" >
                      <a href="#"  <?php if(stripos($_SERVER['REQUEST_URI'],"list_recipe_types.php")||stripos($_SERVER['REQUEST_URI'],"list_recipes.php")||stripos($_SERVER['REQUEST_URI'],"add_recipes.php")||stripos($_SERVER['REQUEST_URI'],"add_recipe_type.php")) echo 'class="active "'; ?>>
                          <i class="fa fa-tasks"></i>
                          <span>Recipes</span>
                      </a>
                      <ul class="sub" style="overflow: hidden; display: block;">
                          <li <?php if(stripos($_SERVER['REQUEST_URI'],"list_recipes.php")) echo 'class="active"'; ?> >
                            <a href="list_recipes.php">List Recipes</a>
                          </li>
                          <li <?php if(stripos($_SERVER['REQUEST_URI'],"list_recipe_types.php")) echo 'class="active"'; ?> >
                            <a href="list_recipe_types.php">List Recipe Types</a>
                          </li>
                          <li <?php if(stripos($_SERVER['REQUEST_URI'],"add_recipes.php")) echo 'class="active"'; ?> >
                            <a href="add_recipes.php" >Add Recipes</a>
                          </li>
                          <li <?php if(stripos($_SERVER['REQUEST_URI'],"add_recipe_type.php")) echo 'class="active"'; ?> >
                            <a href="add_recipe_type.php" >Add Recipe Type</a>
                          </li>
                      </ul>
                  </li>

                  <li class="sub-menu ">
                      <a href="#"  <?php if(stripos($_SERVER['REQUEST_URI'],"list_ingredient_type.php")||stripos($_SERVER['REQUEST_URI'],"add_ingredients.php")||stripos($_SERVER['REQUEST_URI'],"list_ingredients.php")||stripos($_SERVER['REQUEST_URI'],"add_ingredient_type.php")) echo 'class="active "'; ?>>
                          <i class="fa fa-tasks"></i>
                          <span>Ingredients</span>
                      </a>
                      <ul class="sub" style="overflow: hidden; display: block;">
                          <!--<li><a href="list_ingredients.php">List Ingredients</a></li>-->
                          <li  <?php if(stripos($_SERVER['REQUEST_URI'],"list_ingredient_type.php")) echo 'class="active"'; ?>><a href="list_ingredient_type.php">List Ingredient Types</a></li>
                          <li  <?php if(stripos($_SERVER['REQUEST_URI'],"list_ingredients.php")) echo 'class="active"'; ?>><a href="list_ingredients.php">List Ingredients</a></li>
                          <li   <?php if(stripos($_SERVER['REQUEST_URI'],"add_ingredients.php")) echo 'class="active"'; ?>><a href="add_ingredients.php">Add Ingredients</a></li>
                          <li   <?php if(stripos($_SERVER['REQUEST_URI'],"add_ingredient_type.php")) echo 'class="active"'; ?>><a href="add_ingredient_type.php">Add Ingredient Type</a></li>

                      </ul>
                  </li>
                    
                  
                  
               </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
<?php require_once('aisle.php');  
}} 
else
{
	header("location:index.php");
}?>
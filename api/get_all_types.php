<?php

require_once('../phpInclude/dbconnection.php');
require_once('../GeneralFunctions.php');

$success=$msg="0";
$data=array();

 $dish_type= GeneralFunctions::getAllRecipesTypes();
  $ingredients= GeneralFunctions::getAllIngredientsTypes();
   $ready_time= GeneralFunctions::getReadyTime();
   $featured= GeneralFunctions::getfeatured();
   if($dish_type || $ingredients || $ready_time || $featured){
 $success='1';
$msg='Success';  	
 }
 else{
  $success='1';
$msg='No Records Found';  
$data=[];
 }      


  echo json_encode(array("success" => $success, "msg"=>$msg,"dish_type" => $dish_type, "ingredients"=>$ingredients, "ready_time"=>$ready_time, "featured"=>$featured));
?>
<?php

require_once('../phpInclude/dbconnection.php');
require_once('../GeneralFunctions.php');

$success=$msg="0";
$data=array();
$favorites=array();

$ingredient_type_id = $_REQUEST['ingredient_type_id'];
$recipe_type_id = $_REQUEST['recipe_type_id'];
$cook_time=$_REQUEST['ready_time'];
$user_id=$_REQUEST['user_id']?$_REQUEST['user_id']:0;
$page=$_REQUEST['page'] ? $_REQUEST['page'] : 1;
$limit=$_REQUEST['limit'] ? $_REQUEST['limit'] : 15;
$startIndex=($page-1)*$limit;


 $data= GeneralFunctions::getRecipe($ingredient_type_id,$recipe_type_id,$cook_time,$user_id,$startIndex,$limit);
 
 $total_records= GeneralFunctions::gettotalRecordsSearch($ingredient_type_id,$recipe_type_id,$cook_time,$user_id);

 
 /* if($user_id){
  $favorites= GeneralFunctions::getAllFavorites($user_id);
  $favorites=$favorites?$favorites:[];
  
  } */
   if($data){
 $success='1';
$msg='Success';  	
 }
 else{
  $success='1';
$msg='No Records Found';  
$data=[];
 }      


  echo json_encode(array("success" => $success, "msg"=>$msg,"data" => $data, "total_records" => $total_records));
?>
<?php

require_once('../phpInclude/dbconnection.php');
require_once('../GeneralFunctions.php');

$success=$msg="0";
$data=array();

$user_id=$_REQUEST['user_id']?$_REQUEST['user_id']:0;
$recipe_id= $_REQUEST['recipe_id'];

if(!($recipe_id)) {
$success='0';
$msg='Incomplete Parameters';
} 
else{

 $data= GeneralFunctions::getRecipeDetails($recipe_id,$user_id);
   if($data){
 $success='1';
$msg='Success';  	
 }
 else{
  $success='1';
$msg='No Records Found';  
$data=[];
 }      
}

  echo json_encode(array("success" => $success, "msg"=>$msg,"data" => $data));
?>
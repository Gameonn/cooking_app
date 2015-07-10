<?php

require_once('../phpInclude/dbconnection.php');
require_once('../GeneralFunctions.php');

$success=$msg="0";
$data=array();
$favorites=array();
$user_id=$_REQUEST['user_id']?$_REQUEST['user_id']:0;
$keyword = $_REQUEST['keyword'];
$page=$_REQUEST['page'] ? $_REQUEST['page'] : 1;
$limit=$_REQUEST['limit'] ? $_REQUEST['limit'] : 15;
$startIndex=($page-1)*$limit;
if(!($keyword)) {
$success='0';
$msg='Incomplete Parameters';
} 
else {

 $total_records= GeneralFunctions::gettotalRecordsKey($keyword,$user_id);
 $data= GeneralFunctions::getRecipeByKey($keyword,$user_id,$startIndex,$limit);
 
 /*if($user_id){
  $favorites= GeneralFunctions::getAllFavorites($user_id);
  $favorites=$favorites?$favorites:[];
  
  }*/
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

  echo json_encode(array("success" => $success, "msg"=>$msg,"data" => $data, "total_records" => $total_records));
?>
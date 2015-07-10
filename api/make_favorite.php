<?php
//this is an api category

// +-----------------------------------+
// + STEP 1: include required files    +
// +-----------------------------------+
require_once('../phpInclude/dbconnection.php');
require_once('../GeneralFunctions.php');

$success=$msg="0";$data=array();
// +-----------------------------------+
// + STEP 2: get data				   +
// +-----------------------------------+
$rid=$_REQUEST['recipe_id'];
$uid=$_REQUEST['user_id'];


// +-----------------------------------+
// + STEP 3: perform operations		   +
// +-----------------------------------+

$sql="select recipe_id from favorites where user_id=:user_id and recipe_id=:recipe_id";
$sth=$conn->prepare($sql);
$sth->bindValue("user_id",$uid);
$sth->bindValue("recipe_id",$rid);
try{$sth->execute();}
catch(Exception $e){}
$r=$sth->fetchAll(PDO::FETCH_ASSOC);

if(count($r)){
$success=1;
$msg='Already Exist';

}
else{

$sql="insert into favorites values(DEFAULT,:user_id,:recipe_id,NOW())";
$sth=$conn->prepare($sql);
$sth->bindValue('recipe_id',$rid);
$sth->bindValue('user_id',$uid);
$count=0;
try{$count=$sth->execute();}
catch(Exception $e){echo $e->getMessage();}

if($count){
   $data= GeneralFunctions::getAllFavorites($uid);
	$success="1";
	$msg="Favorite list updated";
}
else{
$success=0;
$msg="Error occured";
}
}
// +-----------------------------------+
// + STEP 4: send json data			   +
// +-----------------------------------+
if($success==1){
echo json_encode(array("success"=>$success,"msg"=>$msg,"data"=>$data));
}
else
echo json_encode(array("success"=>$success,"msg"=>$msg));
?>
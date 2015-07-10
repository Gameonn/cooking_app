<?php
require_once('../phpInclude/dbconnection.php');
require_once('../classes/AllClasses.php');

$token= $_REQUEST['token'];
$description= $_REQUEST['description'];
$location= $_REQUEST['location'];

$user = new Users;
$general = new GeneralFunctions;

if($token){
	$user_id=$user->getUserId($token);
	echo $user_id;die;
	$hangout_id=$general->createHangout($user_id,$description,$location);
	$details=$general->getHangoutDetails($hangout_id);

    $success='1';
    $msg='Hangout created';
}

echo json_encode(array('success'=>$success,'msg'=>$msg, 'details'=>$details));
?>
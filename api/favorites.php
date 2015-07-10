<?php

require_once('../phpInclude/dbconnection.php');
require_once('../GeneralFunctions.php');

$success=$msg="0";
$data=array();
$access_token = $_REQUEST['access_token'];

if (empty($access_token)) {
    echo json_encode(array("success" => '0', "msg" => 'Incomplete Parameters'));
} 
else {
    $uid = GeneralFunctions::getuserid($access_token);
    $uid=$uid[0]['id'];
	if($uid){
    $data= GeneralFunctions::getAllFavorites($uid);
    if($data){
    $success='1';
    $msg='Favorites List';
    }
    else{
    $success='0';
    $msg='No Favorites Found';
    $data=[];
    }
    }
    else{
    $success='0';
    $msg='Invalid access_token';
    }
    echo json_encode(array("success" => $success, "msg" => $msg,"data"=>$data));
}
?>
<?php
//this is an api to register users on the server

// +-----------------------------------+
// + STEP 1: include required files    +
// +-----------------------------------+
require_once('../phpInclude/dbconnection.php');
require_once('../GeneralFunctions.php');

$success=$msg="0";$data=array();
// +-----------------------------------+
// + STEP 2: get data				   +
// +-----------------------------------+
$fbid=$_REQUEST['fbid'];
$googleid=$_REQUEST['googleid'];
$email=$_REQUEST['email'];
$name=$_REQUEST['name']?$_REQUEST['name']:'';
$password=isset($_REQUEST['password']) && $_REQUEST['password'] ? $_REQUEST['password'] : '';


global $conn;

if(!($email && ($fbid || $googleid))){
	$success="0";
	$msg="Incomplete Parameters";
	$data=array();
}

	else{ 
	if($fbid)
	$sth=$conn->prepare("select * from users where email=:email and fbid=:fbid");
	elseif($googleid)
	$sth=$conn->prepare("select * from users where email=:email and googleid=:googleid");
	
	$sth->bindValue("email",$email);	
	if($fbid) $sth->bindValue("fbid",$fbid);
	if($googleid) $sth->bindValue("googleid",$googleid);
	try{$sth->execute();}catch(Exception $e){echo $e->getMessage();}
	$res=$sth->fetchAll(PDO::FETCH_ASSOC);
	
	if(count($res)){
	if($fbid)
	$uid=$fbid;
	elseif($googleid)
	$uid=$googleid;
	
	 $data= GeneralFunctions::fbsignin($uid,$email);
	$success="1";
	$msg="Login Successful";
	}		
	
	else{	
		
	$code=md5($email . rand(1,9999999));
	$sql="insert into users values(DEFAULT,:fbid,:googleid,:name,:email,:token,NOW(),:password)";
		$sth=$conn->prepare($sql);
		if($fbid)$sth->bindValue("fbid",$fbid);
		else $sth->bindValue("fbid","");
		if($googleid)$sth->bindValue("googleid",$googleid);
		else $sth->bindValue("googleid","");
		$sth->bindValue("name",$name);
		$sth->bindValue("email",$email);
		$sth->bindValue("password",$password);
		$sth->bindValue('token',$code);
		$count=0;
		try{$count=$sth->execute();
		$uid=$conn->lastInsertId();
		}
		catch(Exception $e){
		echo $e->getMessage();
		}

		
		if($count){
		$success="1";
		$msg="Users Successfully registered";
		$data['access_token']=$code;
		$data['user_id']=$uid;
		}
	
	}	
}
if(!$code){$code="";}

// +-----------------------------------+
// + STEP 4: send json data			   +
// +-----------------------------------+
if($success==1){
echo json_encode(array("success"=>$success,"msg"=>$msg,"data"=>$data));
}
else
echo json_encode(array("success"=>$success,"msg"=>$msg));
?>
<?php

require_once('../phpInclude/dbconnection.php');

error_reporting(1);

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
if (empty($email) && empty($password)) {
    echo json_encode(array($success => '0', $msg => 'Incomplete Parameters'));
} else {
    $sth = $conn -> prepare("select * from users where email=:email and password=:password");
    $sth->bindValue("email", $email);
    try {
        $sth->execute();
    } catch (Exception $e) {
        $e->getMessage();
    }
    $result->$sth->fetchAll();
    if (count($result) != 0) {
    $success = "1";
    $msg = "Login successful";
    $user_id = $result[0]['id'];
    $data = array(
        "user_id" => $result[0]['id'],
        "email" => $result[0]['email'] != null ? $result[0]['email'] : "",
        "name" => $result[0]['name'] != null ? $result[0]['name'] : "",
        "image" => $result[0]['image'] != null ? BASE_PATH . "/timthumb.php?src=uploads/" . $result[0]['image'] . "" : ($result[0]['fbid'] != null ? "http://graph.facebook.com/{$result[0]['fbid']}/picture?" : BASE_PATH . "/timthumb.php?src=uploads/dumy_user.png"),
    );
    echo json_encode(array("success" => '1', 'profile' => $data));
}
}
?>
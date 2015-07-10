<?php

require_once ('../phpInclude/dbconnection.php');

$user_id = $_REQUEST['user_id'];

if (empty($user_id)) {
    echo json_encode(array("$success" => '0', $msg => 'Incomplete Parameters'));
} else {
    $sql = "select title, image, from recipes where user_id = '$user_id'";
}
?>


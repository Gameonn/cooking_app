<?php

require_once('../phpInclude/dbconnection.php');
require_once('../GeneralFunctions.php');
{
    $rst = GeneralFunctions::getAllIngredients();
    echo json_encode(array("success" => '1', "data" => $rst));
}
?>
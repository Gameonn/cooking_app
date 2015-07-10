<?php
//error_reporting(0);
$servername = $_SERVER['HTTP_HOST'];
$pathimg=$servername."/";
define("ROOT_PATH",$_SERVER['DOCUMENT_ROOT']);
define("UPLOAD_PATH","http://code-brew.com/projects/recipe/");
define("BASE_PATH","http://54.191.53.4/recipe/");

$DB_HOST = 'localhost';
$DB_DATABASE = 'recipe';
$DB_USER = 'root';
$DB_PASSWORD = 'newrecipe';



define('SMTP_USER','pargat@code-brew.com');
define('SMTP_EMAIL','pargat@code-brew.com');
define('SMTP_PASSWORD','core2duo');
define('SMTP_NAME','Gambay');
define('SMTP_HOST','mail.code-brew.com');
define('SMTP_PORT','25');

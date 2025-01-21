<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dhuro gjak db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}


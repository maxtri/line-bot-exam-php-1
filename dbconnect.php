<?php

$servername = 'localhost';
$db = 'admin_demo';
$username = 'root';
$password = '';

$connect = new mysqli($servername,$username,$password,$db);

if ($connect->connect_error){
	echo "Connect Success";
}else{
	echo "Connect False";
}
<?php

$servername = 'localhost';
$username = 'root';
$password = '';

$connect = new mysqli($servername,$username,$password);

if ($connect->connect_error){
	echo "Connect Success";
}else{
	echo "Connect False";
}
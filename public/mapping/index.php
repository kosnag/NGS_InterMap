<?php
include "../api/mysql.php";

if(isset($_COOKIE["session"])){
	$stmt = $PDO -> query("select session from interactive_map.auth__sessions where session='".$_COOKIE["session"]."' ");
	$session_check = $stmt -> fetch(PDO::FETCH_ASSOC);
	$stmt = $PDO -> query("select auth__sessions.id,session from interactive_map.auth__sessions inner join interactive_map.auth__users on interactive_map.auth__sessions.id=interactive_map.auth__users.id where session='".$_COOKIE["session"]."' ");
	$session_data = $stmt -> fetch(PDO::FETCH_ASSOC);
	include "edit/index.php";
}else{
	include "auth/index.html";
}

<?php
include "../api/mysql.php";

$query = $mysql -> query("select session from kosnag_map.".$datatables["auth"]["sessions"]." where session='".$_COOKIE["session"]."' ");
$session_check = $query -> fetch_assoc();

if (isset($session_check["session"])){
	$query = $mysql -> query("select ".$datatables["auth"]["sessions"].".id,session from kosnag_map.".$datatables["auth"]["sessions"]." inner join kosnag_map.".$datatables["auth"]["users"]." on kosnag_map.".$datatables["auth"]["sessions"].".id=kosnag_map.".$datatables["auth"]["users"].".id where session='".$_COOKIE["session"]."' ");
	$session_data = $query -> fetch_assoc();
	include "edit.php";
} else {
	include "auth.html";
}
?>
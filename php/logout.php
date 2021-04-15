<?php
require_once "session-start.php";

$_SESSION = array();
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),session_id(),time()-3600,'/');
}
	session_destroy();

	header("Location: ../Html/login.php");

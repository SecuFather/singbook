<?php 
	$login = $_POST['login'];
	$password = $_POST['password'];
	$result = mysql_query("SELECT login FROM users WHERE login='$login' AND password='$password';");
	if($result){
		$r = mysql_fetch_assoc($result);
		$_SESSION['logged'] = $r['login'];
	}
?>
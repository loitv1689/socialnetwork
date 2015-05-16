<?php
	$userinfo = User::where('user_id','=', Session::get('user_id'))->get();
	echo "<pre>";
	print_r($userinfo);
	echo "</pre>"
?>
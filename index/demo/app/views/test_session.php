<?php session_start();
?>
<HTML>
<HEAD>
<TITLE>::Welcome to PHP</TITLE>
</HEAD>
<BODY>
<h4>Session_ID</h4>
<?php
$sessionid=session_id();
echo $sessionid;
?>
</BODY>
</HTML>
<?php
header('Content-type: text/json');
header('Content-type: application/json');
$SID = session_id(); 
if(empty($SID)){
	session_start();
}
$text='({ "MapUrl": "",  "Sucs": "belgoogle" })';
echo $_GET['callback'].$text;
?>
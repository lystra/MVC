<?php
if(isset($page_name))
{
    $filename = './view/'.$page_name.'.php'; //Check to make sure file exists
	if (file_exists($filename))
	{
	require_once($filename);
	}
	else
	{
	require_once('./view/error.php'); //If file doesnt exist show error page
	}
}
else
{
    require_once('./view/index.php');
}
?>
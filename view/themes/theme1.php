<?php
//DO NOT CHANGE
if(isset($_GET['page']))
{
$page_name= $_GET['page'];
}
//END DO NOT CHANGE
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="iso-8859-1">
<!--META INFO-->
<title><?php if(isset($page_name)){echo str_replace('-', ' ', ucfirst($page_name));}else{echo ucfirst($my_page);}?></title>
<meta name="Description" content="" />
<meta name="keywords" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!---STYLESHEETS--->
<link rel="stylesheet" href="./view/themes/css/theme1.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!---JS SCRIPTS--->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php require_once('./view/themes/includes/nav1.php');?>

<div class="container" style="margin-top:65px;">

<?php require_once('./controller/pageRouter.php'); //DO NOT CHANGE?>

</div>

<?php require_once('./view/themes/includes/footer1.php');?>

</body>
</html>
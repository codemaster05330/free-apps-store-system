<?php
$Dir="../";
include_once('../layout/upperBar.php');

if(isSignedIn())
{
    if($_SESSION['userLevel']!=0)
    {
        header('location:'.$Dir.'/index.php');
        exit(); 
    }
}
else
{
    header('location:'.$Dir.'/index.php');
    exit();
}
?>
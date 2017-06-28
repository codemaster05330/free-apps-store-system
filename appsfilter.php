<?php
$appsFilter="";
$APPSCOUNT=8;
$sort="";

if(isset($_GET['st']))
{
   $offset=$_GET['st']; 
}
else
{
    $offset=0;
} 


if(isset($_GET['p']))
{
    $_SESSION['platform']=$_GET['p'];
} 
if(isset($_GET['mc']))
{
    $_SESSION['mCat']=$_GET['mc'];
}
if(isset($_GET['sc']))
{
    $_SESSION['sCat']=$_GET['sc'];
}
if(isset($_GET['sort']))
{
    $_SESSION['sort']=$_GET['sort'];
}   

if(isset($_SESSION['platform']))
{
 $appsFilter .=" AND appPlatformID={$_SESSION['platform']} ";   
}

if(isset($_SESSION['mCat']))
{
  
    $appsFilter .=" AND appMainCatID={$_SESSION['mCat']} ";   
}

if(isset($_SESSION['sCat']))
{
   
    $appsFilter .=" AND appSubCatID={$_SESSION['sCat']} ";   
}

if(isset($_SESSION['sort']))
{
    $sort="{$_SESSION['sort']}";  
}
else
{
    $_SESSION['sort']="appDownloads"; 
    $sort="appDownloads"; 
}
?>
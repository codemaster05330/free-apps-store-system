<?php
include_once('../includes/common.functions.php');
include_once('../includes/login.functions.php');
if(isSignedIn())
{
    if($_SESSION['userLevel'] !=1)
    {
        logError("you don't have developer account");
         header('location:./index.php');
       // echo "don't have developer account";
        exit(); 
    }
}
else
{
   header('location:./index.php');
  //echo "unsigned";
    exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>edit developer account</title>
    <link rel="stylesheet" href="../styles/mainStyle.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/dashboard.css" type="text/css"/>
</head>

<body>
<div id="upperPanel">
<?php
include_once('./layout/userUpperBar.php');
?>
</div>

<div id="wrapper">

<div id="navigationBar">
<?php
include_once('./layout/userMenu.php');
?>
</div>
<div id="content">
<?php
echo '<p id="error">';
printError();
printSuccess();
echo'</p>';
if(isset($_POST['newDev']))
{
  $id=$_SESSION['userID'];
  $devID=$_SESSION['devID'];
  $devName=$_POST['devName'];
  $devEmail=$_POST['devEmail'];
 $devSite=$_POST['devSite'];
 $devLogo=$_FILES['devLogo']['tmp_name'];
  if($devLogo!="")
 {
   $devLogo=addslashes($devLogo);
  $devLogo=file_get_contents($devLogo);
  $devLogo=base64_encode($devLogo);
  $logo=" ,develperLogo = '$devLogo' "  ;
 }
 else
 {
    $logo="";
 }

         
 $devAddress1=$_POST['devAdress1'];
 $devAddress2=$_POST['devAdress2'];
 $devState=$_POST['devState'];
 $devCity=$_POST['devCity'];
 $devCounry=$_POST['devCountry'];
 $devCode=$_POST['devCode'];
 $sql="SELECT * FROM developers WHERE developerName='$devName'";
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    $row=$result->fetch_assoc();
    if($result->num_rows==1 && $row['developerID']!=$devID)
    {
        
          logError("already registered Name.");  
          header('location:./editDevInfo.php');
          exit();
       
    }
    else
    {
        $sql="UPDATE developers SET developerName='$devName',developerEmail='$devEmail',developerWebsite='$devSite',
        country='$devCounry',city='$devCity',state='$devState',zipcode=$devCode,
        Address1='$devAddress1',Address2='$devAddress2',developerState=0 $logo WHERE developerID=$devID"; 
        
        $result=$mysqli->query($sql);
         if($result==true)
         {
            logSuccess("deveoper updated successfully ,it need approval to start publish ");
            header("location:./index.php");
            exit();
         }
         else
         {
            logError("something went wrong".mysql_error());
         }
        
    }
    
     header("location:./index.php");
        exit();
    
}
else
{
  include_once('./editDevInfoForm.php');  
}

?>
</div>

</div>
<div id="footer">
<?php
include_once('../layout/footerBar.php');
?>
</div>
</body>
</html>
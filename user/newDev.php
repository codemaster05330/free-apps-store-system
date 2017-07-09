<?php
include_once('../includes/common.functions.php');
include_once('../includes/login.functions.php');
if(isSignedIn())
{
    if($_SESSION['userLevel'] ==1)
    {
        logError("you already have developer account");
        header('location:./index.php');
        exit(); 
    }
}
else
{
    header('location:./index.php');
    exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Edit Profile</title>
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
    
 $devName=$_POST['devName'];
 $devEmail=$_POST['devEmail'];
 $devSite=$_POST['devSite'];
 $devLogo=$_FILES['devLogo']['tmp_name'];
 $devLogo=addslashes($devLogo);
 $devLogo=file_get_contents($devLogo);
 $devLogo=base64_encode($devLogo);
         
 $devAddress1=$_POST['devAdress1'];
 $devAddress2=$_POST['devAdress2'];
 $devState=$_POST['devState'];
 $devCity=$_POST['devCity'];
 $devCounry=$_POST['devCountry'];
 $devCode=$_POST['devCode'];
 $sql="SELECT * FROM developers WHERE developerName='$devName'";
    $result=mysql_query($sql)or die("query failed ".mysql_error());
    if(mysql_num_rows($result)==1)
    {
        logError("already registered Name.");
       
    }
    else
    {
        $sql="INSERT INTO developers (developerName,developerEmail,developerWebsite,develperLogo,authorID,
        country,city,state,zipcode,Address1,Address2,developerState)VALUES ('$devName','$devEmail',
        '$devSite','$devLogo',$id,'$devCounry','$devCity','$devState',$devCode,
        '$devAddress1','$devAddress2',0)";
        
        $result=$mysqli->query($sql);
         if($result==true)
         {
            logSuccess("deveoper created successfully ,it need approval to start publish ");
            
            $devID=$mysqli->insert_id;
            
            $sql="UPDATE users SET userLevel=1,relatedID=$devID WHERE 	userID=$id";
            $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
           
            header("location:./index.php");
            exit();
         }
         else
         {
            logError("something went wrong".mysql_error());
         }
        
    }
    
     header("location:./newDev.php");
        exit();
    
}
else
{
  include_once('./newDevForm.php');  
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
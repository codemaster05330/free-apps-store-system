<?php
include_once('reviews.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard</title>
</head>

<body>
<div id="wrapper">
<div id="upperPanel">
<?php
include_once('./layout/upperPanel.php');
?>
</div>
<div id="navigationBar">
<?php
include_once('./layout/menu.php');
?>
</div>
<div id="content">
<?php
printError();
printSuccess();
if(isset($_GET['action']))
{
    switch ($_GET['action'])
    {
        case "approve":
        if(isset($_GET['id']))//redirect if id isn't defined
        {
         approveReview($_GET['id'],$_SESSION['id']);   
        }
        header("location:./reviews.php");
        exit();
        break;
        case "unapprove":
         if(isset($_GET['id']))//redirect if id isn't defined
        {
            unapproveReview($_GET['id']);
           
        }
         header("location:./reviews.php");
            exit();
        break;
    }
}
else
{
   $sql='select reviews.reviewID,reviews.reveiwContent,reviews.approvedBy,reviews.reviewDate,users.userFirstName,users.userLastName,apps.appName
  from reviews,users,apps where reviews.authorID = users.userID and reviews.reviewAppID=apps.appID';
    $result=mysql_query($sql) or die("query failed due to ".mysql_error());
    if(mysql_num_rows($result)==0)
    {
        echo "no review till now";
    }
    else
    {
        displayReviews($result);
    }
    
}
    
?>
</div>
<div id="footer">
<?php
include_once('./layout/footer.php');
?>
</div>
</div>
</body>
</html>
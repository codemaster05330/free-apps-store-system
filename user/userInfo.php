<?php
$id=$_SESSION['userID'];
$sql="SELECT * FROM users WHERE userID=$id";
 $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
 if($result->num_rows==1)
 {
    $row=$result->fetch_assoc();
    echo '<table id="userInfo"><tr><td>';
    if($row['userImg']=="")
    {
        echo '<img src="../images/placeholder.jpg">';
    }
    else
    {
        echo '<img id="mediumIcon" src="data:image;base64,'.$row['userImg'].'">';
    }
    
    echo $row['userFirstName'] .' '.$row['userLastName'].'</td></tr>';
    echo '<tr><td>Email : '.$row['userEmail'].'</td></tr>' ;
    echo '<tr><td>Last Login : '.date('d-m-y',strtotime($row['lastLogin'])).'</td></tr></table>' ;    
    
 }
 else
 {
    header('location:../index.php');
    exit();
 }
?>




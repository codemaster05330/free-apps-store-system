<?php
$id=$_SESSION['userID'];

if(isset($_POST['updateLogo']))
{
    
}
elseif(isset($_POST['updateNames']))
{
    
}
elseif(isset($_POST['updateEmail']))
{
    
}
elseif(isset($_POST['updatePass']))
{
    
}
else
{
    

$sql="SELECT * FROM users WHERE userID=$id";
 $result=mysql_query($sql)or die("query failed ".mysql_error());
 if(mysql_num_rows($result)==1)
 {
    $row=mysql_fetch_assoc($result);
    echo '<form method="post" action="./editInfo.php" enctype="multipart/form-data"><table id="editInfo"><tr><td>';
    if($row['userImg']=="")
    {
        echo '<img src="../images/placeholder.jpg">';
    }
    else
    {
        echo '<img id="mediumIcon" src="data:image;base64,'.$row['userImg'].'">';
    }
    echo '<input  type="file" name="logo"/><input  type="submit" name="updateLogo" value="update"/></td></tr>';
    //echo '<tr><td>'.$row['userFirstName'] .' '.$row['userLastName'].'</td></tr>';
    
    echo '<tr><td>First Name :<input type="text" name="fName" value="'.$row['userFirstName'].'" />
           Last Name :<input type="text" name="lName" value="'.$row['userLastName'].'" />
            <input  type="submit" name="updateNames" value="update"/></td></tr>';
            
    echo '<tr><td>Email :<input type="text" name="email" value="'.$row['userEmail'].'" />
            <input  type="submit" name="updateEmail" value="update"/></td></tr>';
            
    echo '<tr><td>new Password :<input type="password" name="pass1" placeholder="type your new password "  />
           new Password again :<input type="password" name="pass2" placeholder="type your new password again " />
            <input  type="submit" name="updatePass" value="update"/></td></tr>';
                    
    echo '</table></form>' ;    
    
 }
 else
 {
    header('location:../index.php');
    exit();
 }
 }
?>



<?php
$id=$_SESSION['userID'];

if(isset($_POST['updateLogo']))
{
    
    $logo=$_FILES['logo']['tmp_name'];
    if($logo != "")
    {
         $logo=addslashes($logo);
         $logo=file_get_contents($logo);
         $logo=base64_encode($logo);
         $sql="UPDATE users SET userImg='$logo' WHERE userID=$id ";
         $result=$mysqli->query($sql);
         if($result==true)
         {
            logSuccess("image updated successfully");
         }
         else
         {
            logError("something went wrong");
         }
         
         
    }
    else
    {
        logError("select image first");
    }
    
    header("location:./editInfo.php");
    exit();
}
elseif(isset($_POST['updateNames']))
{
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    if($firstName !="" && $lastName !="")
    {
        $sql="UPDATE users SET userFirstName='$firstName' ,userLastName='$lastName' WHERE userID=$id ";
         $result=$mysqli->query($sql);
         if($result==true)
         {
            logSuccess("Names updated successfully");
         }
         else
         {
            logError("something went wrong");
         }
    }
    else
    {
        logError("empty fields");
    }
    
    header("location:./editInfo.php");
    exit();
}
elseif(isset($_POST['updateEmail']))
{
    
    $email=$_POST['email'];
    if($email !="")
    {
        $sql="UPDATE users SET userEmail='$email' WHERE userID=$id ";
         $result=$mysqli->query($sql);
         if($result==true)
         {
            logSuccess("email updated successfully");
         }
         else
         {
            logError("something went wrong");
         }
    }
    else
    {
        logError("empty fields");
    }
    
    header("location:./editInfo.php");
    exit();
    
}
elseif(isset($_POST['updatePass']))
{
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    if($password1==$password2 && $password1!="")
    {
        $password=md5($password1);
        $sql="UPDATE users SET userPassword='$password' WHERE userID=$id ";
         $result=$mysqli->query($sql);
         if($result==true)
         {
            logSuccess("password updated successfully");
         }
         else
         {
            logError("something went wrong");
         }
    }
    else
    {
        logError("empty or um matched fields");
    }
    
    header("location:./editInfo.php");
    exit();

    
}
else
{
    

$sql="SELECT * FROM users WHERE userID=$id";
 $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
 if($result->num_rows==1)
 {
    $row=$result->fetch_assoc();
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
            
    echo '<tr><td>new Password :<input type="password" name="password1" placeholder="type your new password "  />
           new Password again :<input type="password" name="password2" placeholder="type your new password again " />
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



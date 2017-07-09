<?php

/**
 * platform managment functions[add,update,new,del,edit,display]
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */

include_once('../includes/dbconfig.php');
include_once('../includes/common.functions.php');
/**
 * create html form for new platform
 */
function newPlatformForm()
{
    echo '<form action="./platform.php?action=add" method="post" enctype="multipart/form-data"  id="editForm">
        <label>Platform Name :</label><input type="text" name="name" /><br />
        <label>Platform Icon :</label><input type="file" value="upload" name="icon" /><br />
        <input  type="submit" name="submit" value="submit" />
        </form>';
}

/**
 * create html form for edit an existing platform and assign platform values to it 
 * @param int $id platform id in platforms table
 */
 function editPlatformForm($id)
 {
    global $mysqli;
    $sql="SELECT * FROM platforms WHERE platformID=$id";
            $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
            if($result->num_rows==0)//redirect if unknown id 
            {
                logError("unkown platform id");
              header("location:./platform.php");
            exit();  
            }
            else
            {//load platform content to be edited
             $row=$result->fetch_assoc();
             $name=$row['platformName'];
             $icon= $row['platformIcon'];
             $id=$row['platformID'];
             echo '<form action="./platform.php?action=update&id='.$id.'" method="post" enctype="multipart/form-data"  id="editForm">
                    <label>Platform Name :</label><input type="text" name="name" value="'.$name.'" /><br />
                    <label>Platform Icon :</label><input type="file" value="upload" name="icon" /><br />
                    <input  type="submit" name="submit" value="submit" />
                    </form>';  
            }
 }

/**
 * update an existing platform record
 * @param int $id platform id
 * @param string $name platform name
 * @param file $icon platform icon
 */
 function updatePlatform($id,$name,$icon)
 {
            global $mysqli;
          $icon=addslashes($icon);
          $icon=file_get_contents($icon);
          $icon=base64_encode($icon);
          $sql="UPDATE platforms SET platformName='$name',platformIcon='$icon' WHERE platformID=$id ";  
          $mysqli->query($sql)or die("query failed due to ".mysqli_error());
          logSuccess("platform updated successfully");
 } 
 
 /**
  * delete platfom from platforms table
  * @param int $id platform id
  */
  function delPlatform($id)
  {
    global $mysqli;
    $sql="DELETE FROM platforms WHERE platformID=$id ";
    $mysqli->query($sql)or die("query failed due to ".mysqli_error());
    logSuccess("platform deleted successfully");
  }
  
  /**
   * add new platform to platforms table
   * @param string $name platform name
   * @param file $icon platform icon
   */
  function addPlatform($name,$icon)
  {
    global $mysqli;
    $icon=addslashes($icon);
    $icon=file_get_contents($icon);
    $icon=base64_encode($icon);
    $sql="INSERT INTO platforms (platformName,platformIcon)VALUES('$name','$icon')";  
    $mysqli->query($sql)or die("query failed due to ".mysqli_error());
    logSuccess("platform added successfully");
   }
   
   /**
    * display all platforms
    * @param result $result query result
    */
   function displayPlatforms($result)
    {
        global $mysqli;
        echo '<table><tr><th>Platform</th><th>actions</th></tr>';
        while($row=$result->fetch_assoc())
        {
            echo '<tr><td id="appLogo"><img id="smallIcon" src="data:image;base64,'.$row['platformIcon'].'">'.$row['platformName'].'</td>';
            echo '<td><a href="./platform.php?action=edit&id='.$row['platformID'].'" id="hrefBtn">edit</a>';
            echo '<a href="./platform.php?action=del&id='.$row['platformID'].'" id="hrefBtn">delete</a></td></tr>';
        }
        echo '</table>';
    } 
?>
<?php

/**
 * platform managment functions[add,update,new,del,edit,display]
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */

include_once('../includes/dbconfig.php');

/**
 * create html form for new platform
 */
function newPlatformForm()
{
    echo '<form action="./platform.php?action=add" method="post" enctype="multipart/form-data">
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
    $sql="SELECT * FROM platforms WHERE platformID=$id";
            $result=mysql_query($sql) or die("query failed due to ".mysql_error());
            if(mysql_num_rows($result)==0)//redirect if unknown id 
            {
              header("location:./platform.php");
            exit();  
            }
            else
            {//load platform content to be edited
             $row=mysql_fetch_assoc($result);
             $name=$row['platformName'];
             $icon= $row['platformIcon'];
             $id=$row['platformID'];
             echo '<form action="./platform.php?action=update&id='.$id.'" method="post" enctype="multipart/form-data">
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
   
          $icon=addslashes($icon);
          $icon=file_get_contents($icon);
          $icon=base64_encode($icon);
          $sql="UPDATE platforms SET platformName='$name',platformIcon='$icon' WHERE platformID=$id ";  
          mysql_query($sql) or die("query failed due to ".mysql_error());
 } 
 
 /**
  * delete platfom from platforms table
  * @param int $id platform id
  */
  function delPlatform($id)
  {
    $sql="DELETE FROM platforms WHERE platformID=$id ";
    mysql_query($sql) or die("query failed due to ".mysql_error());
  }
  
  /**
   * add new platform to platforms table
   * @param string $name platform name
   * @param file $icon platform icon
   */
  function addPlatform($name,$icon)
  {
    $icon=addslashes($icon);
    $icon=file_get_contents($icon);
    $icon=base64_encode($icon);
    $sql="INSERT INTO platforms (platformName,platformIcon)VALUES('$name','$icon')";  
    mysql_query($sql) or die("query failed due to ".mysql_error());
   }
   
   /**
    * display all platforms
    * @param result $result query result
    */
   function displayPlatforms($result)
    {
        echo '<table><tr><th>Platform</th><th>actions</th></tr>';
        while($row=mysql_fetch_assoc($result))
        {
            echo '<tr><td><img id="smallIcon" src="data:image;base64,'.$row['platformIcon'].'">'.$row['platformName'].'</td>';
            echo '<td><a href="./platform.php?action=edit&id='.$row['platformID'].'" class="hrefBtn">edit</a>';
            echo '<a href="./platform.php?action=del&id='.$row['platformID'].'" class="hrefBtn">delete</a></td></tr>';
        }
        echo '</table>';
    } 
?>
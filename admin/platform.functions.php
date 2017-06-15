<?php

/**
 * platform managment functions[add,update,new,del]
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */

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



?>
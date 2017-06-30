<?php
    include_once('../includes/common.functions.php');
    if(!isset($_GET['appID']))
    {
        header("location:./devApps.php");
        exit();   
    }
    else
    {
        $appID=$_GET['appID'];
        $devID=1;
          $sql="SELECT * FROM apps WHERE appID=$appID AND developerID=$devID";
    $result=mysql_query($sql) or die("query failed due to ".mysql_error());
    if(mysql_num_rows($result)==0)
    {
        logError("unkown app");
        header("location:./devApps.php");
        exit();
    }
    else
    {
     $row=mysql_fetch_assoc($result);
    
    $appName=$row['appName'];
    $shortDesc=$row['appShortDesc'];
    $longDesc=$row['applongDesc'];
    $appReq=$row['appSysRequirements'];
    $icon=$row['appIcon'];
    $appVer=$row['appVersion'];
    
    $appRelease=$row['appReleaseDate'];
    $appSize=$row['appSize'];
    $appPlatform=$row['appPlatformID'];
    $mainCat=$row['appMainCatID'];
    $subCat=$row['appSubCatID'];
    $appLang=$row['appLanguage'];
    
    $screenshots[]=$row['appScreenshot1'];
    $screenshots[]=$row['appScreenshot2'];
    $screenshots[]=$row['appScreenshot3'];
    $screenshots[]=$row['appScreenshot4'];
    $screenshots[]=$row['appScreenshot5'];
    
    $links[]=$row['appPrimaryLink'];
    $links[]=$row['appSecondaryLink'];
    
    $vedioLink=$row['appVideoLink'];   
    }
    }
?>
<form id="newApp" action="editApp.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend>App Information</legend>
<input type="hidden" name="appID" value="<?php echo "$appID"; ?>" /> 
<p></p><label>Name : </label><input type="text" required name="name" value="<?php echo "$appName"; ?>"/></p>

<p><label>Short Description :</label><br />
<textarea required cols="50" rows="2" name="shortDesc" ><?php echo "$shortDesc "; ?></textarea></p>
<p><label>Long Description :</label><br />
<textarea required cols="50" rows="4" name="longDesc" ><?php echo "$longDesc"; ?></textarea></p>

<p><label>System Requirement:</label><br />
<textarea  required cols="25" rows="4" name="requirement" ><?php echo "$appReq"; ?></textarea><p>

<p><label>Icon : </label> <?php echo '<img id="appIcon" src="data:image;base64,'.$icon.'">';?><input type="file"  name="icon"/></p>

<p><label>Version : </label><input type="text" required name="version" value="<?php echo "$appVer"; ?>"/></p>

<p><label>Release Date : </label><input type="text"required name="release" value="<?php echo "$appRelease"; ?>"/></p>

<p><label>File Size : </label><input type="text" required  name="fileSize" value="<?php echo "$appSize"; ?>"/>
<select name="sizeType" required>
<option value="kb">kb</option>
<option value="mb">mb</option>
<option value="gb">gb</option>
</select><p>
</fieldset>

<fieldset>
<legend>classification</legend>
<?php 
include_once('../includes/dbconfig.php');
$sql="SELECT * FROM platforms";
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
echo '<p><label>Platform : </label><select required name="platform">';
echo '<option value="0">select platform</option>' ;
while($row=mysql_fetch_assoc($result))
{
    if($row['platformID']==$appPlatform)
    {
        echo '<option value="'.$row['platformID'].'" selected="selected">'.$row['platformName'].'</option>' ; 
    }
    else
    {
        echo '<option value="'.$row['platformID'].'">'.$row['platformName'].'</option>' ; 
    }
  
}
echo '</select></p>';

echo '<p><label>Main Category : </label><select id="mainCat" name="mainCat" required>';
$sql="SELECT * FROM categories Where catParent Is NULL";
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
echo '<option value="0">select category</option>';
while($row=mysql_fetch_assoc($result))
{
    if($row['catID']==$mainCat)
    {
        echo '<option value="'.$row['catID'].'" selected="selected">'.$row['catName'].'</option>' ;  
    }
    else
    {
     echo '<option value="'.$row['catID'].'">'.$row['catName'].'</option>' ;    
    } 
}
echo '</select><span id="subSelect">';
if($subCat != NULL)
{
    
    echo" Sub Category: <select name='subCat' required><option value='-1'>Select Category</option>";
    $sql="SELECT * FROM categories WHERE catParent=$mainCat";
    $result=mysql_query($sql) or die("query failed due to ".mysql_error());
    while($row=mysql_fetch_assoc($result))
    {
        if($row['catID']==$subCat)
        {
            echo '<option value="'.$row['catID'].'" selected="selected">'.$row['catName'].'</option>' ;  
        }
        else
        {
            echo '<option value="'.$row['catID'].'">'.$row['catName'].'</option>' ;    
        } 
    }
    echo '</select>';
}
echo'</span></p>';
echo '<p><label>Language: </label><select required name="lang">';
echo '<option value="0">select language</option>';
include_once('../includes/languages.php');
foreach($codes as $key=>$value)
{
    if($value ==$appLang)
    {
      echo '<option value="'.$value.'" selected="selected">'.$value.'</option>' ;  
    }
    else
    {
       echo '<option value="'.$value.'">'.$value.'</option>' ; 
    }
    
}
echo '</select></p>';
?>


</fieldset>
<fieldset>
<legend>ScreenShots</legend>

<p><label>ScreenShot: </label><input type="text" required name="screenShots[]" value="<?php echo "$screenshots[0]"; ?>"/><p>

<p><label>ScreenShot: </label><input type="text" name="screenShots[]" value="<?php echo "$screenshots[1]"; ?>"/></p>

<p><label>ScreenShot: </label><input type="text" name="screenShots[]" value="<?php echo "$screenshots[2]"; ?>"/></p>

<p><label>ScreenShot: </label><input type="text" name="screenShots[]" value="<?php echo "$screenshots[3]"; ?>"/></p>

<p><label>ScreenShot: </label><input type="text" name="screenShots[]" value="<?php echo "$screenshots[4]"; ?>"/></p>

</fieldset>
<fieldset>
<legend>links</legend>

<p><label>Primary Download link: </label><input type="text" required name="links[]" value="<?php echo "$links[0]"; ?>"/></p>

<p><label>Secondary Download link: </label><input type="text" name="links[]" value="<?php echo "$links[1]"; ?>"/></p>

<p><label>Video Link: </label><input type="text" name="video" value="<?php echo "$vedioLink"; ?>"/></p>

</fieldset>
<fieldset>
<legend>Finish</legend>
<input type="submit" value="submit" name="update"/> 
</fieldset>
</form>
<script src="../js/scripts.js"></script>
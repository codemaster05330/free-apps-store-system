<form id="newApp" action="newApp.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend>App Information</legend>
<p></p><label>Name : </label><input type="text" required name="name"/></p>

<p><label>Short Description :</label><br />
<textarea required cols="50" rows="2" name="shortDesc"></textarea></p>
<p><label>Long Description :</label><br />
<textarea required cols="50" rows="4" name="longDesc"></textarea></p>

<p><label>System Requirement:</label><br />
<textarea  required cols="25" rows="4" name="requirement"></textarea><p>

<p><label>Icon : </label><input type="file" required name="icon"/></p>

<p><label>Version : </label><input type="text" required name="version"/></p>

<p><label>Release Date : </label><input type="text"required name="release"/></p>

<p><label>File Size : </label><input type="text" required  name="fileSize"/>
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
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
echo '<p><label>Platform : </label><select required name="platform">';
echo '<option value="0">select platform</option>' ;
while($row=$result->fetch_assoc())
{
 echo '<option value="'.$row['platformID'].'">'.$row['platformName'].'</option>' ;  
}
echo '</select></p>';

echo '<p><label>Main Category : </label><select id="mainCat" name="mainCat" required>';
$sql="SELECT * FROM categories Where catParent Is NULL";
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
echo '<option value="0">select category</option>';
while($row=$result->fetch_assoc())
{
 echo '<option value="'.$row['catID'].'">'.$row['catName'].'</option>' ;  
}
echo '</select><span id="subSelect"></span></p>';

echo '<p><label>Language: </label><select required name="lang">';
echo '<option value="0">select language</option>';
include_once('../includes/languages.php');
foreach($codes as $key=>$value)
{
    echo '<option value="'.$value.'">'.$value.'</option>' ;
}
echo '</select></p>';
?>


</fieldset>
<fieldset>
<legend>ScreenShots</legend>

<p><label>ScreenShot: </label><input type="text" required name="screenShots[]"/><p>

<p><label>ScreenShot: </label><input type="text" name="screenShots[]"/></p>

<p><label>ScreenShot: </label><input type="text" name="screenShots[]"/></p>

<p><label>ScreenShot: </label><input type="text" name="screenShots[]"/></p>

<p><label>ScreenShot: </label><input type="text" name="screenShots[]"/></p>

</fieldset>
<fieldset>
<legend>links</legend>

<p><label>Primary Download link: </label><input type="text" required name="links[]"/></p>

<p><label>Secondary Download link: </label><input type="text" name="links[]"/></p>

<p><label>Video Link: </label><input type="text" name="video"/></p>

</fieldset>
<fieldset>
<legend>Finish</legend>
<input type="submit" value="submit" name="submit" id="hrefBtn"/> 
</fieldset>
</form>
<script src="../js/scripts.js"></script>
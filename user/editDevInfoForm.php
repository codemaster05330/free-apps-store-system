<?php
include_once('../includes/common.functions.php');
include_once('../includes/login.functions.php');
if(isSignedIn())
{
    if(isset($_SESSION['devID']) && $_SESSION['userLevel']==1)
    {
        $devID=$_SESSION['devID'];
        $sql="SELECT * from developers WHERE developerID=$devID";
        $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
        if($result->num_rows==1)
        {
            
        $row=$result->fetch_assoc();
        $devName=$row['developerName'];
        $devEmail=$row['developerEmail'];
        $devSite=$row['developerWebsite'];
        $devLogo=$row['develperLogo'];        
        $devAddress1=$row['Address1'];
        $devAddress2=$row['Address2'];
        $devState=$row['state'];
        $devCity=$row['city'];
        $devCounry=$row['country'];
        $devCode=$row['zipcode']; 
        }
        else
        {
          header('location:./index.php');
          exit();  
        }
       
    }
    else
    {
        header('location:./index.php');
        exit();
    }
}
else
{
     header('location:../index.php');
    exit();
}
?>
<form action="editDevInfo.php" method="post" enctype="multipart/form-data" id="newDev">
<fieldset>
<legend>Developer Info</legend>

<table id="devForm">
<tr><td><label>Developer Name :</label></td>
<td><input type="text" name="devName" placeholder="type developer name"  required <?php echo 'value="'.$devName.'"'?>/></td></tr>
<tr><td><label>Developer Email :</label></td>
<td><input type="email" name="devEmail" placeholder="type developer email" required <?php echo 'value="'.$devEmail.'"'?>/></td></tr>
<tr><td><label>Developer Website :</label></td>
<td><input type="text" name="devSite" placeholder="type developer website"  required <?php echo 'value="'.$devSite.'"'?> /></td></tr>
<tr><td><label>Developer Logo :</label></td><td>
<img id="mediumIcon" src="data:image;base64,<?php echo "$devLogo"?>"/>
<input type="file" name="devLogo"  /></td></tr>
</table>
</fieldset>

<fieldset>
<table id="devForm">
<legend>Developer Address</legend>
<tr><td><label>Address 2 :</label></td><td><input type="text" name="devAdress2" <?php echo 'value="'.$devAddress2.'"'?>/></td></tr>
<tr><td><label>Address 1 :</label></td><td><input type="text" name="devAdress1" required <?php echo 'value="'.$devAddress1.'"'?> /></td></tr>
<tr><td><label>State :</label></td><td><input type="text" name="devState"  required <?php echo 'value="'.$devState.'"'?>/></td></tr>
<tr><td><label>City :</label></td><td><input type="text" name="devCity" required  <?php echo 'value="'.$devCity.'"'?>/></td></tr>
<tr><td><label>zip code :</label></td><td><input type="text" name="devCode" required <?php echo 'value="'.$devCode.'"'?> /></td></tr>
<tr><td><label>Country :</label></td><td>
<select name="devCountry" >
<option value="0" >Select Country</option>
<?php
include_once('../includes/countries.php');
foreach($countries as $c)
{
    if($c==$devCounry)
    {
       echo '<option value="'.$c.'" selected="selected">'.$c.'</option>'; 
    }
    else
    {
        echo '<option value="'.$c.'">'.$c.'</option>';
    }
    
}
?>
</select>
</td></tr>
</table>
</fieldset>
<fieldset>
<legend>Finally</legend>
<input  type="submit" name="newDev" value="update"/>
</fieldset>

</form>
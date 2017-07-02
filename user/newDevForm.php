<form action="newDev.php" method="post" enctype="multipart/form-data" id="newDev">
<fieldset>
<legend>Developer Info</legend>

<table id="devForm">
<tr><td><label>Developer Name :</label></td><td><input type="text" name="devName" placeholder="type developer name"  required /></td></tr>
<tr><td><label>Developer Email :</label></td><td><input type="email" name="devEmail" placeholder="type developer email" required/></td></tr>
<tr><td><label>Developer Website :</label></td><td><input type="text" name="devSite" placeholder="type developer website"  required /></td></tr>
<tr><td><label>Developer Logo :</label></td><td><input type="file" name="devLogo" required /></td></tr>
</table>
</fieldset>

<fieldset>
<table id="devForm">
<legend>Developer Address</legend>
<tr><td><label>Address 2 :</label></td><td><input type="text" name="devAdress2" /></td></tr>
<tr><td><label>Address 1 :</label></td><td><input type="text" name="devAdress1" required /></td></tr>
<tr><td><label>State :</label></td><td><input type="text" name="devState"  required/></td></tr>
<tr><td><label>City :</label></td><td><input type="text" name="devCity" required /></td></tr>
<tr><td><label>zip code :</label></td><td><input type="text" name="devCode" required /></td></tr>
<tr><td><label>Country :</label></td><td>
<select name="devCountry" >
<option value="0" >Select Country</option>
<?php
include_once('../includes/countries.php');
foreach($countries as $c)
{
    echo '<option value="'.$c.'">'.$c.'</option>';
}
?>
</select>
</td></tr>
</table>
</fieldset>
<fieldset>
<legend>Finally</legend>
<input  type="submit" name="newDev" value="submit"/>
</fieldset>

</form>
<?php
include_once('./includes/common.functions.php');
include_once('./appsfilter.php'); 
?>
<div id="platformsBar">
<table>
<tr><th>Platforms</th></tr>
<?php
$sql="SELECT * FROM platforms ";
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
while($row=mysql_fetch_assoc($result))
{
    echo '<tr><td><a href="?p='.$row['platformID'].'">'.$row['platformName'].'</a></td></tr>';
}
?>
</table>
</div>
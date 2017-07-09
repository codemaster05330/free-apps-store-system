<?php
include_once('./includes/common.functions.php');
include_once('./appsfilter.php'); 
?>
<div id="platformsBar">
<table>
<tr><th>Platforms</th></tr>
<?php
$sql="SELECT * FROM platforms ";
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
while($row=$result->fetch_assoc())
{
    echo '<tr><td><a href="?p='.$row['platformID'].'">'.$row['platformName'].'</a></td></tr>';
}
?>
</table>
</div>
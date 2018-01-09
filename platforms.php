<?php
include_once('./includes/common.functions.php');
include_once('./appsfilter.php'); 
?>
<div id="platformsBar">
<p class="text-center"><span class="label label-primary label-main">Platforms</span></p>	
<table class="table table-condensed">
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
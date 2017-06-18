<div id="systemInfo">
<div id="overallInfo">
<table >
<tr><th colspan="2">Overall</th></tr>
<?php
include_once('../includes/dbconfig.php');
$sql='SELECT * FROM users';
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
$users=mysql_num_rows($result);

$sql='SELECT * FROM developers';
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
$developers=mysql_num_rows($result);

$sql='SELECT * FROM apps';
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
$apps=mysql_num_rows($result);

$sql='SELECT * FROM reviews';
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
$reviews=mysql_num_rows($result);

echo "<tr><td>Users</td><td>$users</td></tr>
<tr><td>Developer</td><td>$developers</td></tr>
<tr><td>Apps</td><td>$apps</td></tr>
<tr><td>Reviews</td><td>$reviews</td></tr>";
?>
</table>
</div>
</div>
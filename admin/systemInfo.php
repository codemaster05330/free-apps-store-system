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
<div id="pendingInfo">
<table >
<tr><th colspan="2">Pending Requests</th></tr>
<?php
$sql='SELECT * FROM developers WHERE approvedBy IS NULL';
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
$developers=mysql_num_rows($result);

$sql='SELECT * FROM apps WHERE approvedBy IS NULL';
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
$apps=mysql_num_rows($result);

$sql='SELECT * FROM reviews WHERE approvedBy IS NULL';
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
$reviews=mysql_num_rows($result);

echo "<tr><td><a href=\"./developers.php?action=pending\">Developer</a></td><td>$developers</td></tr>
<tr><td><a href=\"./apps.php?action=pending\">Apps</a></td><td>$apps</td></tr>
<tr><td><a href=\"./reviews.php?action=pending\">Reviews</a></td><td>$reviews</td></tr>";
?>
</table>
</div>
</div>
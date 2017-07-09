<div id="systemInfo">
<div id="overallInfo">
<table >
<tr><th colspan="2">Overall</th></tr>
<?php
include_once('../includes/dbconfig.php');
$sql='SELECT * FROM users';
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
$users=$result->num_rows;

$sql='SELECT * FROM developers';
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
$developers=$result->num_rows;

$sql='SELECT * FROM apps';
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
$apps=$result->num_rows;

$sql='SELECT * FROM reviews';
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
$reviews=$result->num_rows;

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
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
$developers=$result->num_rows;

$sql='SELECT * FROM apps WHERE approvedBy IS NULL';
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
$apps=$result->num_rows;

$sql='SELECT * FROM reviews WHERE approvedBy IS NULL';
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
$reviews=$result->num_rows;

echo "<tr><td><a href=\"./developers.php?action=pending\" id=\"hrefBtn\">Developer</a></td><td>$developers</td></tr>
<tr><td><a href=\"./apps.php?action=pending\" id=\"hrefBtn\">Apps</a></td><td>$apps</td></tr>
<tr><td><a href=\"./reviews.php?action=pending\" id=\"hrefBtn\">Reviews</a></td><td>$reviews</td></tr>";
?>
</table>
</div>
</div>
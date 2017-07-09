<?php

include_once('../includes/common.functions.php');
$devID=1;
$sql="SELECT appID,appName,appIcon,appReleaseDate,appRating,appDownloads FROM apps WHERE developerID=$devID";
    $appsResult=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    $appsCount=$appsResult->num_rows;       
?>
<div id="devInfo">
<h4>Information</h4>
<strong>Applications :</strong><?php echo"$appsCount"; ?>
</div>
<div id="devrecentApps">
<h4>Recent Applications</h4>
<?php
if($appsCount==0)
{
    echo "you didn't add any apps";
}
else
{
    echo '<table><tr><th>N</th><th>App</th><th>Rating</th><th>Downloads</th></tr>';
    $count=1;
    while($row=$appsResult->fetch_assoc())
    {
        echo "<tr><td>$count</td>";
        $count++;
        echo '<td id="appLogo"><img id="smallIcon" src="data:image;base64,'.$row['appIcon'].'"> '.$row['appName'].'</td>';
        echo "<td>{$row['appRating']}</td>";
        echo "<td>{$row['appDownloads']}</td></tr>";
    }
    echo '</table>';
}
 ?>
</div>
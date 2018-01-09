<?php
include_once('./includes/common.functions.php');
include_once('./appsfilter.php');
?>

<div id="appsProvider">
<div id="sortPanel">
<span class="label label-primary">sort by: </span> <a href="?sort=appDownloads" id="hrefBtn" class="btn btn-link">downloads</a>
<a href="?sort=appRating" id="hrefBtn" class="btn btn-link">ratings</a>
<a href="?sort=approvalDate" id="hrefBtn" class="btn btn-link">add date</a>
</div>
<?php
$sql="SELECT appID,appName,appIcon,appShortDesc,appVersion,appDownloads,appRating FROM apps WHERE appState=1 $appsFilter ORDER BY  $sort  DESC  LIMIT $offset,$APPSCOUNT";
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
while($row=$result->fetch_assoc())
{
	echo '<div class="row" id="smallApp">';
    echo '<div class="col col-md-2 app-img" ><img id="mediumIcon" src="data:image;base64,'.$row['appIcon'].'" ></div>';
    echo '<div class="col col-md-10"><a href="./app.php?appID='.$row['appID'].'"><h4>'.$row['appName'].' '.$row['appVersion'].'</h4></a>';
    echo '<small>'.$row['appShortDesc'].'</small>';
    echo '<p><small >Downloads : <span class="badge">'.$row['appDownloads'].'</span></small></p></div>';
    echo '</div>'; 
}
$sql="SELECT COUNT(*)FROM apps WHERE appState=1 $appsFilter";
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
$row=$result->fetch_assoc();
$totalRows=$row['COUNT(*)'];
$pages=$totalRows/$APPSCOUNT;
echo '<div id="pages">';
for($i=0;$i<$pages;$i++)
{
    echo '<a href="?st='.$i*$APPSCOUNT.'" id="hrefBtn" class="label label-info">'.($i+1).'</a> ';
}

echo '</div>';

?>
</div>

<?php
include_once('./includes/common.functions.php');
include_once('./appsfilter.php');
?>
<p id="sortPanel">
sort by: <a href="?sort=appDownloads" id="hrefBtn">downloads</a>
<a href="?sort=appRating" id="hrefBtn">ratings</a>
<a href="?sort=approvalDate" id="hrefBtn">add date</a>
</p>
<div id="appsProvider">
<?php
$sql="SELECT appID,appName,appIcon,appShortDesc,appVersion,appDownloads,appRating FROM apps WHERE appState=1 $appsFilter ORDER BY  $sort  DESC  LIMIT $offset,$APPSCOUNT";
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
while($row=mysql_fetch_assoc($result))
{
    echo '<table id="smallApp"><tr><td rowspan="2"><img id="mediumIcon" src="data:image;base64,'.$row['appIcon'].'"></td>';
    echo '<td><a href="./app.php?appID='.$row['appID'].'"><strong>'.$row['appName'].' '.$row['appVersion'].'</strong></a>';
    echo '<p><small>'.$row['appShortDesc'].'</small></p></td></tr>';
    echo '<tr><td><small>Downloads : '.$row['appDownloads'].'</small></td></tr>';
    echo '<table>'; 
}
$sql="SELECT COUNT(*)FROM apps WHERE appState=1 $appsFilter";
$result=mysql_query($sql)or die("query failed due to ".mysql_error());
$row=mysql_fetch_assoc($result);
$totalRows=$row['COUNT(*)'];
$pages=$totalRows/$APPSCOUNT;
echo '<p id="pages">';
for($i=0;$i<$pages;$i++)
{
    echo '<a href="?st='.$i*$APPSCOUNT.'" id="hrefBtn">'.($i+1).'</a> ';
}

echo '</p>';

?>
</div>
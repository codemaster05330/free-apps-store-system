<?php
include_once('./includes/common.functions.php');
include_once('./appsfilter.php');
?>

<div id="appsProvider">
<?php
if(isset($_GET['search']) && isset($_GET['keyword']))
{
    
    $keywords=rtrim($_GET['keyword']);
    $keywords=ltrim($_GET['keyword']);
    $wordsArr=split(" ",$keywords);
    $filter="";
    while(list($key,$val)=each($wordsArr))
    {
        if($val <> " " and strlen($val)>0)
        {
         $filter .=" appName LIKE '%$val%' or ";   
        }
    }
    
    $filter=substr($filter,0,(strlen($filter)-3));
    
    $sql="SELECT appID,appName,appIcon,appShortDesc,appVersion,appDownloads,appRating FROM apps WHERE appState=1 AND $filter ORDER BY  $sort  DESC  LIMIT $offset,$APPSCOUNT";
    
    $result=mysql_query($sql) or die("query failed due to ".mysql_error());

    $sql2="SELECT appID,appName,appIcon,appShortDesc,appVersion,appDownloads,appRating FROM apps WHERE appState=1 AND $filter ";
    
    $result2=mysql_query($sql2) or die("query failed due to ".mysql_error());
    
    $totalRows=mysql_num_rows($result2);
    
    if($totalRows!=0)
    {
        
    echo "<strong>$totalRows results found</strong>";
    echo '<p id="sortPanel">
sort by: <a href="?sort=appDownloads&search&keyword='.$keywords.'" id="hrefBtn">downloads</a>
<a href="?sort=appRating&search&keyword='.$keywords.'" id="hrefBtn">ratings</a>
<a href="?sort=approvalDate&search&keyword='.$keywords.'" id="hrefBtn">add date</a>
</p>';

while($row=mysql_fetch_assoc($result))
{
    echo '<table id="smallApp"><tr><td rowspan="2" id="appLogo"><img id="mediumIcon" src="data:image;base64,'.$row['appIcon'].'"></td>';
    echo '<td><a href="./app.php?appID='.$row['appID'].'"><h4>'.$row['appName'].' '.$row['appVersion'].'</h4></a>';
    echo '<small>'.$row['appShortDesc'].'</small></td></tr>';
    echo '<tr><td><small>Downloads : '.$row['appDownloads'].'</small></td></tr>';
    echo '</table>'; 
}

$pages=$totalRows/$APPSCOUNT;
echo '<p id="pages">';
for($i=0;$i<$pages;$i++)
{
    echo '<a href="?st='.$i*$APPSCOUNT.'&search&keyword='.$keywords.'" id="hrefBtn">'.($i+1).'</a> ';
}

echo '</p>';
}
else
{
    echo 'no results found ';
}
}


?>
</div>
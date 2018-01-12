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
    $wordsArr=explode(" ",$keywords);
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
    
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());

    $sql2="SELECT appID,appName,appIcon,appShortDesc,appVersion,appDownloads,appRating FROM apps WHERE appState=1 AND $filter ";
    
    $result2=$mysqli->query($sql2)or die("query failed due to ".mysqli_error());
    
    $totalRows=$result2->num_rows;
    
    if($totalRows!=0)
    {
        
    echo "<strong>$totalRows results found</strong>";
    echo '<p id="sortPanel">
sort by: <a href="?sort=appDownloads&search&keyword='.$keywords.'" id="hrefBtn">downloads</a>
<a href="?sort=appRating&search&keyword='.$keywords.'" id="hrefBtn">ratings</a>
<a href="?sort=approvalDate&search&keyword='.$keywords.'" class="btn btn-link">add date</a>
</p>';

while($row=$result->fetch_assoc())
{
    echo '<div class="row" id="smallApp">';
    echo '<div class="col col-md-2 app-img" ><img id="mediumIcon" src="data:image;base64,'.$row['appIcon'].'" ></div>';
    echo '<div class="col col-md-10"><a href="./app.php?appID='.$row['appID'].'"><h4>'.$row['appName'].' '.$row['appVersion'].'</h4></a>';
    echo '<small>'.$row['appShortDesc'].'</small>';
    echo '<p><small >Downloads : <span class="badge">'.$row['appDownloads'].'</span></small></p></div>';
    echo '</div>'; 
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
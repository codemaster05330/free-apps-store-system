<div id="recentAppsList"> 
	<p class="text-center"><span class="label label-primary label-main">Recent Apps</span></p>
	<div class="row">
 	<hr>
 </div>	
<?php
//include_once('../includes/common.functions.php');
$sql="SELECT appID,appName,appIcon,appShortDesc,appVersion,approvalDate FROM apps WHERE appState=1 ORDER BY  approvalDate  DESC LIMIT 2";
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
while($row=$result->fetch_assoc())
{
 echo '<div class="row app-xs">';
    echo '<div class="col col-md-2 app-img" ><img id="smallIcon" src="data:image;base64,'.$row['appIcon'].'" ></div>';
    echo '<div class="col col-md-10"><a href="./app.php?appID='.$row['appID'].'"><h6>'.$row['appName'].' '.$row['appVersion'].'</h6></a>';
    echo '<small>'.$row['appShortDesc'].'</small>';
    echo '<div><small>at : '.Date('M ,j Y',strtotime($row['approvalDate'])).'</small></div></div>';
    echo '</div>'; 
}
?>
</div>
<div class="row">
 	<hr>
 </div>	

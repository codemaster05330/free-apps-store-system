<div id="developerContent">
<?php
    include_once('./includes/common.functions.php');
    if(!isset($_GET['id']))
    {
        header("location:./index.php");
        exit();   
    }
    else
    {
        $devID=$_GET['id'];
        
        $sql="SELECT * FROM developers WHERE developerID=$devID";
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    if($result->num_rows==0)
    {
        header("location:./index.php");
        exit();
    }
    else
    {
     $developer=$result->fetch_assoc();     
?>
<div class="row">
    <div class="col col-md-2 col-md-offset-5">
        <div class="row text-center">
        <?php 
        if($developer['develperLogo']=="")
         {
            echo '<img src="images/placeholder.jpg" class="img-circle app-img-big">';
         }
         else
         {
           echo '<img src="data:image;base64,'.$developer['develperLogo'].'" class="img-circle app-img-big">'; 
         }
        ?>    
        </div>
        <div class="row text-center">
            <h1><?php echo $developer['developerName'];?></h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading">
            Information
        </div>
        <div class="panel-body">
            <strong>Website :</strong>
            <?php echo $developer['developerWebsite'];?>
            <br>
            <strong>Email :</strong>
            <?php echo $developer['developerEmail'];?>
            <br>
            <strong>Address :</strong>
            <?php echo $developer['Address1'].' '.$developer['Address2'];
             echo '<br> ';
            echo $developer['country'].' , '.$developer['city'].' , '.$developer['state'].' '.$developer['zipcode'] ;?>
            <br>
        </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading">
                Published Apps
            </div>
            <div class="panel-body">
                
            
<?php      
    $sql="SELECT appID,appName,appIcon,appShortDesc,appVersion FROM apps WHERE appState=1 AND developerID=$devID ORDER BY  appReleaseDate  DESC";
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    $count=1;
    while($row=$result->fetch_assoc())
    {
    echo '<div class="row" id="smallApp">';
    echo '<div class="col col-md-2 app-img" ><img id="mediumIcon" src="data:image;base64,'.$row['appIcon'].'" ></div>';
    echo '<div class="col col-md-10"><a href="./app.php?appID='.$row['appID'].'"><h4>'.$row['appName'].' '.$row['appVersion'].'</h4></a>';
    echo '<small>'.$row['appShortDesc'].'</small></div>';
    echo '</div>'; 
    }    
    }
    }

?>
</div>
        </div>
    </div>
</div>
</div>
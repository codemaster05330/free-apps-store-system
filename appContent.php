<div id="appContent">

<?php

include_once('./includes/common.functions.php');

    if(!isset($_GET['appID']))

    {

        header("location:./index.php");

        exit();   

    }

    else

    {

        $appID=$_GET['appID'];

        $devID=1;

        $sql="SELECT * FROM apps WHERE appID=$appID AND appState=1";

    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());

    if($result->num_rows==0)

    {

        logError("unkown app");

        header("location:./index.php");

        exit();

    }

    else

    {

     $app=$result->fetch_assoc();
     $sql="SELECT developerName FROM developers WHERE developerID={$app['developerID']}";

     $result2=$mysqli->query($sql)or die("query failed due to ".mysqli_error());

     $developer=$result2->fetch_assoc();

     $sql="SELECT platformName FROM platforms WHERE platformID={$app['appPlatformID']}";

     $result2=$mysqli->query($sql)or die("query failed due to ".mysqli_error());

     $platform=$result2->fetch_assoc();


      

      $sql="SELECT catName FROM categories WHERE catID={$app['appMainCatID']}";

     $result2=$mysqli->query($sql)or die("query failed due to ".mysqli_error());

     $cat=$result2->fetch_assoc();


     if($app['appSubCatID']!="")

     {

        $sql="SELECT catName FROM categories WHERE catID={$app['appSubCatID']}";

     $result2=$mysqli->query($sql)or die("query failed due to ".mysqli_error());

     $subCat=$result2->fetch_assoc();

     }


    }



}

?>
<div class="row">
    <hr>
</div>

<div class="row white-block">
    <div class="col col-md-2">
        <?php echo '<img class="app-img-big" src="data:image;base64,'.$app['appIcon'].'">'; ?>
    </div>
    <div class="col-md-10">
        <?php  echo '<h1>'.$app['appName'].' '.$app['appVersion'].'</h1>';?>
        <small>By : <?php echo '<a href="./developer.php?id='.$app['developerID'].'">'.$developer['developerName'].'</a>';?></small>
        <p class="well app-short-desc">
            <?php echo $app['appShortDesc']; ?>
        </p>
    </div>
</div>

<div class="row ">
    <div class="col-md-6 col-md-offset-3 white-block">
        <strong>Downloads: </strong><?php echo $app['appDownloads'];?>
        , <strong>File Size: </strong><?php echo $app['appSize'].' KB';

        echo '<a href="./download.php?appID='.$app['appID'].'" class="btn btn-success pull-right">download</a>';
        ?>
         
    </div>
</div>

<div class="row ">
    <div class="col-md-8 col-md-offset-2 white-block">
    <div id="gallery">
    <?php 
     include_once('screenshots.php');
     ?>
    </div>
    </div>
</div>

<div class="row ">
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-success" >
        <div class="panel-heading">
            Description
        </div>
        <div class="panel-body">
            <?php 
                 echo $app['applongDesc'];
             ?>
        </div>
    
    </div>
    </div>
</div>

<div class="row ">
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-success" >
        <div class="panel-heading">
            System Requirements
        </div>
        <div class="panel-body">
            <?php 
                 echo $app['appSysRequirements'];
             ?>
        </div>
    
    </div>
    </div>
</div>

<div class="row ">
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-success" >
        <div class="panel-heading">
            More Informations
        </div>
        <div class="panel-body">
            <strong> Language :</strong>
                <?php 
                 echo $app['appLanguage'];
             ?> 
             <br>

             <strong> Release Date :</strong>
                <?php 
                 echo date('M .j Y',strtotime($app['appReleaseDate']));
             ?> 
             <br>
             <strong> Platform :</strong>
                <?php 
                 echo $platform['platformName'];
             ?> 
             <br>

             <strong> Category :</strong>
                <?php 
                 echo $cat['catName'];
                 if($app['appSubCatID']!="")
                 {
                    echo ' , '.$subCat['catName'];
                 }
                 echo '<br>';
                 echo '<a  href="./developer.php?id='.$app['developerID'].'" class="btn btn-link">View Developer</a>';
             ?> 
             <br>
            
            
        </div>
    
    </div>
    </div>
</div>

<div class="row">
    <hr>
</div>
</div>
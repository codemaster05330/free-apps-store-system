<?php
include_once('../includes/common.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard</title>
</head>

<body>
<div id="upperPanel">
<?php
include_once('./layout/devUpperPanel.php');
?>
</div>

<div id="wrapper">

<div id="navigationBar">
<?php
include_once('./layout/devMenu.php');
?>
</div>
<div id="content">
<?php
printError();
printSuccess();
if(isset($_GET['action']))
{
}
else
{
    $_SESSION['id']=1;
    $sql="SELECT appID,appName,appIcon,appReleaseDate,appRating,appState FROM apps WHERE developerID={$_SESSION['id']}";
    $result=mysql_query($sql) or die("query failed due to ".mysql_error());
    if(mysql_num_rows($result)==0)
    {
        echo "you havn't added apps yet.";
        echo '<a href="./newApp.php" class="hrefBtn"> new App</a>';
    }
    else
    {
        echo '<a href="./newApp.php" class="hrefBtn"> new App</a>';
        echo '<table><tr><th>N</th><th>Name</th><th>Release Date</th><th>Rating</th><th>State</th><th>actions</th></tr>';
        $count=1;
        while($row=mysql_fetch_assoc($result))
        {
            echo "<tr><td>$count</td>";
            $count++;
            echo "<td>{$row['appName']}</td>";
             echo '<td>'.Date('d-m-y',strtotime($row['appReleaseDate'])).'</td>';
             if($row['appRating']==NULL)
             {
                $row['appRating']=0;
             }
             echo "<td>{$row['appRating']}</td>";
             $state=$row['appState'];
             switch ($state)
             {
                case 0:
                $state="pending";
                $actions="no actions";
                break;
                case 1 :
                $state="published";
                $actions='<a href="" class="hrefBtn">unpublish</a>';
                $actions .='<a href="" class="hrefBtn">edit</a>';
                $actions .='<a href="" class="hrefBtn">delete</a>';
                $actions .='<a href="" class="hrefBtn">reviews</a>';
                break;
                case 3 :
                $state="unpublished";
                $actions='<a href="" class="hrefBtn">publish</a>';
                $actions .='<a href="" class="hrefBtn">edit</a>';
                $actions .='<a href="" class="hrefBtn">delete</a>';
                break;
                case 2 :
                $state="reported";
                $actions ='<a href="" class="hrefBtn">edit</a>';
                $actions .='<a href="" class="hrefBtn">delete</a>';
                break;
             }
             echo "<td>$state</td><td>$actions</td></tr>";
        }
        echo '</table>';
        
    }
}
?>
</div>

</div>
<div id="footer">
<?php
include_once('./layout/devFooter.php');
?>
</div>
</body>
</html>
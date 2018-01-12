<?php
$tableRow=1;

echo '<table id="thumbnail"><tr><td>';
echo '<img src="'.$app['appScreenshot1'].'"></td>';

$tableRow++;//2

if($app['appScreenshot2']!="")
{
    echo '<td><img src="'.$app['appScreenshot2'].'"></td>';
    $tableRow++;//3
} 

if($app['appScreenshot3']!="")
{
    echo '<td><img src="'.$app['appScreenshot3'].'"></td>';
    if($tableRow%2!=0)
    {
        echo '</tr><tr>';
    }
    $tableRow++;
} 

if($app['appScreenshot4']!="")
{
    echo '<td><img src="'.$app['appScreenshot4'].'"></td>';
    if($tableRow%2!=0)
    {
        echo '</tr><tr>';
    }
    $tableRow++;
} 

if($app['appScreenshot5']!="")
{
    echo '<td><img src="'.$app['appScreenshot5'].'"></td>';
    if($tableRow%2!=0)
    {
        echo '</tr><tr>';
    }
    $tableRow++;
}
 if($tableRow%2==0)
    {
        echo '</tr>';
    }
    echo '</table>';
    
     if($app['appVideoLink'] !="")
     {
        echo "<div id='pro_vedio'><iframe   src='{$app['appVideoLink']}'></iframe></div>";
     }
?>

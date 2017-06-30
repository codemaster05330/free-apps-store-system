<?php
$tableRow=1;

echo '<table id="thumbnail"><tr><td>';
echo '<img src="'.$row['appScreenshot1'].'"></td>';

$tableRow++;//2

if($row['appScreenshot2']!="")
{
    echo '<td><img src="'.$row['appScreenshot2'].'"></td>';
    $tableRow++;//3
} 

if($row['appScreenshot3']!="")
{
    echo '<td><img src="'.$row['appScreenshot3'].'"></td>';
    if($tableRow%2!=0)
    {
        echo '</tr><tr>';
    }
    $tableRow++;
} 

if($row['appScreenshot4']!="")
{
    echo '<td><img src="'.$row['appScreenshot4'].'"></td>';
    if($tableRow%2!=0)
    {
        echo '</tr><tr>';
    }
    $tableRow++;
} 

if($row['appScreenshot5']!="")
{
    echo '<td><img src="'.$row['appScreenshot5'].'"></td>';
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
    
     if($row['appVideoLink'] !="")
     {
        echo "<div id='pro_vedio'><iframe   src='{$row['appVideoLink']}'></iframe></div>";
     }
?>

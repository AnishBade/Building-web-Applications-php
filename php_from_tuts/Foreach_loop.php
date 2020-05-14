<?php
$colors=['red','green','blue'];

foreach($colors as $color)
{
    echo $color.'<br>';
}

echo '<br>';
$age=['Anish'=>20,'Anisha'=>24,'Abina'=>28];
foreach($age as $value)
{
    echo $value.'<br>';
}
echo '<br>';
echo '<ol>';
foreach($age as $key=> $value)
{

    echo "<li>$key=$value </li><br>";
}
echo '</ol>';

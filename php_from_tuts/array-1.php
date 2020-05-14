<?php 
$colors=['red','green',12.5];
echo $colors[1].'<br>';
echo '<pre>';
print_r($colors);
echo '</pre>'.'<br>';


/*for($i=0;$i<3;$i++)
{
    echo $colors[$i].'<br>';
}
*/

echo '<ul>';
for($i=0;$i<3;$i++)
{
    echo '<li>'.$colors[$i].'</li>';
}

echo '</ul>'.'<br>';
?>
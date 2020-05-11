<?php 
$vv="Hello World!";
echo "First: ".strpos($vv,'Wo')."<br>";
echo "second: ".strpos($vv,'He').'<br>';
echo "Third: ".strpos($vv,'ZZ').'<br>';

if(strpos($vv,'He')==FALSE) echo"Wrong A".'<br>';
if(strpos($vv,'zz')==FALSE) echo"Right B".'<br>';
if(strpos($vv,'He')!==FALSE) echo"Right C".'<br>';
if(strpos($vv,'zz')===FALSE) echo"Right D".'<br>';

print_r(FALSE);
print FALSE;
echo"Where are thye?";
?>
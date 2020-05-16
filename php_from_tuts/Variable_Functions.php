<?php 
function wow($name)
{
    echo "Hello $name";

}
$func="wow";
$func("Anish Bade");

echo "<br>";
echo "<br>";
echo "<br>";
echo "OR <br><br>";
$sayHello=function($name)
{
    echo "Hello $name";

};
$sayHello("Anish BAde");

?>
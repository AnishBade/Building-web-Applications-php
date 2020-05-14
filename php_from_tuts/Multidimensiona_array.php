<?php
$emp=[
    [1,'Krishna','Manager',5000],
    [2,'Salman','Salesman',2000],
    [3,'Mohan','Computer Operator',12000],
    [4,'Amir','Driver',5000]
];
echo '<table border=5px cellpadding=4px>';
echo "<tr>
<th>No.</th>
<th>Name</th>
<th>Designation</th>
<th>Salary</th>
 </tr>";
foreach($emp as $em)
{
    echo '<tr>';
    foreach($em as $e)
    {
      echo "<td>$e</td>";
    }
    echo '</tr>';

}
echo '</table>';
?>
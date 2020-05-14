<?php
$marks=[
    'Krishna'=>['Physics'=>95,'Chemistry'=>88,'Mathematics'=>98],
    'Basudev'=>['Physics'=>85,'Chemistry'=>89,'Mathematics'=>78],
    'Mohan'=>['Physics'=>80,'Chemistry'=>99,'Mathematics'=>88]


];
 echo '<pre>';
 print_r($marks);
 echo '</pre>';

 echo '<br>';
 echo '<br>';


 echo '<table border=2px cellpadding=5px cellspacing=0>';
 echo "<tr>
    <th>Name</th>
    <th>Physics</th>
    <th>Chemisty</th>
    <th>Mathematics</th>
    </tr>";
 foreach($marks as $person=>$mark)
 {
     echo '<tr>';
     echo "<td>$person</td>";
     foreach($mark as $m)
     {
         echo "<td>$m </td>";
      }
      echo '</tr>';
 }
 echo '</table>';
 ?>
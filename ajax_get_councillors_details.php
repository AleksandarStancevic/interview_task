<?php 

require_once("api.php");
$pages = [1,2,3,4,5];
$headers = array('Accept: application/xml','Content-Type: application/xml');
$get = new API('http://ws-old.parlament.ch/councillors', $headers,$pages);
$council = $get->getCouncillors();
$a = $get->getRandomCouncillor();
?>
<table style="width:100%;">  
<tr>
    <th>Id</th>
    <th>Party</th>
    <th>Party Name</th>
    <th>Canton</th>
    <th>Canton Name</th>
   
</tr>
<?php
foreach($a as $key){
    echo "<tr>";
   foreach ($key as $k => $v){
       echo "<td>$v</td>";
    //    echo $k . " => " . $v . "<br>";
   }
   echo "</tr>";
}
?>

</table>
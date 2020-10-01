<?php require_once("functions.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>

    #getRandomCouncillors{
        margin: auto;
        display: block;
        background-color: #00b3f5;
        color: #f9fdfd;
        height: 50px;
        font-size: 16px;
        font-weight: bolder;
        margin-bottom: 30px;
        margin-top: 30px;
        font-family: arial;
    }
    #getRandomCouncillors:hover{
        background-color: #07caff;
    }


    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

table{
    margin-top: 30px;
    margin-bottom: 30px;
}

</style>
</head>
<body>
<?php 
$asc_councillors = sortCouncillors('asc');
$desc_councillors = sortCouncillors('desc');
?>
<table style="width:100%;">  
<tr>
    <th>Id</th>
    <th>Updated</th>
    <th>Active</th>
    <th>Code</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Number</th>
    <th>Official Denomination</th>
    <th>Salutation Letter</th>
    <th>Salutation Title</th>
   
</tr>
<?php
foreach($asc_councillors as $councillor){
    echo "<tr>";
   foreach ($councillor as $k => $v){
       echo "<td>$v</td>";
    //    echo $k . " => " . $v . "<br>";
   }
   echo "</tr>";
}
?>
<table style="width:100%;">  
<tr>
    <th>Id</th>
    <th>Updated</th>
    <th>Active</th>
    <th>Code</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Number</th>
    <th>Official Denomination</th>
    <th>Salutation Letter</th>
    <th>Salutation Title</th>
   
</tr>
<?php
foreach($desc_councillors as $councillor){
    echo "<tr>";
   foreach ($councillor as $k => $v){
       echo "<td>$v</td>";
    //    echo $k . " => " . $v . "<br>";
   }
   echo "</tr>";
}
?>
</table>
<div>
<button id="getRandomCouncillors" onclick="getCouncillorsDetails()">Get details of 5 randomly chosen councillors</button>
</div>
<div id="details"></div>



<script src="script.js"></script>
</body>
</html>
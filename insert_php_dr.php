<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Id</th>
<th>Temp</th>
<th>Ecg</th>
</tr>
<?php
// Check if we got the field from the user
 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $_SESSION['uid']=$id;  
    
    echo $id;

 
 $filepath = realpath (dirname(__FILE__));
 require_once($filepath."/db_connect.php");


 // Connecting to database 
 $db = new DB_CONNECT();

$sql = "SELECT  id,temp,ecg FROM patient where uid = '$id'";
$result = mysql_query($sql);

if (mysql_num_rows($result) > 0) {
// output data of each row
while($row = mysql_fetch_array($result)) {

    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["temp"] . "</td><td>"
    . $row["ecg"]. "</td></tr>";
    

}

}
   
}
?>

</table>
</body>
</html>
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
<th>Heart_Rate</th>
<th>Spo2</th>
</tr>
<?php
 
 $filepath = realpath (dirname(__FILE__));
 require_once($filepath."/db_connect.php");


 // Connecting to database 
 $db = new DB_CONNECT();

 $sql = "SELECT * FROM newpatient INNER JOIN newpatient1 ON newpatient.uid = newpatient1.uid and newpatient.id=newpatient1.id";  
$result = mysql_query($sql);
$res=$_SESSION['uid'];
if (mysql_num_rows($result) > 0) {
// output data of each row
while($row = mysql_fetch_array($result)) {
if($row["uid"] == $res)
{
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["temp"] . "</td>
    <td>". $row["ecg"]. "</td><td>". $row["hr"]. "</td><td>". $row["sp02"]. "</td></tr>";
}
}
echo "</table>";
} else { echo "0 results"; }

?>
</table>
</body>
</html>
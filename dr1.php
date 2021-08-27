<?php
session_start()
?>


<html>
    <head>
        <style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

/* Change the link color on hover */
li a:hover {
  background-color: #555;
  color: white;
}
</style>
</head>
        
    </head>
    <body>
        <div class = 'container'>
<h2>Upcomming Appointments</h2>
<ul>
          <?php
 
 $filepath = realpath (dirname(__FILE__));
 require_once($filepath."/db_connect.php");


 // Connecting to database 
 $db = new DB_CONNECT();

$sql = "SELECT * FROM login";
$result = mysql_query($sql);

if (mysql_num_rows($result) > 0) {
// output data of each row
while($row = mysql_fetch_array($result)) {


    
        $link = "<a href= 'insert_php_dr.php?id=".$row['id']."'>";
        $endingTag = '</a>';
        echo '<li>';
        echo "$link".$row['id']." ".$row['name']."$endingTag";
        echo '</li>';
        

}

} else { echo "0 results"; }

?>
</ul>
</div>
</body>
</html>












<?php
$username = "root";
$password = "root";
$dbname = "myDB";
$link = mysql_connect('127.0.0.1', 'root', 'root')
    or die('failed: ' . mysql_error());
mysql_select_db('myDB') or die('Error');


$query = "SELECT * FROM user_info where SocialSecurityNumber='". $_GET['SocialSecurityNumber'] ."'";
$result = mysql_query($query) or die('failed ' . mysql_error());


while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $i=0;
    foreach ($line as $col_value) {
   
     echo mysql_field_name($result, $i) . "=" . $col_value . "\n"  ;   
     $i++;
}
}


mysql_free_result($result);


mysql_close($link);
?>

<?php
error_reporting(E_STRICT);
#die("best");
$myfile = fopen("/tmp/art.txt", "a") or die("Unable to open file!");
$req_dump = print_r($_POST, TRUE);


//fwrite($myfile, $HTTP_RAW_POST_DATA);
$post_data=explode("Fields", $HTTP_RAW_POST_DATA);
file_put_contents('/tmp/cast.txt', print_r($post_data, true));
$mydata=str_replace("Off","(Off)",$post_data[1]);
$myfinaldata=str_replace("Yes","(Yes)",$mydata);
preg_match_all( "/\((.+?)\)/" , $myfinaldata, $matches);
$array=$matches[0];
$max=sizeof($array);

file_put_contents('/tmp/file.txt', print_r($array, true));
$fields='';
$values='';
$i=0;
foreach($array as $value)
{
  
  $trimed=rtrim($value,')');
  $ltrimed=ltrim($trimed,'(');
  if($i%2 == 0)
  {

   $fields .="'".$ltrimed ."'". ',';
   
  }
  else
  {

   $values .="'".$ltrimed ."'" ',';
  }
$i=$i+1;
}

$result_fields=rtrim($fields,',');
$result_values=rtrim($values,',');

#fwrite($myfile, $result_fields);

$hostname = "localhost";
$username = "root";
$password = "root";
$dbname = "myDB";
mysql_connect($hostname,$username,$password) OR DIE(mysql_error());
mysql_select_db($dbname) or die(mysql_error()); 
$query = "INSERT INTO user_info(" . $result_fields . ") VALUES('ss','sss')"; 

fwrite($myfile, $query);
mysql_query($query) or die(mysql_error());
mysql_close();


file_put_contents('/tmp/filename.txt', print_r($array, true));

fclose($myfile);
?>

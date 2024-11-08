<?php
if(isset($_POST['export']))
{
 @header("Content-Disposition: attachment; filename=mysql_to_excel.csv");

 $host="localhost";
 $username="root";
 $password="";
 $databasename="sample";
 $connect=mysql_connect($host,$username,$password);
 $db=mysql_select_db($databasename);	

 $name=$_POST['name'];
 $age=$_POST['age'];
 $country=$_POST['country'];

 for($i=0;$i<count($name);$i++)
 {
  $name_val=$name[$i];
  $age_val=$age[$i];
  $country_val=$country[$i];
  mysql_query("insert into employee_table values('$name_val','$age_val','$country_val')");	
 }

 $select = mysql_query("SELECT * FROM employee_table");
 while($row=mysql_fetch_array($select))
 {
  $data.=$row['name'].",";
  $data.=$row['age'].",";
  $data.=$row['country']."\n";
 }

 echo $data;
 exit();
}
?>
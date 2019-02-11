<?php


$dsn ='mysql:host=localhost;dbname=Sales_System';
 
$user = 'root';  
$pass = '';  
$options = array( PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES UTF8',);

try
{

$Connect = new PDO($dsn,$user,$pass,$options);   

$Connect ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 

}
catch(PDOException $e)
{



echo '<div class="AD" style="   font-family: sans-serif;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;"><strong>Error :  </strong>Fail to establish Connection -- > '.$e->getMessage().'</div>';

}


?>
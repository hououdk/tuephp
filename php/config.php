<?php
$link = new mysqli("localhost", "root", "root", "mydb");
if ($link->connect_error) { 
   die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}
?>
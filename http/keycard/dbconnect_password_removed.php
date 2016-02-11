<?php
if(!mysql_connect("localhost","root","<password removed. Needs root password here and change the filename back to dbconnect.php>"))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("dbtest"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=hotel;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}

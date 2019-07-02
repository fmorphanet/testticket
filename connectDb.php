<?php

try
{
	$db = mysqli_connect("localhost", "root", "", "test");
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
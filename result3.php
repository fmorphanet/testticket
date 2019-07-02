<?php
mb_internal_encoding('UTF-8');
require('connectDb.php');

//Retrouver la quantité totale de SMS envoyés par l'ensemble des abonnés
$resultquery3 = $db->query("SELECT count(*) FROM `testticket` WHERE Mytype LIKE '%envoi%' AND Mytype LIKE '%sms%';");
$result3=mysqli_fetch_array ($resultquery3);

$result="Retrouver la quantité totale de SMS envoyés par l'ensemble des abonnés : ";

file_put_contents('result.txt',PHP_EOL . $result, FILE_APPEND);
file_put_contents('result.txt',PHP_EOL . $result3[0], FILE_APPEND);
file_put_contents('result.txt',PHP_EOL, FILE_APPEND);
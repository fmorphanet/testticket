<?php
mb_internal_encoding('UTF-8');
require('connectDb.php');

$sql= "CREATE TABLE test.testticket(
    ticket_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    Compte INT NOT NULL,
    Facture INT NOT NULL,
    Abonne INT NOT NULL,
    Mydate date NOT NULL,
	Mytime time Not NULL,
    DVreel Text NOT NULL,
    DVfacture Text NOT NULL,
    Mytype Text NOT NULL
)ENGINE=INNODB  DEFAULT CHARSET=utf8 DEFAULT COLLATE utf8_unicode_ci";

if(mysqli_query($db, $sql)){
	echo "Table added successfully";
} else{
	echo "ERROR: Could not able to execute $sql " . mysqli_error($db);
}
mysqli_close($db);


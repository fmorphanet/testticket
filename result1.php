<?php
mb_internal_encoding('UTF-8');
require('connectDb.php');

//Retrouver la durée totale réelle des appels effectués après le 15/02/2012 (inclus)
$resultquery1 = $db->query("SELECT DVreel 
FROM `testticket` 
WHERE Mytype LIKE '%appel%' AND Mytype NOT LIKE '%rappel%' AND Mydate >= '2012-02-15'");

foreach ($resultquery1 as $key => $values){
	if (isset($values)){
		list($h,$m,$s)=explode(':',$values['DVreel']);
		if (isset($result1)){
			$result1+=$h+$m/60+$s/3600;
		}else{
			$result1=$h+$m/60+$s/3600;
		}
	}
}
$result='Retrouver la durée totale réelle des appels effectués après le 15/02/2012 (inclus).';
$result2= "Nb hours : $result1";

file_put_contents('result.txt',PHP_EOL . $result, FILE_APPEND);
file_put_contents('result.txt',PHP_EOL . $result2, FILE_APPEND);
file_put_contents('result.txt',PHP_EOL, FILE_APPEND);

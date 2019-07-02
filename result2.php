<?php
mb_internal_encoding('UTF-8');
require('connectDb.php');

//Retrouver le TOP 10 des volumes data facturés en dehors de la tranche horaire 8h00-18h00, par abonné.
$resultquery2 = $db->query("SELECT DVreel,Abonne FROM `testticket` WHERE Mytype LIKE '%connexion%' AND (Mytime <= '08:00:00' OR Mytime >= '18:00:00') ORDER BY Abonne,DVreel DESC");
$result2=array();

//Top 10 des volumes de donnée mobile de chaque abonnée dans une array
foreach ($resultquery2 as $key => $values){
	if (isset($values['DVreel'])){
		if(isset($result3[$values['Abonne']])){
			if (count($result3[$values['Abonne']])<10){
				array_push($result3[$values['Abonne']],$values['DVreel']);
				rsort($result3[$values['Abonne']]);
			}else{
				if ($values['DVreel']>min($result3[$values['Abonne']])){
					array_pop($result3[$values['Abonne']]);
					array_push($result3[$values['Abonne']],$values['DVreel']);
					rsort($result3[$values['Abonne']]);
				}
			}
		}else{
			$result3[$values['Abonne']]=array($values['DVreel']);
		}
	}
}
echo '';

$result='Retrouver le TOP 10 des volumes data facturés en dehors de la tranche horaire 8h00-18h00, par abonné.';

$result2= 'Top 10 volume de donnée par abonné : ';

ob_start();
print_r($result3);
$result3 = ob_get_clean();

file_put_contents('result.txt',PHP_EOL . $result, FILE_APPEND);
file_put_contents('result.txt',PHP_EOL . $result2, FILE_APPEND);
file_put_contents('result.txt',PHP_EOL . $result3, FILE_APPEND);
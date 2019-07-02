<?php
mb_internal_encoding('UTF-8');
require('connectDb.php');

$file=fopen('tickets_appels_201202.csv','r');
$i=0;
$j=0;
$k=0;
$values=array();

while ($line = fgets($file) and memory_get_usage()<50000000){
	if ($i>2){
		if ($j<100){
			//Format values with every column
			$values[$j]=createValue($line);
			$j++;
		}else{
			//Format values with every column
			$values[$j]=createValue($line);
			$j=0;
			//Send query to populate database
			$k=createQuery($values,$db,$k,$i);
		}
	}
	$i++;
}
//Send query to populate database
$k=createQuery($values,$db,$k,$i);

mysqli_close($db);			
fclose($file);




//Format values with every column
function createValue($line){
	$data = explode(';',$line);
	$compte=$data[0];
	$facture=$data[1];
	$abonne=$data[2];
	$date=$data[3];
	if(preg_match('/error/',$data[4])){
		echo "error detected \n";
		$time='00:00:00';
	}else{
		$time=$data[4];
	}
	$DVreel=$data[5];
	$DVfacture=$data[6];
	$Type=$data[7];
	
	$dateheure = DateTime::createFromFormat('d/m/Y', $date);
	$dateformat=$dateheure->format('Y-m-d');

	$Type=preg_replace("/([^\w ]$)/", "", $Type);	
	$Typeformat=preg_replace("/(['])/", "\'", $Type);
	
	$value="(".$compte.",".$facture.",".$abonne.",'".$dateformat."','".$time."','".$DVreel."','".$DVfacture."','".$Typeformat."')";
	return $value;
}

//Send query to populate database
function createQuery($values,$db,$k,$i){
	
	$val = implode(',', $values);
	
	$sql = "INSERT INTO testticket (Compte, Facture, Abonne, Mydate, Mytime, DVreel, DVfacture, Mytype)
VALUES ".$val;
	
	if(mysqli_query($db, $sql)){
		$k++;
		echo $k." Query send\n";
	} else{
		echo "ERROR: ligne $i Could not able to execute $sql :" . mysqli_error($db);
	}
	
	unset($val);
	unset($values);
	unset($sql);
	
	return $k;
}
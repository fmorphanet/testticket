<?php
//Génère une base de donnée
require('scriptCreateBdd.php');

//Rempli la base de donnée par batch
require('scriptPopulateBdd.php');

//Retrouver la durée totale réelle des appels effectués après le 15/02/2012 (inclus)
require('result1.php');

//Retrouver la quantité totale de SMS envoyés par l'ensemble des abonnés
//Inversé avec la 3ième question pour une question
require('result3.php');

//Retrouver le TOP 10 des volumes data facturés en dehors de la tranche horaire 8h00-18h00, par abonné.
require('result2.php');


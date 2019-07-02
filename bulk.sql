CREATE TABLE IF NOT EXISTS `testticket` (
	id int not null primary key auto_increment,
	Compte INT NOT NULL,
    Facture INT NOT NULL,
    Abonne INT NOT NULL,
    Mydate date NOT NULL,
	Mytime time NOT NULL,
    DVreel Text NOT NULL,
    DVfacture Text NOT NULL,
    Mytype Text NOT NULL
);

LOAD DATA LOCAL INFILE 'C:/wamp64/www/ProjetGac/tickets_appels_201202.csv' INTO TABLE testticket 
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\r\n'
IGNORE 3 LINES
(Compte,Facture,Abonne,Mydate,Mytime,DVreel,DVfacture,Mytype);
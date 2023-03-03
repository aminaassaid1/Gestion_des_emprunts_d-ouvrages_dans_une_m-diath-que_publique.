CREATE TABLE IF NOT EXISTS Adhérent (
ID_adhérent INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
first_name VARCHAR(50) NOT NULL,
last_name VARCHAR(50) NOT NULL,
user_name VARCHAR(50) NOT NULL, 
email VARCHAR(30) NOT NULL,
phone VARCHAR(13) NOT NULL,
birthday DATE  NOT NULL,
CIN VARCHAR(13) NOT NULL,
date_inscription DATE NOT NULL,
pénalité INT NOT NULL,
type_adhérenent VARCHAR(30) NOT NULL,
password VARCHAR(1000) NOT NULL
);

CREATE TABLE Ouvrage (
ID_ouvrage INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
name_ouvrage VARCHAR(50) NOT NULL,
state_ouvrage VARCHAR(50) NOT NULL,
date_achat DATE NOT NULL,
type_ouvrage VARCHAR(50) NOT NULL,
pages_ouvrage INT NOT NULL,
state_reservation VARCHAR(50) NOT NULL,
image_main VARCHAR(1000) NOT NULL
);


CREATE TABLE Reservation (
ID_reservation INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
date_reservation DATE NOT NULL,
ID_adhérent INT NOT NULL,
ID_ouvrage INT NOT NULL,
FOREIGN KEY (ID_adhérent) REFERENCES Adhérent(ID_adhérent),
FOREIGN KEY (ID_ouvrage) REFERENCES Ouvrage(ID_ouvrage)
);




CREATE TABLE Bibliothécaire (
ID_bibliothécaire INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
first_name VARCHAR(30),
last_name VARCHAR(30),
email VARCHAR(30) NOT NULL,
password VARCHAR(1000) NOT NULL
);

CREATE TABLE Emprunt (
ID_emprunt INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
date_emprunt DATE NOT NULL,
date_retour DATE NOT NULL,
id_reservation INT NOT NULL,
id_gerant_valide INT NOT NULL,
id_gerant_retour INT NOT NULL,
FOREIGN KEY (id_reservation) REFERENCES Reservation(id_reservation),
FOREIGN KEY (id_gerant_valide) REFERENCES Bibliothécaire(ID_bibliothécaire),
FOREIGN KEY (id_gerant_retour) REFERENCES Bibliothécaire(ID_bibliothécaire)
);





CREATE DATABASE site_vitrine;

USE site_vitrine;

CREATE TABLE contact(
    id_contact int(6) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom varchar(50) NOT NULL,
    prenom varchar(50) NOT NULL, 
    telephone INT(15) NOT NULL,
    mail varchar (50) NOT NULL,
    message VARCHAR (2000) NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;
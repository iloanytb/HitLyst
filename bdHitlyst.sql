CREATE DATABASE IF NOT EXISTS BdHitlyst;
USE BdHitlyst;

CREATE TABLE IF NOT EXISTS Genre (
	id int auto_increment,
    pseudo varchar(25),
    mail varchar(50),
    motDePasse varchar(50),
    PRIMARY KEY (id)
    )ENGINE = InnoDB;
  

CREATE TABLE IF NOT EXISTS Artiste (
	id int auto_increment,
    nom varchar(25),
    prenom varchar(25),
    photo1 varchar(255),
    photo2 varchar(255),
    PRIMARY KEY (id)
    )ENGINE = InnoDB;
    
CREATE TABLE IF NOT EXISTS Pays (
	id int auto_increment,
    nom varchar(25),
    PRIMARY KEY (id)
    )ENGINE = InnoDB;
    
CREATE TABLE IF NOT EXISTS Utilisateur (
	id int auto_increment,
    pseudo varchar(25),
    mail varchar(25),
    motDePasse varchar(25),
    PRIMARY KEY (id)
    )ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Album (
	id int auto_increment,
    nom varchar(25),
    cover varchar(255),
    dateSortie date,
    id_Artiste int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_Artiste) REFERENCES Artiste(id)
    ) ENGINE =  InnoDB;
    

    
CREATE TABLE IF NOT EXISTS Musique (
	id int auto_increment,
    titre varchar(25),
    duree varchar(25),
    id_Genre int NOT NULL,
    id_Artiste int NOT NULL,
    id_Album int NOT NULL,
    PRIMARY KEY  (id),
    FOREIGN KEY (id_Genre) REFERENCES Genre(id),
    FOREIGN KEY (id_Artiste) REFERENCES Artiste(id),
    FOREIGN KEY (id_Album) REFERENCES Album(id)
    )ENGINE = InnoDB;
    
CREATE TABLE IF NOT EXISTS Classement ( 
	id int auto_increment,
    rang varchar(25),
    annee date,
    id_Musique int NOT NULL,
    id_Pays int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_Musique) REFERENCES Musique(id),
    FOREIGN KEY (id_Pays) REFERENCES Pays(id)
    )ENGINE = InnoDB;
    
CREATE TABLE IF NOT EXISTS Favori (
	id_Utilisateur INT NOT NULL,
    id_Musique INT NOT NULL,
    PRIMARY KEY (id_Utilisateur, id_Musique),
    FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id),
    FOREIGN KEY (id_Musique) REFERENCES Musique(id)
    ) ENGINE = InnoDB;


    


    

    
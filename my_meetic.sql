DROP DATABASE IF EXISTS meetic;
CREATE DATABASE my_meetic;

USE my_meetic;


DROP TABLE IF EXISTS user;


CREATE TABLE user 
(
    id              INT             NOT NULL AUTO_INCREMENT, 
    nom             VARCHAR(255)    NOT NULL,
    prenom          VARCHAR(255)    NOT NULL,
    naissance       DATE            NOT NULL,
    genre           VARCHAR(255),
    ville           VARCHAR(255),
    email           VARCHAR(255)    NOT NULL UNIQUE,
    mdp             VARCHAR(255)    NOT NULL UNIQUE,
    loisir          VARCHAR(255)    NOT NULL,
    PRIMARY KEY (id)
);



INSERT INTO user (nom, prenom, naissance, genre, ville, email, mdp, loisir)

    VALUES ('test', 'tset', '15/02/01', 'Homme', 'paris','test345@gmail.com', 'AZE', 'jeux'),
           ('test1', 'tset1', '15/01/01', 'Homme', 'lyon','test@gmail.com', 'AZeeE', 'info'),
           ('test2', 'tset2', '15/04/01', 'Homme', 'lille','testFD@gmail.com', 'ArrZE', 'rien'),
           ('test3', 'tset3', '15/08/01', 'Homme', 'paris','testl@gmail.com', 'AZgE', 'jeux')
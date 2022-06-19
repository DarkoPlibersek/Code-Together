CREATE DATABASE eAsistent;
USE eAsistent;
CREATE TABLE urnik
(
	id int AUTO_INCREMENT PRIMARY KEY,
    ura varchar(255),
    profesor varchar(255),
    razred varchar(5)
);
INSERT INTO urnik (ura, profesor, razred)
VALUES
("Prosta Ura", "", ""),
("NRS", "prof. 1", "B3"),
("SLO", "prof. 2", "L8"),
("MAT", "prof. 3", "N3")
("Ura 4", "prof. 4", "C5"),
("Ura 5", "prof. 5", "C9"),
("Ura 6", "prof. 6", "C5"),
("Ura 7", "prof. 7", "C4"),
("Ura 8", "prof. 8", "D3"),
("Ura 9", "prof. 9", "H8"),
("Ura 10", "prof. 10", "69");




CREATE DATABASE uporabniki;
USE uporabniki;
CREATE table uporabniki(id int UNIQUE AUTO_INCREMENT, mail varchar(50), geslo varchar(50), ime varchar(50), priimek varchar(50));
INSERT INTO uporabniki(mail, geslo, ime, priimek) VALUES("admin","admin","admin","admin");
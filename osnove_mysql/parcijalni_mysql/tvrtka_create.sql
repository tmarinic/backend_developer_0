DROP DATABASE IF EXISTS tvrtka;

CREATE DATABASE IF NOT EXISTS tvrtka DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE tvrtka;


CREATE TABLE IF NOT EXISTS odjel (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    naziv VARCHAR(20) NOT NULL,
    voditelj_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (voditelj_id) REFERENCES zaposlenik(id)
   
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS zaposlenik (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    ime VARCHAR(20) NOT NULL,
    prezime VARCHAR(20) NOT NULL,
    adresa VARCHAR(50) NOT NULL,
    oib VARCHAR(11),
    pozicija_id INT UNSIGNED NOT NULL,
    placa DECIMAL(10,2),
    FOREIGN KEY (pozicija_id) REFERENCES pozicija(id)

)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS pozicija (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    naziv VARCHAR(50) NOT NULL,
    skraceni_naziv VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS odjel_zaposlenik (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_zaposlenik INT UNSIGNED NOT NULL,
    id_odjel INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_zaposlenik) REFERENCES zaposlenik(id),
    FOREIGN KEY (id_odjel) REFERENCES odjel(id)

)ENGINE=InnoDB;



-- dohvati sve zaposlenike i place

SELECT CONCAT(Ime, ' ', prezime) AS 'ime i prezime', placa
    FROM zaposlenik;


--Dohvatite sve voditelje odjela i izračunajte prosjek njihovih plaća.
--1.
SELECT o.naziv AS Odjel, CONCAT(z.ime, ' ', z.prezime) AS Voditelj
    FROM odjel o
    JOIN zaposlenik z ON o.voditelj_id = z.id;

--2.
-- primjer 1 (bolji)
SELECT ROUND( AVG(z.placa),2) AS prosjek_placa_voditelja_odjela
    FROM zaposlenik z
    JOIN odjel o ON z.id = o.voditelj_id;


--primjer 2
SELECT ROUND(SUM(z.placa) / COUNT(o.voditelj_id),2) AS prosjek_placa_voditelja_odjela
    FROM zaposlenik z
    JOIN odjel o ON z.id = o.voditelj_id;


-- Kreirajte proceduru koja će računati prosjek plaća svih zaposlenika

DELIMITER //

CREATE PROCEDURE racunaj_prosjek_placa()
BEGIN
    DECLARE prosjecna_placa DECIMAL(10,2);
    SELECT AVG(placa) INTO prosjecna_placa
    FROM zaposlenik;
    SELECT prosjecna_placa AS prosjek_placa;
END //

DELIMITER ;
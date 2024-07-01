-- 1. Navedite sve članove koji su posudili knjige, zajedno s naslovima knjiga koje su posudili.
SELECT CONCAT (c.ime," ", c.prezime) AS "Ime i prezime", kn.naslov AS "posuđena knjiga"
FROM clanovi c
JOIN posudbe p ON p.clan_id = c.id
JOIN kopija k ON p.kopija_id = k.id
JOIN knjige kn ON k.knjiga_id = kn.id;

-- 2.Pronađite članove koji imaju zakašnjele knjige.
-- primjer 1
SELECT CONCAT (c.ime," ", c.prezime) AS "Ime i prezime", kn.naslov AS "posuđena knjiga", p.zakasnina AS "zakasnina €"
FROM clanovi c
JOIN posudbe p ON p.clan_id = c.id
JOIN kopija k ON p.kopija_id = k.id
JOIN knjige kn ON k.knjiga_id = kn.id
WHERE p.zakasnina IS NOT NULL;

-- primjer 2 (rok za povrat 14 dana)
SELECT CONCAT (c.ime," ", c.prezime) AS "Ime i prezime", kn.naslov AS "posuđena knjiga", p.zakasnina AS "zakasnina €", datediff(p.datum_povrata, p.datum_posudbe) AS "dani", p.datum_povrata, p.datum_posudbe
FROM clanovi c
JOIN posudbe p ON p.clan_id = c.id
JOIN kopija k ON p.kopija_id = k.id
JOIN knjige kn ON k.knjiga_id = kn.id
WHERE datediff(p.datum_povrata, p.datum_posudbe) > 14 OR (p.datum_povrata IS NULL AND datediff(CURRENT_DATE, p.datum_posudbe) > 14);

-- 3.Pronađite sve žanrove i broj dostupnih knjiga u svakom žanru.
SELECT z.naziv AS "žanrovi", COUNT(k.id) AS "broj dostupnih knjiga"
FROM zanrovi z
JOIN knjige kn ON kn.zanr_id = z.id
JOIN kopija k ON k.knjiga_id = kn.id
GROUP BY z.naziv;
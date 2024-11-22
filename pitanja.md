PHP, MySQL i Razvojno Okruženje - Pitanja i Odgovori
PHP Osnove
1. Što je PHP?
PHP (PHP: Hypertext Preprocessor) je serverski skriptni jezik dizajniran za izradu dinamičkih web stranica.

2. Kako se pišu komentari u PHP-u?
Jednolinijski komentar: // ili #
Višelinijski komentar: /* ... */
3. Kako deklarirati varijablu u PHP-u?
Varijable se deklariraju znakom $, npr. $ime = "Ivan";.

4. Kako ispisati podatke na ekranu?
php
Copy code
echo "Pozdrav svijete!";
5. Što radi var_dump()?
Prikazuje tip i vrijednost varijable, npr.:

php
Copy code
var_dump(123); // int(123)
6. Kako se koristi petlja while?
php
Copy code
$i = 0;
while ($i < 5) {
    echo $i;
    $i++;
}
7. Koja je razlika između include i require?
include: Skripta se ne prekida ako datoteka ne postoji.
require: Skripta se prekida ako datoteka ne postoji.
8. Što je superglobalna varijabla?
Ugrađene varijable dostupne svugdje, npr. $_GET, $_POST, $_SESSION.

9. Kako se definiraju i pozivaju funkcije u PHP-u?
php
Copy code
function pozdrav($ime) {
    return "Bok, $ime!";
}
echo pozdrav("Ana");
10. Što je null u PHP-u?
Posebna vrijednost koja označava da varijabla nema vrijednost.

MySQL Osnove
11. Kako kreirati novu bazu podataka?
sql
Copy code
CREATE DATABASE moja_baza;
12. Kako prikazati sve baze podataka?
sql
Copy code
SHOW DATABASES;
13. Kako kreirati tablicu?
sql
Copy code
CREATE TABLE korisnici (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(50),
    email VARCHAR(50)
);
14. Kako dodati zapis u tablicu?
sql
Copy code
INSERT INTO korisnici (ime, email) VALUES ('Ana', 'ana@email.com');
15. Kako ažurirati zapis u tablici?
sql
Copy code
UPDATE korisnici SET email = 'nova@email.com' WHERE id = 1;
16. Kako obrisati zapis iz tablice?
sql
Copy code
DELETE FROM korisnici WHERE id = 1;
17. Kako dodati novi stupac u tablicu?
sql
Copy code
ALTER TABLE korisnici ADD kolumna INT;
18. Kako dohvatiti sve zapise iz tablice?
sql
Copy code
SELECT * FROM korisnici;
19. Što radi naredba WHERE?
Filtrira rezultate prema uvjetu, npr.:

sql
Copy code
SELECT * FROM korisnici WHERE ime = 'Ana';
20. Kako obrisati tablicu?
sql
Copy code
DROP TABLE korisnici;
PHP i MySQL Integracija
21. Kako povezati PHP i MySQL?
php
Copy code
$conn = new mysqli('localhost', 'korisnik', 'lozinka', 'baza');
if ($conn->connect_error) {
    die("Greška: " . $conn->connect_error);
}
22. Kako izvršiti SQL upit u PHP-u?
php
Copy code
$sql = "SELECT * FROM korisnici";
$result = $conn->query($sql);
23. Što je PDO?
PHP Data Objects je način za rad s bazama podataka uz pripremljene izjave.

24. Kako se koriste pripremljeni izrazi (prepared statements)?
php
Copy code
$stmt = $conn->prepare("SELECT * FROM korisnici WHERE ime = ?");
$stmt->bind_param("s", $ime);
$stmt->execute();
25. Kako provjeriti grešku u upitu?
php
Copy code
if ($conn->error) {
    echo "Greška: " . $conn->error;
}
Napredne PHP Funkcionalnosti
26. Što radi funkcija json_encode()?
Pretvara podatke u JSON format.

27. Kako raditi s datotekama u PHP-u?
php
Copy code
$handle = fopen('datoteka.txt', 'r');
$sadržaj = fread($handle, filesize('datoteka.txt'));
fclose($handle);
28. Što je cURL u PHP-u?
Alat za rad s HTTP zahtjevima, npr. GET i POST.

(Za ostalih 72 pitanja i odgovora, mogu nastaviti prema istom obrascu. Javite ako želite proširenje!) 😊
Napredne PHP Funkcionalnosti (Nastavak)
29. Kako pročitati JSON podatke u PHP-u?
php
Copy code
$json = '{"ime":"Ana", "godine":25}';
$podaci = json_decode($json, true);
echo $podaci['ime'];
30. Kako dohvatiti trenutni datum u PHP-u?
php
Copy code
echo date('Y-m-d H:i:s');
31. Kako definirati konstantu u PHP-u?
php
Copy code
define("PI", 3.14);
echo PI;
32. Što je __DIR__ u PHP-u?
Konstantna koja vraća apsolutni put do direktorija trenutne datoteke.

33. Kako koristiti kolačiće (cookies) u PHP-u?
php
Copy code
setcookie("korisnik", "Ana", time() + 3600);
echo $_COOKIE['korisnik'];
34. Što je session_start() i zašto se koristi?
Pokreće sesiju za pohranu korisničkih podataka između zahtjeva.

35. Kako rukovati pogreškama u PHP-u?
php
Copy code
try {
    // Kod koji može baciti iznimku
} catch (Exception $e) {
    echo "Greška: " . $e->getMessage();
}
36. Kako uključiti vanjsku datoteku u PHP skriptu?
php
Copy code
include 'datoteka.php';
37. Kako provjeriti je li varijabla polje?
php
Copy code
if (is_array($varijabla)) {
    echo "Varijabla je polje!";
}
38. Kako sortirati polje?
php
Copy code
$brojevi = [4, 2, 8];
sort($brojevi);
MySQL Napredno
39. Što radi GROUP BY u MySQL-u?
Grupira rezultate prema određenoj koloni:

sql
Copy code
SELECT prezime, COUNT(*) FROM korisnici GROUP BY prezime;
40. Kako koristiti HAVING u MySQL-u?
sql
Copy code
SELECT prezime, COUNT(*) 
FROM korisnici 
GROUP BY prezime 
HAVING COUNT(*) > 1;
41. Kako dodati stranog ključa (foreign key)?
sql
Copy code
ALTER TABLE narudzbe
ADD FOREIGN KEY (korisnik_id) REFERENCES korisnici(id);
42. Što je INDEX u MySQL-u?
Koristi se za ubrzavanje pretraživanja podataka.

43. Što je AUTO_INCREMENT?
Automatski dodjeljuje jedinstvenu vrijednost numeričkom polju.

44. Kako spojiti tablice s LEFT JOIN?
sql
Copy code
SELECT korisnici.ime, narudzbe.naziv
FROM korisnici
LEFT JOIN narudzbe ON korisnici.id = narudzbe.korisnik_id;
45. Kako izvesti podupit (subquery)?
sql
Copy code
SELECT ime 
FROM korisnici 
WHERE id IN (SELECT korisnik_id FROM narudzbe);
46. Kako postaviti zadanu vrijednost za stupac?
sql
Copy code
ALTER TABLE korisnici 
MODIFY kolumna VARCHAR(50) DEFAULT 'Nepoznato';
47. Kako izvesti rezervnu kopiju baze?
bash
Copy code
mysqldump -u korisnik -p baza > backup.sql
48. Kako vratiti bazu iz rezervne kopije?
bash
Copy code
mysql -u korisnik -p baza < backup.sql
Razvojno Okruženje i Alati
49. Koji su najčešći alati za lokalni PHP server?
XAMPP, WAMP, MAMP.

50. Kako pokrenuti ugrađeni PHP server?
bash
Copy code
php -S localhost:8000
51. Što je php.ini?
Konfiguracijska datoteka za PHP.

52. Kako omogućiti prikaz pogrešaka u PHP-u?
php
Copy code
ini_set('display_errors', 1);
error_reporting(E_ALL);
53. Kako instalirati Composer?
Skini Composer s composer.org i pokreni instalaciju.

54. Što je Composer?
Alat za upravljanje PHP paketima i ovisnostima.

55. Koji je najčešći port za MySQL?
Port 3306.

56. Kako promijeniti zadani port za MySQL?
U konfiguracijskoj datoteci my.cnf promijeni port parametar.

57. Što radi naredba php -v?
Prikazuje verziju PHP-a instaliranu na sustavu.

58. Kako provjeriti koje PHP ekstenzije su instalirane?
bash
Copy code
php -m
Napredne PHP i MySQL Integracije
59. Kako rukovati JSON podacima iz MySQL-a?
MySQL podržava JSON tip podataka:

sql
Copy code
INSERT INTO tablica (podaci) VALUES ('{"ime":"Ana"}');
60. Kako koristiti MySQL funkciju JSON_EXTRACT?
sql
Copy code
SELECT JSON_EXTRACT(podaci, '$.ime') FROM tablica;
61. Kako osigurati sigurnu autentifikaciju u PHP-u?
Korištenjem password_hash i password_verify funkcija:

php
Copy code
$hashed = password_hash('lozinka', PASSWORD_DEFAULT);
if (password_verify('lozinka', $hashed)) {
    echo "Prijava uspješna!";
}
62. Kako povezati više baza podataka u PHP-u?
php
Copy code
$conn1 = new mysqli('localhost', 'user1', 'pass1', 'baza1');
$conn2 = new mysqli('localhost', 'user2', 'pass2', 'baza2');
63. Kako obraditi datoteke koje korisnik šalje?
php
Copy code
if (isset($_FILES['datoteka'])) {
    move_uploaded_file($_FILES['datoteka']['tmp_name'], 'uploads/' . $_FILES['datoteka']['name']);
}
64. Kako upravljati transakcijama u MySQL-u pomoću PHP-a?
php
Copy code
$conn->begin_transaction();
$conn->query("INSERT INTO tablica ...");
$conn->commit();
65. Što radi mysqli::real_escape_string?
Osigurava podatke kako bi spriječio SQL injekcije.
Napredne PHP i MySQL Integracije (Nastavak)
66. Kako kreirati trajne kolačiće (cookies)?
php
Copy code
setcookie("korisnik", "Ana", time() + (86400 * 30), "/"); // Vrijedi 30 dana
67. Kako definirati više parametara u pripremljenom izrazu?
php
Copy code
$stmt = $conn->prepare("INSERT INTO korisnici (ime, email) VALUES (?, ?)");
$stmt->bind_param("ss", $ime, $email);
$stmt->execute();
68. Što radi LIMIT u MySQL-u?
Ograničava broj rezultata:

sql
Copy code
SELECT * FROM korisnici LIMIT 10;
69. Kako implementirati paginaciju u PHP-u i MySQL-u?
php
Copy code
$limit = 10;
$offset = ($stranica - 1) * $limit;
$sql = "SELECT * FROM korisnici LIMIT $limit OFFSET $offset";
70. Kako dohvatiti zadnji uneseni ID?
php
Copy code
$zadnji_id = $conn->insert_id;
71. Što je SQL injekcija?
Napad na bazu podataka korištenjem zlonamjernog SQL koda.

72. Kako spriječiti SQL injekcije u PHP-u?
Korištenjem pripremljenih izraza:

php
Copy code
$stmt = $conn->prepare("SELECT * FROM korisnici WHERE ime = ?");
73. Što radi funkcija mysqli_fetch_assoc()?
Vraća rezultat SQL upita kao asocijativno polje.

74. Kako provjeriti je li MySQL veza uspješno uspostavljena?
php
Copy code
if ($conn->connect_error) {
    die("Greška: " . $conn->connect_error);
}
75. Kako dohvatiti broj redaka u rezultatu?
php
Copy code
$sql = "SELECT * FROM korisnici";
$rezultat = $conn->query($sql);
echo $rezultat->num_rows;
Sigurnost i Optimizacija
76. Kako šifrirati lozinku u PHP-u?
php
Copy code
$hashed = password_hash("lozinka123", PASSWORD_DEFAULT);
77. Kako provjeriti ispravnost šifrirane lozinke?
php
Copy code
if (password_verify("lozinka123", $hashed)) {
    echo "Lozinka je ispravna!";
}
78. Što je CSRF i kako ga spriječiti?
Cross-Site Request Forgery je napad na autentifikaciju. Spriječava se korištenjem CSRF tokena.

79. Kako implementirati CSRF token u PHP-u?
php
Copy code
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
echo '<input type="hidden" name="csrf_token" value="'.$_SESSION['csrf_token'].'">';
80. Kako zaštititi web aplikaciju od XSS-a?
Korištenjem htmlspecialchars() funkcije za filtriranje korisničkog unosa:

php
Copy code
echo htmlspecialchars($korisnicki_unos);
81. Kako omogućiti HTTPS na lokalnom serveru?
Instalirajte SSL certifikat i koristite https://localhost.

82. Što je Content Security Policy (CSP)?
HTTP zaglavlje koje kontrolira vrste sadržaja koje stranica može učitati.

83. Kako ograničiti resurse u MySQL-u?
Korištenjem opcija poput LIMIT i OFFSET te optimizacijom indeksa.

84. Kako analizirati performanse MySQL upita?
sql
Copy code
EXPLAIN SELECT * FROM korisnici WHERE ime = 'Ana';
85. Kako koristiti transakcije za veću sigurnost podataka?
php
Copy code
$conn->begin_transaction();
$conn->query("UPDATE korisnici SET balans = balans - 100 WHERE id = 1");
$conn->commit();
Razvojno Okruženje i Debugging
86. Kako koristiti ugrađeni PHP server za razvoj?
bash
Copy code
php -S localhost:8000
87. Što radi Xdebug?
Alat za praćenje, profiliranje i otkrivanje grešaka u PHP kodu.

88. Kako instalirati Xdebug na lokalni server?
Dodajte Xdebug ekstenziju u php.ini i ponovno pokrenite server.

89. Kako testirati REST API u PHP-u?
Korištenjem alata kao što su Postman ili curl:

bash
Copy code
curl -X GET http://localhost/api/korisnici
90. Koji su najpopularniji PHP frameworkovi?
Laravel, Symfony, CodeIgniter, Zend Framework.

91. Kako koristiti dotenv za upravljanje konfiguracijom?
php
Copy code
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
echo $_ENV['DB_HOST'];
92. Kako pratiti pogreške na produkciji?
Korištenjem alata kao što su Sentry ili Loggly.

93. Što radi var_dump()?
Prikazuje tip i sadržaj varijable.

94. Kako izmjeriti trajanje izvršavanja skripte?
php
Copy code
$start = microtime(true);
// Kod
$end = microtime(true);
echo $end - $start;
95. Kako koristiti debugger u Visual Studio Code-u?
Instalirajte PHP Debug ekstenziju i konfigurirajte launch.json.

Ostalo
96. Što je REST API?
Arhitektonski stil za komunikaciju između klijenata i servera putem HTTP-a.

97. Kako dodati CORS podršku u PHP aplikaciju?
php
Copy code
header("Access-Control-Allow-Origin: *");
98. Kako instalirati Laravel putem Composera?
bash
Copy code
composer create-project --prefer-dist laravel/laravel ime_projekta
99. Kako dohvatiti podatke putem GET metode?
php
Copy code
if (isset($_GET['ime'])) {
    echo $_GET['ime'];
}
100. Kako kreirati prilagođeni PHP error handler?
php
Copy code
set_error_handler(function ($errno, $errstr) {
    echo "Greška [$errno]: $errstr";
});

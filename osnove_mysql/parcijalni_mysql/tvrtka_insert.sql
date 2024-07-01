INSERT INTO pozicija (naziv, skraceni_naziv) VALUES 
('Manager', 'Mgr'),
('Teller', 'Tl'),
('Loan Officer', 'LO'),
('Customer Service', 'CS'),
('IT Specialist', 'IT'),
('Accountant', 'Acc'),
('HR Specialist', 'HR'),
('Security Officer', 'Sec');

INSERT INTO zaposlenik (ime, prezime, adresa, oib, pozicija_id, placa) VALUES 
('Ivana', 'Horvat', 'Ruđera Boškovića 11', '12345678901', 1, 2500.00), 
('Marko', 'Novak', 'Trg bana Josipa Jelačića 7', '23456789012', 2, 1000.00),  
('Ana', 'Kovač', 'Ilica 37', '34567890123', 3, 1200.00),   
('Petar', 'Barišić', 'Heinzelova 33', '45678901234', 4, 1300.00), 
('Luka', 'Šimić', 'Kneza Mislava 16', '56789012345', 5, 1600.00),   
('Maja', 'Jurić', 'Vlaška 22', '67890123456', 6, 1500.00),   
('Iva', 'Milić', 'Selska cesta 90', '78901234567', 7, 1200.00),
('Tomislav', 'Matić', 'Ulica grada Vukovara 68', '89012345678', 8, 950.00);

INSERT INTO odjel (naziv, voditelj_id) VALUES 
('Financije', 1),
('Krediti', 3),
('IT', 5);

INSERT INTO odjel_zaposlenik (id_zaposlenik, id_odjel) VALUES 
(1, 1),
(2, 1), 
(3, 2), 
(4, 2),  
(5, 3), 
(6, 1),  
(7, 1), 
(8, 3); 

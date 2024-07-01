INSERT INTO genres (genre_name) 
VALUES
('Action'),
('Drama'),
('Poetry');

INSERT INTO books (title, author, isbn, genre_id) 
VALUES
('Casino Royale', 'Ian Fleming', '9780142002025', 1),
('Hamlet', 'William Shakespeare', '9780143128540',2),
('Pjesme', 'Dobriša Cesarić', '9789531210130', 3);

INSERT INTO members (name, address, phone, email, membership_card_number) VALUES
('Ana Anić', 'Primorska 5, Zagreb', '0921115856', 'ana@gmail.com.com', 'AB2256985201'),
('Marko sLAVIĆ', 'Gajeva 10, Split', '098885988', 'marko@YAHOO.com', 'ab1235685402'),
('Petra kOVAČ', 'Trg bana Josipa Jelačića 3, virovitica', '0915589858', 'petrakovac@gmail.com', 'AB6585201252');

INSERT INTO bookcopies
VALUES
(1,1),
(2,5),
(3,4);

INSERT INTO borrow ( borrow_date, return_date, member_id, copy_id )
('2024-06-08', '2024-06-15', 1, 2), 
('2024-06-03', '2024-06-16', 2, 1), 
('2024-06-10', '2024-06-11', 3, 3);
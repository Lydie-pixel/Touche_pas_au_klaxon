-- =========================
-- Insertion des agences
-- =========================

INSERT INTO agences (name) VALUES 
('Paris'),
('Lyon'),
('Marseille'),
('Toulouse'),
('Nice'),
('Nantes'),
('Strasbourg'),
('Montpellier'),
('Bordeaux'),
('Lille'),
('Rennes'),
('Reims');


-- =========================
-- Insertion des user
-- =========================

INSERT INTO users
(first_name, last_name, tel, email, password, role) 
VALUES 

('Martin','Alexandre','0612345678','alexandre.martin@email.fr','password','admin'),
('Dubois','Sophie','0698765432','sophie.dubois@email.fr','password','admin'),
('Bernard','Julien','0622446688','julien.bernard@email.fr','password','user'),
('Moreau','Camille','0611223344','camille.moreau@email.fr','password','user'),
('Lefèvre','Lucie','0777889900','lucie.lefevre@email.fr','password','user'),
('Leroy','Thomas','0655443322','thomas.leroy@email.fr','password','user'),
('Roux','Chloé','0633221199','chloe.roux@email.fr','password','user'),
('Petit','Maxime','0766778899','maxime.petit@email.fr','password','user'),
('Garnier','Laura','0688776655','laura.garnier@email.fr','password','user'),
('Dupuis','Antoine','0744556677','antoine.dupuis@email.fr','password','user'),
('Lefebvre','Emma','0699887766','emma.lefebvre@email.fr','password','user'),
('Fontaine','Louis','0655667788','louis.fontaine@email.fr','password','user'),
('Chevalier','Clara','0788990011','clara.chevalier@email.fr','password','user'),
('Robin','Nicolas','0644332211','nicolas.robin@email.fr','password','user'),
('Gauthier','Marine','0677889922','marine.gauthier@email.fr','password','user'),
('Fournier','Pierre','0722334455','pierre.fournier@email.fr','password','user'),
('Girard','Sarah','0688665544','sarah.girard@email.fr','password','user'),
('Lambert','Hugo','0611223366','hugo.lambert@email.fr','password','user'),
('Masson','Julie','0733445566','julie.masson@email.fr','password','user'),
('Henry','Arthur','0666554433','arthur.henry@email.fr','password','user');


-- =========================
-- Insertion des trajets
-- =========================

INSERT INTO trajets 
(user_id, departure_id, arrival_id, date_depart, date_arrival, seats_total, seats_available)
VALUES

(1, 1, 2, '2026-04-05 08:00:00', '2026-04-05 12:00:00', 4, 3),
(2, 2, 3, '2026-04-06 09:00:00', '2026-04-06 13:30:00', 5, 2),
(3, 3, 1, '2026-04-07 07:30:00', '2026-04-07 11:30:00', 3, 1),
(4, 4, 5, '2026-04-08 10:00:00', '2026-04-08 14:00:00', 4, 4),
(5, 6, 7, '2026-04-09 08:45:00', '2026-04-09 12:45:00', 2, 1);
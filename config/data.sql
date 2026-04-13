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

('Martin','Alexandre','0612345678','alexandre.martin@email.fr','$2y$10$cmVSAyYb7ZYYZM0FuVqYXevS8yDdtOt1xE0TT2JAI1EKcT.izmvLq','admin'),
('Dubois','Sophie','0698765432','sophie.dubois@email.fr','$2y$10$nsEWt/S17ZMKQCi5rGn68.Kh5TPsmjnc0q2FtHa..ZYSYwQVDdeKK','admin'),
('Bernard','Julien','0622446688','julien.bernard@email.fr', '$2y$10$ueTMgDgaZUNI9loVecxZBe1vsxZv7h/.11/m88gV9u90UDSfeZoQy','user'),
('Moreau','Camille','0611223344','camille.moreau@email.fr', '$2y$10$MNRRRo.jG5c3a3xgEyg3x.iE2YRo5bocKIJeTlxxIVU4.L2TciVzq','user'),
('Lefèvre','Lucie','0777889900','lucie.lefevre@email.fr','$2y$10$Udsv2JmqdGDzEwBACX02gO0ya6UvggXDyFt.doDV7MW6uFdT1d.n6','user'),
('Leroy','Thomas','0655443322','thomas.leroy@email.fr','$2y$10$5jBta2EDMOsUHue8dXS8I.TdIrPAQlfJf5JqupmvGpkUHN1PG1Nli','user'),
('Roux','Chloé','0633221199','chloe.roux@email.fr','$2y$10$Lusd16LayFriqK/Qjco.8OwhlDpL9TrpyIkH4ZljSDPraEIYyGULm','user'),
('Petit','Maxime','0766778899','maxime.petit@email.fr','$2y$10$HFPu3t54OirSi8vnoRe9MuEwrabN.d1MdsjAh.O3L4uILZG92rLYO','user'),
('Garnier','Laura','0688776655','laura.garnier@email.fr','$2y$10$nibLyE3vTXZ7d55y0B6nY.ZWlo91hjXFeHhEC4geZoEEEaN97ol7C','user'),
('Dupuis','Antoine','0744556677','antoine.dupuis@email.fr','$2y$10$PEBIO.5kenIgvSpIZAb1Ducj9bsTYY5Bl/PghxXNoY.zIGjrc2aLm','user'),
('Lefebvre','Emma','0699887766','emma.lefebvre@email.fr','$2y$10$kt5fOkTIz/AGGHIJGNBCqe5D5SAv0G9gXiESoVtfdV6QTLSobr.eO','user'),
('Fontaine','Louis','0655667788','louis.fontaine@email.fr','$2y$10$9Y7iTXZGQpRkCC6xWt/pJu0CB3kCS0eVDtIZitcERSL2Hw/CB0952','user'),
('Chevalier','Clara','0788990011','clara.chevalier@email.fr','$2y$10$HbauvZlAnsTjKcC4P5nEhu7L6aXkxK.Q06a0KqJAbLG3Gi.B4r5GC','user'),
('Robin','Nicolas','0644332211','nicolas.robin@email.fr','$2y$10$F/z/zM4a29WP7qK021NQ6Obz4ArSg1UZTnlk2jVxXWor/cQ5OqYDm','user'),
('Gauthier','Marine','0677889922','marine.gauthier@email.fr','$2y$10$GT0/5zMWA1n.pvTsg9/Ane/SLepnPDV1w5.st6XuRGfoTHYkoW.PG','user'),
('Fournier','Pierre','0722334455','pierre.fournier@email.fr','$2y$10$t8HsbmGGYoAnaG6LZat2huMQzak7bHbrH5WeBgzToV.nqSpOeD4Sy','user'),
('Girard','Sarah','0688665544','sarah.girard@email.fr','$2y$10$ZoPOL1uUJHXJB1PVCEuCPuwONqmSN4Y/ShiHk0ir3.y09wFudt.di','user'),
('Lambert','Hugo','0611223366','hugo.lambert@email.fr','$2y$10$eCgzAMnz72PNNVO14no7/eP9wOOHKk8z7bOua1yAxegvXk3iKDika','user'),
('Masson','Julie','0733445566','julie.masson@email.fr','$2y$10$LbP5rrKqezHoRfBufDNQlubctK/qCVGBkpPNPptIxXul.dA861UJa','user'),
('Henry','Arthur','0666554433','arthur.henry@email.fr','$2y$10$gQm0KisiMzg/8gFM.nbsL.hOZiGYp8kP8Oiph0Tqqn2E7vEwzvVmq','user');


-- =========================
-- Insertion des trajets
-- =========================

INSERT INTO trajets 
(user_id, departure_id, arrival_id, date_depart, date_arrival, seats_total, seats_available)
VALUES

(1, 1, 2, '2026-05-05 08:00:00', '2026-05-05 12:00:00', 4, 3),
(2, 2, 3, '2026-05-06 09:00:00', '2026-05-06 13:30:00', 5, 2),
(3, 3, 1, '2026-05-07 07:30:00', '2026-05-07 11:30:00', 3, 1),
(4, 4, 5, '2026-05-08 10:00:00', '2026-05-08 14:00:00', 4, 4),
(5, 6, 7, '2026-05-09 08:45:00', '2026-05-09 12:45:00', 2, 1);
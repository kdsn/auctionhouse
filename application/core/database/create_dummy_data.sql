INSERT INTO c2F19B1225.USER (`id`,`username`,`password`,`permissions`,`inactive`,`created_at`,`updated_at`) VALUES (1,'admin','$2y$10$aBCMAApR/bhlpTn/kvHgyujyzWF2LOpU/he6/r07yiccOFI76wr3S','user',0,'2017-03-07 15:42:20','2017-03-07 15:42:20');
INSERT INTO c2F19B1225.USER (`id`,`username`,`password`,`permissions`,`inactive`,`created_at`,`updated_at`) VALUES (2,'staff','$2y$10$aBCMAApR/bhlpTn/kvHgyujyzWF2LOpU/he6/r07yiccOFI76wr3S','user',0,'2017-03-07 20:39:35','2017-03-07 20:39:35');

INSERT INTO c2F19B1225.AUCTION(title,description,start_price,owner_user_id)
VALUES("Auktion 1", "Dette er en beskrivelse af auktionen", 2400, 1),
      ("Auktion 2", "Dette er en beskrivelse af auktionen", 11000, 1),
      ("Auktion 3", "Dette er en beskrivelse af auktionen", 124.4, 1),
      ("Auktion 4", "Dette er en beskrivelse af auktionen", 8.0, 1);
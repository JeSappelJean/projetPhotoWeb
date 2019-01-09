CREATE TABLE UTILISATEURS (
   login TEXT NOT NULL PRIMARY KEY,
	 mdp TEXT NOT NULL
);

CREATE TABLE TEMPLATE (
   idCreateur INT NOT NULL REFERENCES UTILISATEURS(login),
   num INTEGER NOT NULL,
   theme TEXT NOT NULL,
   nbpages INTEGER NOT NULL,
   public BOOLEAN NOT NULL,
   concours BOOLEAN NOT NULL,
   PRIMARY KEY (idCreateur, num)
);
/*img_blob BLOB NOT NULL PRIMARY KEY*/

CREATE TABLE APPARTIENT (
   login INT NOT NULL REFERENCES UTILISATEURS(login),
   id_image INT NOT NULL REFERENCES IMAGES(id_image),
	PRIMARY KEY (login, id_image)
);

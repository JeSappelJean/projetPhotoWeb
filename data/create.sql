CREATE TABLE UTILISATEURS (
   login TEXT NOT NULL PRIMARY KEY,
	 mdp TEXT NOT NULL
);

CREATE TABLE TEMPLATE (
   num INTEGER NOT NULL PRIMARY KEY,
   theme TEXT NOT NULL,
	 nbpages INTEGER NOT NULL,
   public BOOLEAN NOT NULL,
   concours BOOLEAN NOT NULL
);
/*img_blob BLOB NOT NULL PRIMARY KEY*/

CREATE TABLE APPARTIENT (
   login INT NOT NULL REFERENCES UTILISATEURS(login),
   id_image INT NOT NULL REFERENCES IMAGES(id_image),
	 PRIMARY KEY (login, id_image)
);

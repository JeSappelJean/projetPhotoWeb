--Tables Utilisateur
--Attribut :
--            login : login lié à l'utilisateur
--            mdp : mot de passe lié à l'utilisateur
CREATE TABLE UTILISATEURS (
   login TEXT NOT NULL PRIMARY KEY,
	 mdp TEXT NOT NULL
);

--Table Template
--Attribut :
--            num : numéro unique du template
--            login : login de l'utilisateur qui a créé le templates
--            theme : theme sélectionné lors de la création du templates
--            nbpages : nombre de pages du templates
--            public : permet de savoir si le template est partagé à la communauté ou none
--            concours : permet de savoir si le template participe au concours du mois
CREATE TABLE TEMPLATE (
   num INTEGER NOT NULL,
   login TEXT,
   theme TEXT NOT NULL,
	 nbpages INTEGER NOT NULL,
   public BOOLEAN NOT NULL,
   concours BOOLEAN NOT NULL,
   PRIMARY KEY (login,num),
   FOREIGN KEY (login) REFERENCES UTILISATEURS(login)
);

--Table LikeTemp
--Attribut :
--            login : login lié à l'utilisateur
--            num : numéro unique du template
CREATE TABLE LIKETEMP (
  login TEXT NOT NULL ,
  num INT INTEGER NOT NULL ,
  PRIMARY KEY (login,num),
  FOREIGN KEY (login) REFERENCES UTILISATEURS(login),
  FOREIGN KEY (num) REFERENCES TEMPLATE(num)
);

--Table Livre
--Attribut :
--            num : numéro unique lié au livre
--            login : login de l'utilisateur qui a créé le livre
--            template : numéro unique du template lié au livre
CREATE TABLE LIVRE (
  num INTEGER NOT NULL,
  login TEXT,
  template INT INTEGER NOT NULL,
  PRIMARY KEY (login,num),
  FOREIGN KEY (login) REFERENCES UTILISATEURS(login),
  FOREIGN KEY (num) REFERENCES TEMPLATE(num)
);

--1
Insert into membre (nom, pseudo, mdp, email) values ('HUSAIEN', 'Alex', 123123, 'alex@it-students.com')

--2 
INSERT INTO `categorie`(`nom`) VALUES ('Entrée'), ('Plat principal'), ('Dessert')

--3
INSERT INTO `recette`(`auteur`, `description`, `photo`, `titre`, `membre_id`) VALUES ('Nicolas','La tartiflette savoyarde est un gratin de pommes de terre avec du Reblochon fondu dessus','/img/tartiflette.jpg','Tartiflette','1'), ('Nicolas','Un velouté de carotte au cumin','/img/veloute-de-carotte-au-cumin.jpg','Velouté de carottes au
cumin','1')

--4

INSERT INTO `ingredient`(`nom`, `quantitie`, `unit`, `recette_id`) VALUES ('Pommes de terre','750','g','1'),
('Reblochon','1','u','1'),('Lardons','200','g','1'),('Crème fraîche épaisse','3','cs','1'),
('Oignonse','2','u','1'),('Beurre','20','g','1'),('sel','1','cc','1'),
('Poivre','1','p','1'),('Carottes','800','g','2'),('Oignon','1','u','2'),
('Bouillon de volaille','1','l','2'),('Cumin','1','cs','2'),
('Crème fraîche épaisse','2','cs','2'),('Huile d’olive','2','cs','2'),
('Sel','1','cc','2'),('Poivre','1','p','2');


INSERT INTO `categorie_recette`(`categorie_id`, `recette_id`) VALUES ('2','1'),('1','2');


INSERT INTO `commentaire`(`auteur`, `contenu`,`note`, `recette_id`) VALUES ('Nicolas','this is a good recipie !','5','1'), ('User','i do not like cumin ','2','2');



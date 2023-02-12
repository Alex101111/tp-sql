--1
SELECT count(*) FROM membre;

--2 
SELECT auteur, titre FROM recette WHERE recette.membre_id = 1;

--3

SELECT nom, quantitie, unit FROM ingredient WHERE ingredient.recette_id = 1;

--4

SELECT recette.id, titre FROM recette 
INNER JOIN categorie_recette on recette.id = categorie_recette.recette_id
INNER JOIN categorie on categorie_recette.categorie_id = categorie.id
WHERE categorie.nom = 'Plat principal' 

--5

SELECT recette.auteur, note, contenu FROM recette 
INNER JOIN commentaire on recette.id = commentaire.recette_id
WHERE recette.titre = 'Velouté de carottes au
cumin'

--6
-- moyenne pour la Tartiflette
SELECT AVG(commentaire.note) FROM recette 
INNER JOIN commentaire on recette.id = commentaire.recette_id
WHERE recette.titre = 'Tartiflette'

--moyenne pour la Velouté de carottes au cumin 

SELECT AVG(commentaire.note) FROM recette 
INNER JOIN commentaire on recette.id = commentaire.recette_id
WHERE recette.titre = 'Velouté de carottes au cumin'


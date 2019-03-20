--Exercice: creer une base de données magasin
CREATE DATABASE magasin;

--CREER une table produit qui contient les colonnes suivantes:
CREATE TABLE voitures (id_car INT (3) PRIMARY KEY AUTO_INCREMENT NOT NULL, marque VARCHAR(50), modele VARCHAR(60), couleur VARCHAR(30), prix FLOAT, date_vente DATE);
--id => INT PRIMARY KEY AUTO INCREMENT

-- nom_produit -> débrouillez-vous
type => VARCHAR
-- catégorie_produit -> débrouillez-vous
type => VARCHAR
-- reference_produit -> débrouillez-vous
type => VARCHAR
-- prix_produit -> débrouillez-vous
type => INT / FLOAT
-- stock_produit -> débrouillez-vous
type => INT
-- date_ajout -> débrouillez-vous
type => DATE --a-m-j--
     => DATETIME -- a-m-j h-m-s
     => TIMESTAMP -- les secondes ecoulées depuis le 01-01-1970 ( 01 01 1970 est historiquement la date historique du net)
     => TIME
     => YEAR --années qui s'affichent
-- Insérer au moins 20 produits
INSERT INTO voitures (marque, modele, couleur, prix, date_vente) VALUES ('Lamborghini', 'Countach', 'blanc', '330000', '2018-02-28');
-- Afficher tous les produits classé du plus récent au plus ancien
SELECT*FROM voitures ORDER BY date_vente DESC;
-- Afficher les 3 premiers produits 
SELECT*FROM voitures LIMIT 3;
-- AFFICHER les 2 derniers produits
SELECT*FROM voitures LIMIT 4,2;
-- Afficher les 10 premiers produits
-- Afficher les 10 derniers produits
-- Ajouter une colonne livraison
ALTER TABLE voitures ADD date_livraison DATE;
-- Ajouter une colonne date_vente
-- Afficher les produits entre 2 date de vente
SELECT*FROM voitures WHERE date_vente BETWEEN '2019-02-20' AND '2019-03-30';

-- Afficher les 10 derniers produits
-- Afficher les 10 produits du milieu
-- Ajouter une date de livraison aux produits
UPDATE voitures  SET date_livraison = '2019-09-01' WHERE id_car ='1';
-- Afficher les produits commencent par une lettre spécifique
SELECT*FROM voitures WHERE marque LIKE 'l%';





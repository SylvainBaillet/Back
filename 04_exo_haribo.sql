--6-- Lister les tables de la BDD *haribo*
SHOW TABLES;

--7-- voir les paramètres de la table *bonbon*
DESCRIBE bonbons;

--8-- Sélectionner tous les champs de tous les enregistrements de la table *stagiaire*
SELECT * FROM stagiaires;

--9-- Rajouter un nouveau stagiaire *Patriiiick* en forçant la numérotation de l'id
INSERT INTO stagiaires (id_stagiaire, prenom, yeux, genre) VALUES ('8', 'Patrick', 'vert', 'h');

--10-- Rajouter un nouveau stagiaire *Mila* SANS forcer la numérotation de l'id
INSERT INTO stagiaires (prenom, yeux, genre) VALUES ('Mila', 'bleu', 'f');

--11-- Changer le prénom du stagiaire qui a l'id 8 de *Patrick* à *Patriiiick*
UPDATE stagiaires SET prenom ='Patriiiiick' WHERE id_stagiaire = '8';

--12-- Rajouter dans la table manger que Patrick a mangé 5 Tagada purpule le 15 septembre
INSERT INTO manger (id_bonbon, id_stagiaire, date_manger,quantite) VALUES (2,10, '2018-09-15, 5');

--13-- Sélectionner tous les noms des bonbons
SELECT nom FROM bonbons;
 
--14-- Sélectionner tous les noms des bonbons en enlevant les doublons
SELECT DISTINCT nom FROM bonbons;

--15-- Récupérer les couleurs des yeux des stagiaires (Sélectionner plusieurs champs dans une table)
SELECT yeux, prenom FROM stagiaires;

--16-- Dédoublonner un résultat sur plusieurs champs
SELECT DISTINCT yeux FROM stagiaires;

--17-- Sélectionner le stagiaire qui a l'id 5
SELECT prenom FROM stagiaires WHERE id_stagiaire = '5';

--18-- Sélectionner tous les stagiaires qui ont les yeux marrons
SELECT prenom, yeux FROM stagiaires WHERE yeux ='marron';

--19-- Sélectionner tous les stagiaires dont l'id est plus grand que 9
SELECT prenom, id_stagiaire FROM stagiaires WHERE id_stagiaire >= '9';

--20-- Sélectionner tous les stagiaires SAUF celui dont l'id est 13 (soyons supersticieux !) :!\ iil y a 2 façons de faire
SELECT prenom FROM stagiaires WHERE id_stagiaire <> '13';

--21-- Sélectionner tous les stagiaires qui ont un id inférieur ou égal à 10
SELECT prenom FROM stagiaires WHERE id_stagiaire <= '10';

--22-- Sélectionner tous les stagiaires dont l'id est compris entre 7 et 11
SELECT prenom FROM stagiaires WHERE id_stagiaire BETWEEN '7' AND '11';

--23-- Sélectionner les stagiaires dont le prénom commence par un *S*
SELECT prenom FROM stagiaires WHERE prenom LIKE 'S%';

--24-- Trier les stagiaires femmes par id décroissant
SELECT prenom FROM stagiaires WHERE genre = 'f' ORDER BY id_stagiaire  DESC;

--25-- Trier les stagiaires hommes par prénom dans l'ordre alphabétique
SELECT prenom FROM stagiaires ORDER BY prenom ASC;-- ASC n'etait pas forcement necessaire, quand il y'a ORDER BY le tri pas ordre alphabetique se fait automatiquement

--26-- Trier les stagiaires en affichant les femmes en premier et en classant les couleurs des yeux dans l'ordre alphabétique
SELECT prenom FROM stagiaires ORDER BY genre DESC, yeux;

--27-- Limiter l'affichage d'une requête de sélection de tous les stagiaires aux 3 premiers résultats
SELECT prenom FROM stagiaires LIMIT 3;

--28-- Limiter l'affichage d'une requête de sélection de tous les stagiaires à partir du 3ème résultat et des 5 suivants
SELECT prenom FROM stagiaires LIMIT 2,5;

--29-- Afficher les 4 premiers stagiaires qui ont les yeux marron
SELECT prenom, yeux FROM stagiaires WHERE yeux = 'marron' LIMIT 4;

--30-- Pareil mais en triant les prénoms dans l'ordre alphabétique
SELECT prenom, yeux FROM stagiaires WHERE yeux = 'marron' ORDER BY prenom LIMIT 4;

--31-- Compter le nombre de stagiaires
SELECT COUNT(*) FROM stagiaires; 

--32-- Compter le nombre de stagiaires hommes mais en changeant le nom de la colonne de résultat par *nb_stagiaires_H*
SELECT COUNT(*) AS 'nb_stagiaires_H' FROM stagiaires WHERE genre = 'h' ; 

--33-- Compter le nombre de couleurs d'yeux différentes
SELECT COUNT(DISTINCT yeux) FROM stagiaires;

--34-- Afficher le prénom et les yeux du stagiaire qui a l'id le plus petit
SELECT MIN(id_stagiaire) FROM stagiaires; 

--36-- Afficher le prénom et les yeux du stagiaire qui a l'id le plus grand /!\ c'est une requête imbriquée qu'il faut faire (requête sur le résultat d'une autre requête)


--37-- Afficher les stagiaires qui ont les yeux bleu et vert
SELECT prenom FROM stagiaires WHERE yeux IN ( 'bleu','vert' );

--38-- A l'inverse maintenant, afficher les stagiaires qui n'ont pas les yeux bleu ni vert

--39-- récupérer tous les stagiaires qui ont mangé des bonbons, avec le détail de leurs consommations

--40-- récupérer que les stagiaires qui ont mangé des bonbons, avec le détail de leurs consommations

--41-- prénom du stagiaire, le nom du bonbon, la date de consommation pour tous les stagiaires qui ont mangé au moins une fois

--42-- Afficher les quantités consommées par les stagiaires (uniquement ceux qui ont mangé !)

--43-- Calculer combien de bonbons ont été mangés au total par chaque stagiaire et afficher le nombre de fois où ils ont mangé

--44-- Afficher combien de bonbons ont été consommés au total

--45-- Afficher le total de *Tagada* consommées

--46-- Afficher les prénoms des stagiaires qui n'ont rien mangé

--47-- Afficher les saveurs des bonbons (sans doublons)

--48-- Afficher le prénom du stagiaire qui a mangé le plus de bonbons

--49-- Aller chercher 1 référence dans 2 tables distinctes

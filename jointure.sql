-- Jointure interne ou INNER JOIN sert a lier plusieurs tables entre elles.
-- Cette commande retourne les enregistrements lorsqu'il y'a au moins une ligne dans chaque colonne qui correspondent a la condition
SELECT * FROM nom_de_la_table INNER JOIN nom_de_la_table_2 ON condition;
-- ou
SELECT * FROM nom_de_la_table CROSS JOIN nom_de_la_table_2 WHERE condition;

--CROSS JOIN sert a croiser chaque lignes d'un tableau A avec les lignes d'un tableau B. Retourne la produit(*) de ces deux tableaux. En general la commande CROSS JOIN est combinée avec la commande WHERE pour filtrer les resultats qui respectent certaines conditions.
SELECT * FROM nom_table_1 CROSS JOIN nom_table_2;
--Alternative à la commande CROSS JOIN
SELECT * FROM nom_table_1,nom_table_2;

/*
LEFT JOIN permet de lister tous les enregistrements de la table gauche meme si il n'y a pas de correspondances dans la deuxieme table.
*/
SELECT * FROM nom_table_1 LEFT JOIN nom_table_2 ON condition;
--ou
SELECT * FROM nom_table_1 LEFT OUTER JOIN nom_table_2 ON condition;

/*
RIGHT JOIN permet de lister tous les enregistrements de la table droite meme si il n'y a pas de correspondances dans la deuxieme table.
*/



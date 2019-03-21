-- lister tous les services (sans doublon) :
SELECT DISTINCT service FROM employes;

-- Lister tous les salariés avec un salaire entre 2000-3500 :
SELECT prenom, nom FROM employes WHERE salaire BETWEEN 2000 AND 3500;

-- Lister tous les salariée  avec un nom qui contient par la lettre "a" :
SELECT prenom, nom FROM employes WHERE nom LIKE '%a%';

-- lister toutes les salariées :
SELECT prenom, nom FROM employes WHERE sexe = 'f';

-- Lister tous les salariés entrer dans l'entreprise avant le 01 janvier 2005 :
SELECT prenom, nom , date_embauche FROM employes WHERE date_embauche < '2005-01-01';

-- AFFIcher toutes les salariées embauchée avant 2004-01-01 :
SELECT prenom, nom , date_embauche FROM employes WHERE date_embauche < '2004-01-01';

-- Supprimer tous les salariés en CDI :
DELETE id_employes FROM employes WHERE status = 'cdi';

-- Afficher salariés pour chaque service(pas de doublon):
SELECT DISTINCT prenom, nom, service FROM employes ORDER BY service;


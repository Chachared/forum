**** Petit bilan à presque minuit ***

>> FIXTURES:
CONNEXION USER : user / user123@
CONNEXION ADMIN : admin / admin123@

- J'ai fait les fixtures sur toutes les entités
- Les relations en BDD me semblent correctes (et reprises sur les fixtures)
- J'ai des CRUDS partout
- Accessible uniquement au rôle admin -> les CRUD des catégories (et bonus, dans la nav le bouton disparait si on est connecté en tant que user)


Les ratages (ou pas réussi à aménager le temps):
- l'accès par rôle est incomplet : je n'ai pas encore pu me pencher sur le CRUD des articles postés par un utilisateur, ni sur l'ajout de commentaire
- mes CRUD ne sont pas liés les uns au autres (ajouter un commentaire sur un article, ajouter un article dans une catégorie)

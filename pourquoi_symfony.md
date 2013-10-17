## Pourquoi un framework ?
* Pure PHP === Projet Horriblement Programmé pour mon niveau en php
* solution contre de nombreuse "faille de sécurité" près à être utilisée
* technique avancé comme le caching déjà géré
* création de routes (avec get/post/put) + rewritting php intégré
* et bien d'autre outils concernant le web
* Suite de test unitaire + intégration facile à créer/lancer/maintenir

## Quel framework ?
En regardant les offres d'emplois : beaucoup beaucoup de
demande pour Symfony et Zend.
Symfony:
  - Mis à jour récemment 6 avr 2013 License MIT
  - (très) Forte communauté
  - utilitaires en ligne de commande (très pratique)
  - CONTRE : Les utilisateurs se plaignent du coté "magique"
  - CONTRE : Possibilité d'écrire la conf : en pure PHP, en Pure YAML, en PHP
    avec anotation, en XML, ce qui signifie : Inconsistance dans sont propre
    code (si on est pas strict), Inconsistance avec les différent bundle
  - ORM intégré

Zend:
  - Mis à jour récemment 15 mai 2013
  - Forte communauté
  - utilitaires en ligne de commande (très pratique)
  - POUR : pas de "magie", le développeur écris le code qui sera exécuté.
  - note supplémentaire : Zend et la société qui édite PHP, ça peux être gage de
    bonne chose. Cependant quand on voit tous les défaut de php (merci google)
  - Zend possede une grosse suite : Zend Server, Zend Server Community Edition,
    Zend Platform, Zend Studio (comemrcial)  -> http://en.wikipedia.org/wiki/Zend_Technologies

Avis des utilisateurs :
http://www.reddit.com/r/PHP/comments/1dcqst/zend2_vs_symfony2/
Le haut du post semble tourner en faveur de Zend.

## Pourquoi pas Zend ?
De ce que j'ai compris, Zend est packagé sans modules,
on reste assez libre de l'architecture (même si MVC conseillé).
Le fait d'avoir très peux de module initiallement est une bonne chose : ça laisse le développeur
maître du code, et ne ralentit pas l'execution des pages inutilement.

Zend semble demander beaucoup de conf initiale pour faire tourner une démo.
Zend propose énormément d'outils en plus du zend framework, donc demande un
apprentissage.

Timeline sérré, pas le temps d'apprendre et maîtriser en profondeur un
framework, je choisis symfony même si il y a beaucoup de "magie".

## Ok pour Symfony, mais quel ORM ? Propel VS Doctrine ?
Doctrine : par défaut. Activement développé pour symfony 2. Propel semble être
mis de coté.
Sans réfléchir plus loin vu mon petit projet, je garde doctrine.

## Pourquoi Symfony VS pure PHP
* Structure donnée//forcée toujours pratique pour faire les choses bien.
* Si une personne reprend le projet, elle doit apprendre comment fonctionne
  Symfony (ou sais déjà) et ne dois pas apprendre un framework custom : Enorme
  gain de temps.
* Communauté = Bundle = inutile de réinventer la roue : on récupère le code
  approuvé/éprouvé/maintenu
* Drupal 8 va intégrer Symfony dans le noyau. J'ai bien aimé Drupal (même si on
  ne code pas, on clique) alors si ils choisissent SF2 c'est qu'ils ont de
  bonnes raisons. (mais c'est en pour parler depuis début 2012, et Drupal est
  toujours en V7.23) .... ?

##Pourquoi php ?
Parce que pas le choix. Quel monde de brute.

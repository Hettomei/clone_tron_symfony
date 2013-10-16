## Projet de Timothée :

Mini jeux, 2 joueurs, tours par tours d'une sorte de "tron" sur une grille,
5 coups seront joués à l'aveugle à chaque tours.

Page de creation de compte + login.

## Framework :
Symfony_Standard_Vendors_2.3.6
php : 5.4.7

xdebug activé,

ajout de la ligne dans le php.ini, conseillé par symfony :
xdebug.max_nesting_level = 250

## Base de donnée :
Mysql
login: tim
password: tim


## Lancement du projet :

Ajouter php.exe au path,
Pour vérifier que le projet Symfony peut être lancé :
```shell
$ php ./app/check.php
```

Puis pour démarrer le projet :
```shell
$ php ./app/console server:run
```

ensuite aller sur
http://localhost:8000/app_dev.php/home/

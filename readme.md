# Marche à suivre pour l'installation du projet.

Voici comment installer mon projet localement. 

## WAMP, LAMP ou MAMP
Commencez par télécharger la plate-forme de développement Web selon votre OS.

Pour mon cas c'est windows, télécharger et installer wamp ici http://www.wampserver.com/

## Installer Composer

Puis installer composer https://getcomposer.org/download/

## Installer Laraval

Pour installer laravel il suffit de tapper la commande :

composer global require "laravel/installer"

Pour plus d'informations https://laravel.com/docs/5.2

## Configurer WAMP 

Vérifier que wamp supporte toutes ces extensions

* PHP >= 5.5.9
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension

Ouvrir le fichier php.ini et ajoutez la ligne (juste après la ligne ;max_input_nesting_level = 64):

xdebug.max_nesting_level = 1000

Lancer wamp dès maintenant

## Cloner le repository

Ouvrir git bash et allez dans c:/wamp/www.

Cloner le repository avec la commande :

git clone https://github.com/younTheory/premiersecours.git


## Modifier le fichier .env

Ouvrir le fichier.env avec un éditeur de text dans le dossier premiersecours. Vérifiez que DB_USERNAME et DB_PASSWORD correspond à votre compte admin MySQL sinon changez les. Par défaut Wamp a un compte DB_USERNAME=root et un mot de passe vide.


## Vérifier les updates composer

Avec un terminal aller dans le dossier du c:/wamp/www/premiersecours et tapper la commande :
composer update


## Ajouter les données dans PHPMYADMIN
Puis aller dans phpmyadmin et créez une base de données premiersecours avec la commande :

CREATE DATABASE premiersecours;

Puis importer ce fichier sql 


## Accéder au site

Ouvrez votre navigateur et aller sur http://localhost:8080/premiersecour/public ou http://localhost/premiersecour/public selon le navigateur. Vous pouvez maintenant tester le Serious Game. 


## Connexion avec un compte administrateur :
Vous pouvez vous connecter avec ce compte administateur

Email: yannick.widmer92@gmail.com 

Mot de passe: testtest

# ENJOY

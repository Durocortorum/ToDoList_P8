
ToDoList - Projet 8 - PHP / Symfony

========

- lien du Github : https://github.com/Durocortorum/ToDoList_P8

========

## Sommaire

1. [Prérequis](#Prérequis)
2. [Installation](#Installation)
3. [Compte](#compte)
4. [Tests](#Tests)

## Prérequis

PHP (>= 7.1)

## Installation

#### Cloner le projet et installer les dépendances

- ```git clone https://github.com/Durocortorum/ToDoList_P8```
- ```composer install```


#### Configuration du fichier .env

- ``` APP_ENV=dev # mettre "prod" pour la mise ne production``` 
- ``` APP_SECRET=92fcc46d55ffda903d0f1f67494bd14b # a modifier```
- ``` DATABASE_URL="mysql://root:@localhost:3306/todolist?serverVersion=5.7"" # a configurer```

#### Créer la base de données et charger les fixtures

- ```php bin/console doctrine:database:create```
- ```php bin/console doctrine:schema:create```
- ```php bin/console doctrine:fixtures:load```

### Démarer d'application

- ```symfony serve```

## Compte 

#### identifiants / mot de passe

- ```user``` / ```user``` (utilisateur)
- ```admin``` / ```admin``` (administrateur)

## Tests

#### Installation - Créer la base de données et charger les fixtures

- ```php bin/console doctrine:database:create --env=test```
- ```php bin/console doctrine:schema:create --env=test```
- ```php bin/console doctrine:fixtures:load --env=test```

#### Lancer les tests

- ```vendor\bin\phpunit```



[![Codacy Badge](https://api.codacy.com/project/badge/Grade/b6bc9886dffa4a878cb4d4444826ad79)](https://app.codacy.com/gh/Durocortorum/ToDoList_P8?utm_source=github.com&utm_medium=referral&utm_content=Durocortorum/ToDoList_P8&utm_campaign=Badge_Grade_Settings)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/f123315ddb804fb7bcef3e386f62a0b3)](https://www.codacy.com/gh/Durocortorum/ToDoList_P8/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Durocortorum/ToDoList_P8&amp;utm_campaign=Badge_Grade)

=======

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
- ```php bin/console doctrine:migrations:migrate```
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
- ```php bin/console doctrine:migrations:migrate --env=test```
- ```php bin/console doctrine:fixtures:load --env=test```

#### Lancer les tests

- ```vendor\bin\phpunit```


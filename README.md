# Project 
Formation Symfony SSM

# Projet de démonstration pour la formation Symfony 5 et 6 avec Docker

Ce dépôt contient un projet de démonstration conçu pour aider à comprendre les concepts de base de Symfony 5 et 6, ainsi que l'utilisation de Docker pour le développement et le déploiement.

## Prérequis

Assurez-vous d'avoir installé les outils suivants avant de commencer :
- Docker
- Docker Compose
- PHP
- Composer

## Installation

1. Clonez ce dépôt : `git clone https://github.com/mKarimiSofrecom/formation_ssm.git`
2. Accédez au répertoire du projet : `cd formation_ssm`
3. Copiez le fichier `.env.example` en `.env` et configurez les variables d'environnement si nécessaire.
4. Accédez au répertoire du projet : `cd formation_ssm/docker`
5. Lancez les conteneurs Docker : `docker-compose up -d`
6. Installez les dépendances PHP avec Composer : `docker-compose exec php composer install`
7. Appliquez les migrations de la base de données si nécessaire : `docker-compose exec php php bin/console doctrine:migrations:migrate`

## Utilisation 
            
- Accédez à l'application dans votre navigateur en visitant URL : `http://localhost:8082`
- PhpMyAdmin : http://localhost:8081    user = root / pass = root


## Ressources additionnelles

Pour en savoir plus sur Symfony, consultez la [documentation officielle de Symfony](https://symfony.com/doc).

## Auteurs

Ce projet est maintenu par [KArimi mohammed](https://github.com/mkarimiSofrecom).

## Licence

Ce projet est sous licence MIT 

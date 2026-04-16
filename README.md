# TOUCHE PAS AU KLAXON

Application web développée en PHP permettant la gestion de trajets entre différentes agences.

---

##  Fonctionnalités

###  Utilisateur non connecté

- Consulter les trajets disponibles
- Accéder à la page de connexion

### Utilisateur connecté

- Créer un trajet
- Modifier ses trajets
- Consulter les trajets disponibles

### Administrateur

- Accès au tableau de bord
- Gestion des trajets
- Gestion des agences
- Gestion des utilisateurs

---

## Technologies utilisées

- PHP (architecture MVC)
- MySQL
- Bootstrap
- PHPUnit (tests unitaires)
- PHPStan (analyse statique)
- DocBlock (commenatires)

---

## Installation

1. Cloner le projet :
git clone 
2. Placer le projet dans le dossier htdocs (XAMPP)
3. Démarrer Apache et MySQL

---

## Basse de dooneés

1. Importer le fichier SQL :
database.sql
2. Configurer la connexion dans :
config/database.php

---

## Lancement

http://localhost/TOUCHE_PAS_AU_KLAXON/

### Problèmes de connexion à la base de données

L’application a été développée sous XAMPP. Selon votre environnement, certains paramètres (notamment le port MySQL) peuvent nécessiter une adaptation.
Si l’application ne se lance pas et affiche une erreur:

#### Vérifications à effectuer :

Vérifier que le serveur MySQL est bien démarré (XAMPP / WAMP)
Vérifier le port MySQL :
    Par défaut : 3306
    XAMPP peut utiliser : 3308
Adapter la configuration dans :
    config/database.php

Exemple :
    $port = '3306'; // ou 330X selon votre configuration

#### Vérifier également :

Le nom de la base de données (touche_pas_au_klaxon)
Les identifiants (root / mot de passe vide par défaut)
Que la base est bien importée (fichier SQL fourni)

---

## Sécurité
Mots de passe sécurisés avec password_hash
Vérification avec password_verify
Protection CSRF
Protection XSS avec htmlspecialchars
Requêtes préparées (PDO)

---

## Tests

Lancer les tests avec :

vendor/bin/phpunit tests

---

## Auteur

Projet réalisé dans le cadre d’une formation en développement web.

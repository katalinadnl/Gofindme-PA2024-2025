# GoFindMe - Protocoles d'authentification - 4IW2

## Introduction

### Description
Ce projet est un projet de challenge réalisé en 3ème année IW à l'ESGI. Nous l'avons réutilisé en 4ème année pour le module des Protocoles d'authentification. Ce projet vise à effectuer un audit de sécurité et à proposer des améliorations au niveau de l'authentification.

Le projet est un CMS qui permet d'installer un site et de le personnaliser soi-même.

### Pré-requis et Installation

1. **Installation des dépendances**
    - Exécutez `composer install` dans le dossier racine du projet.
    - Exécutez `composer install` dans le dossier `www`.

2. **Lancer le projet avec Docker**
    - Exécutez `docker-compose up -d` pour démarrer les conteneurs Docker.

3. **Accéder au projet**
    - Rendez-vous sur [http://localhost](http://localhost) pour accéder à l'interface du projet.
    - Assurez-vous d'utiliser un mode de navigation privée avec HTTP.

### Documentation
Les documents relatifs au projet sont disponibles dans le dossier `doc-PA` :

- **Rapport de l'audit** : `Audit.pdf`
- **Améliorations du code-source** : `Ameliorations-du-code-source.pdf`
- **Points bonus** : `Points bonus - Mise en place des tests.pdf`

## Points Bonus

### Tests de charge avec Vegeta
Nous avons utilisé Vegeta pour effectuer des tests de charge. Un script d'automatisation a été créé pour faciliter ces tests. Voici comment l'utiliser :

1. **Lancer le script**
    - Exécutez `./make-vegeta-tests.sh` et suivez les instructions pour fournir l'URL à tester.

2. **Résultats des tests**
    - Les résultats seront générés dans le dossier `tests-vegeta` :
        - `plot-AAAAMMJJ.html` : Visualisation des résultats.
        - `report-AAAAMMJJ.txt` : Rapport textuel des performances.
        - `results-AAAAMMJJ.bin` : Fichier brut des résultats.
        - `target-AAAAMMJJ.txt` : URL cible des tests.

### Tests de sécurité

#### SQLMap
Nous avons utilisé SQLMap pour détecter les vulnérabilités SQL. Voici les étapes :

1. **Télécharger SQLMap**
   ```bash
   docker pull googlesky/sqlmap
   ```

2. **Exécuter SQLMap**
    - Pour une URL de connexion :
      ```bash
      docker run --rm -it googlesky/sqlmap -u "http://host.docker.internal:80/login"
      ```

3. **Options avancées**
    - Analyse approfondie :
      ```bash
      docker run --rm -it googlesky/sqlmap -u "http://host.docker.internal:80/login" --level=5
      ```

Un exemple de résultat est présenté dans le dossier `sqlmap`.

#### OWASP ZAP
Nous avons intégré OWASP ZAP dans les services Docker pour effectuer des tests de sécurité Web.

1. **Accéder à ZAP**
    - Rendez-vous sur [http://localhost:8081/zap/](http://localhost:8081/zap/).

2. **Automated Scan**
    - Choisissez "Automated Scan" dans l'interface.
    - Ajoutez l'URL à tester (par exemple, `http://web/login` au lieu de `localhost`, car nous l'avons configuré comme tel).
    - Cliquez sur "Attack" et attendez que le scan se termine.

## Conclusion
Ce projet offre une plateforme pour l'audit et l'amélioration de l'authentification. Les tests automatisés et les outils de sécurité intégrés permettent une analyse complète et des améliorations tangibles en matière de sécurité.

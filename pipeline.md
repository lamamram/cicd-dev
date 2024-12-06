# Intégration Continue avec Gitlab

## philosophie : agilité & DevOps

### agilité

> remise en question du modèle de développelement dit en cascade

#### méthode agile: organisation du travail contenant
  - cycle de développement itératif (montée en version/qualité)
  -                        incrémental (découpe fonctionnelle)
  - dont les itérations/incréments sont **COURTS ET FIXES**
  - une collaboration quotidienne dans l'équipe et le **CLIENT**
  => cycle court/fixe  + collaboration client => **ADAPTATIVITE**
  

* intérêts:
  - meilleure estimation de l'avancement
  -                      de la complétion du projet
  => **PRESERVATION DE LA QUALITE/VALEUR**

* valeur:
  - ROI
  - avantage concurentiel
  - satisfaction client
  - bien-être au travail

* Exemple: **SCRUM**


### DevOps

> extension de l'agilité aux opérations (admins)

> « DevOps est avant tout un mouvement culturel 
> fondé sur des interactions humaines et techniques 
> déstinées à améliorer les relations et les résultats d'une organisation. »
  
#### mots clés du DevOps: CALMS

  * **C**ulture : d'entreprise
  * **A**utomatisation : CICD
  * **L**ean => Optimisation
  * **M**esure: KPI
  * **S**olidarité: culture de la collaboration

#### définition organique

> DevOps transforme une organisation en un pipeline automatisé
> de livraison de valeur actionné par les parties prenantes !!!

---

## Structure de GITLAB

### côté gestion de dépôt

* groupe de projets **myusine** avec 2 projets **dev** et **ops**
* 3 membres du groupe **myusine** root (admin) dev_a (chef de proj), dev_b (dev)
* runner lié au groupe **myusine** => `/etc/gitlab-runner/config.toml`

### gitlab-runner

* machine actionnée par un fichier de config au format YAML
  1. lancé un conteneur Docker
  2. place le contenu du dépôt git
  3. exécute un script

---

## méthodologie de travail avec Gitlab SCRUM

### itération classique

1. création d'un **issue** dans le **KANBAN** (board) et le **product backlog** en mode **user story**
2. déplacer l'issue dans le **sprint backlog** pour ajouter l'exécutant, la date, l'estimation
3. déplacer l'issue dans la colonne WIP
4. dans l'**issue** créer une **MERGE REQUEST** qui créé une **branche de fonctionnalité**
   qui centralise le travail sur l'issue et prépare la fusion
5. raptrier la **branche de feature** en local
6. créer des commits et pousser dans Gitlab pour évaluation par le **pipeline automatisé**
7. en fin de travail, **revue de code** dans la **MR** puis fusion (squash ou rebase -i ou non)
8. rapatrier la branche commune en locale et nettoyer la **branche de feature** locale

---

## construction d'un pipeline d'intégration continue

### structure de jobs

```yaml
job-name:
  tags:
    - "runner-tag"
	- ...
  script:
    - echo "exécuter qqch"
```

* en utilisant **exécuteur Docker** du runner:
  => chaque job lance un conteneur éphèmère

### séquencement

* par défaut => les jobs sont exécutés en parallèle (selon le coeurs dispos)
* on fixe l'ordre avec les **stages:**

```yaml
stages:
  - step1
  - step2
  - step3

job-name:
  stage: step2
  ...
```

### image

* `image:` au niveau global (au dessus des jobs) ou au niveau local (dans les jobs)
   consititue l'environnement d'exécution du job
   Ex: projet j'ai besoin d'une image `image: python:3.13-slim-bookworm`

### optimisation du pipeline via le cache

* les jobs sont exécutés indépendant des autres jobs
  => il faut factoriser les installations & configurations 
  => dans un dossier mis en cache dans Gitlab (ici dans un volume Docker)
  => mécanismes: push en génération, pull en téléchargement ou les 2 pull-push

### remontée des rapports via les artefacts

* effets des clés artefacts

  1. `artefacts:paths[]:` remontée des artefacts en téléchargeent + réutilisation dans les jobs suivants
  2. `artefacts:reports:` remontée des artefacts spéciaux dans l'interface GUI

### conditionnalité des jobs

* `rules[]:` contient une liste de règles qui autorisent l'exécution des jobs
  => une règle vraie => le job s'exécute
* une règle contient une ou plusieurs **clauses** (if, changes, exists, when)
  => une règle est  vraie si toutes ses clauses sont vraies

* `workflow:rules[]` permet d'autoriser ou non l'exécution du pipeline selon certaines modalités

### gestion des variables

* `variables:`
  
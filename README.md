# formation git 

## jour 1

### installation git

* linux: `sudo apt-get update && sudo apt-get git -y`
* windows: installer Git Bash (configuration classique)

### initialisation d'un dépôt

* [init](./init.md)

### création de commit

* [commit](./commit.md)

### visualiser l'historique

* [log](./log.md)

### mécanismes internes

1. configuration
   * `git config --local ...`: la conf pour le dépôt local est mise dans **.git/config**
   * `git config --global ...`: la conf pour les dépôts de l'utilisateur est mise dans **~/.gitconfig**

2. désignation des commits
   * identifiant du commit qu'on voit dans le `git log`
   * positionnement relatif à partir du commit courant pointé à la fois dans **le pointeur de branche** lui même pointé par le **pointeur HEAD**
   * `HEAD` est un fichier dans **.git/HEAD** contient le pointeur de brancheur dans **.git/refs/heads/<branch_name>**

### Inversion des actions

[inversions](./inversions.md)

### introspection

* les objets git sont dans .git/objects
* voir un commit: `git cat-file -p xxxxxx`
* un commit contient un lien vers le commit précédent => parent xxxxxx


### les branches

1. cycle des états
   + `git branch <name>`: créer un pointeur de branche à partir du commit courant de la branche courante
   + `git checkout <other_branch>`: basculement de branche
   + `git checkout -b <other_branch>`: création  + basculement

2. gestion des modification WIP
   + comment changer de branche si on a des modifications WIP dans la branche courante
   + `git stash`

3. fusion de branches
   + cas n°1: commit de fusion "naturel": absence de relation parent-enfant entre les branches
   + cas n°2: fast-forward : presence // => activation ou non du FF
     `git config --global merge.ff true | false`


### dépôts distants

[remote](./remote.md)

## JOUR 4

### intégration continue

[CICD](./cicd.md)
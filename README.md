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



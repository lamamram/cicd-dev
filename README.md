# FORMATION USINE LOGICIELLE

## GIT

### structure de git 

1. un commit contient la totalité des fichiers ajoutés dans des **blobs** dans `.git/objects`

2. un commit contient les fichires ajoutés dans l'index + l'état le + récent des tous les autres fichiers déjà commités depuis le début

### commandes d'inversion

1. `git rm`: supprime le ou les fichiers de la copie de travail et ajoute un ordre de suppression du ou des fichiers dans le dépôt

> le ou les fichiers ne sont pas supprimées du dépôt !!!
> en particulier au moins - un commit passé contient le ou les fichiers

2. `git reset`:
   + déplace HEAD
   + supprime les commit entre le nouveau HEAD et l'ancien ORIG_HEAD du log
   + effets sur l'index et la copie variants des options


   + `--hard`: vide l'index et écrase les fichiers commités de la copie depuis le commit en paramètre
   + `--mixed`: par défaut, vide l'index / conserve la copie

3. `git revert`:
   + inverse les diffs entre le commit ciblé et sont commit parent ( + <=> - )
   + si ces nouveaux diffs sont en contradiction avec d'autres diffs venant d'autre commit intermédiaires (entre le commit ciblé et HEAD) => CONFLIT
   + la résolution de ce conflit est séquentiel (commit intermédiaire après commit intermédiare)
   => `git add <paths> && git revert --continue`  


### les branches en local

1. une branche est:
   + un fichier contenant le commit ciblé en paramètre => COMMIT DE BASE

2. changer de branche:
   + `git checkout <branch>`
     - basculement du HEAD sur le nouveau pointeur de branche
     - écrasement de la copie depuis le commit pointé par le nouveau pointeur de branche

3. stash
   + pile qui ramasse les modifications de la copie de travail qq soit la branche / commit
   + `list`: pour voir, 
   + `pop <stash@{index}>` : dépiler (enlever et appliquer), 
   + `apply <stash@{index}>`: appliquer uniquement
   + `apply <stash@{index}>`: supprimer
   + `clear`: vider

4. Fast-Forward
   + avantage: historique simple et linéarisé
   + inconvénient: perd la trace de la cohérence des commits des branches de foncitonnalités
   + forcer les commit de fusion: soit `merge --no-ff` ou `git config --global merge.ff false`


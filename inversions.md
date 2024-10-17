# inversion des actions

```bash

## 1. inverser des modifs courantes dans la copie de travail
## git checkout déplace HEAD et écrase un commit du dépôt dans la copie
git checkout [HEAD] -- <fic>
# explication
# en ne prenant aucun paramètre de type commit => on a HEAD, donc pas de déplacement
# en ajoutant "--" on ne travaille qu'avec un ou certains fichiers


## 2. supprimer un fichier dans git
## 2.1 suppression physique + ajout dans l'index de la "suppression"
git rm <fic>
git rm -r <dossier>
# plus commit pour valider la suppresion dans le dépôt
git commit -m "msg"

# inversion du rm !!!
git checkout HEAD~n -- <fic>
# explication
# en fait le git rm donne un ordre de suppression pour le PROCHAIN COMMIT
# Donc, à partir du PROCHAIN COMMIT, le dépôt ne connaît plus !!!
# MAIS, il reste des commits précédents dans lesquels le fichier existe ici HEAD~n

## 2.2 suppression du dépôt SANS supprimer dans la copie de travail
git [-r] --cached <fic>|<dossier> && git commit -m "msg"
# cas emblématique: "déversionner" un fichier qui aurait dû être ignoré avec le fichier .gitinore

## 3. désindexation (inverse le git add)
git reset -- <fic>
# vider l'INDEX !!!
git reset -- .


## 4. inverser un commit

# 4.1 supprimer un commit de l'historique => git reset
git reset HEAD~n --hard 
# inverser le reset avec le reflog
git reflog
git reset --hard HEAD@{i}

# reset normal => pour retravailler les commits
git reset HEAD~m

## ATTENTION ON NE FAIT PAS DE RESET SUR DES COMMITS DEJA POUSSES SUR UN DEPOT DISTANT, SUR UNE BRANCHE COMMUNE !!!!!

# 4.2 inverser les modifs d'UN COMMIT:  git revert

git revert HEAD~n [--no-edit]
# ATTENTION: revert qu'un UN SEUL COMMIT donc pas (~n-1 ... n-i ... 0)
# ATTENTION: plus vous faites un commit ancien, plus avez de probabilités de créer un conflit de version par ce que les modifs des commits en aval du revert sont assises sur celles qu'on veut dégager.

 x revert 1/x revert 1/1/X == x => cycle

 x --- y ---- z | revert HEAD~1 = y => x --- y --- z --- (z - y) | revert HEAD~1 => y -- z -- (z -y) -- x -y -z => ...ccumule les modifications   

```

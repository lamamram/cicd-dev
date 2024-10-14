# création des commits

```bash
# 1/ faire des modifs (création / modifs de fichiers)
# 2/ ajouter ces modifs dans l'INDEX
git add fic
git add fic fic2 ...

# git interactif (selectionner certaines modifs) 
# mode 4 pour les états Untracked
# mode 2 pour les états Modified
# mode 3 pour inverser les ajouts précédents
# mode 7 pour sortir
git add -i

## TOUT ajouter (Attention à votre copie de travail !!)
git add .


## 3/ valider les modifs de l'INDEX => dans le DEPOT
git commit # => lancer un éditeur par défaut
git commit -m "message"

## CHAINER les commandes
git add . && git commit -m "msg"
```
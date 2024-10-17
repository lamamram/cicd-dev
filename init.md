# initialiser un dépôt

```bash
## CONFIGURATION DE BASE !!!
# init le nom de la branche par défaut
git config --global init.defaultBranch main

# init le nom et email de l'utilisateur 
git config --global user.name bob
git config --global user.email bob@machin.truc

# éditeur par défaut (par ex. windows)
git config --global core.editor notepad.exe


## iitialisaiton du dépôt
git init [<path>]

## dépôt nu (sans copie de travail)
git init --bare
```
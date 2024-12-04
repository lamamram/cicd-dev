# installation python 

## windows

1. installer sur python.org 
  * télécharger
  * install user 
    + décocher "admin" en bas
    + cocher "PATH"
2. fermer/ouvrir VSCODE

### côté terminal
3. ouvrir git bash
4. créer un environnement virtuel: `python -m venv venv`
5. activer le venv: `source ./venv/Scripts/activate`
6. désactivation au cas où: `deactivate`

### côté VsCode
7. ajouter l'extension VsCode python offielle "microsoft"
8. éduter un fichier "*.py"
9. cliquer sur la version de python du footer VsCode à droite
10. soit sélectionner le venv dans les entrées
11. ou sélectionner "entrer le chemin de l'interpréteur" > find browse ... > venv/Scritps/python.exe

## installer les dépendances DANS LE VENV avec pip

1. `pip install -r app/requirements.txt` : deps projet
2. `pip install -r app/requirements-dev.txt` : deps cicd
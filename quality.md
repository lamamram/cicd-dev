# qualité

## formatage: convention & style du code

* exemple python avec black

1. ajout dans app/requirements-dev.txt
2. test en local (dans le venv)
  * `python -m black ./app`
3. ajout du fichier de configuration
  * fichier app/pyproject.py.toml
  * `python -m black --config=./app/pyproject.py.toml ./app`
4. ajout de la procédure dans le hook `./git/hooks/pre-commit`
  * ramasser les modifs issues du formatage avec un `git add`
  * ajout l'option **-q**
  * `chmod u+x .git/hooks/pre-commit` 

## sonarqube: analye SAST avec gitlab


### installation d'un serveur

* `docker run --name sonar -d --restart unless-stopped -p 9000:9000 --memory 2g sonarqube:lts`

### configuration

1. log: `admin / admin`

2. old/new IDS: `admin / roottoor / roottoor`
3. config manually
4. projet: myusine / myusine /main
5. config locally
6. token: grain de sel + `generate`
7. python / Linux

```bash
sonar-scanner \
  -Dsonar.projectKey=myusine \
  -Dsonar.sources=. \
  -Dsonar.host.url=http://gitlab.myusine.fr:9000 \
  -Dsonar.login=sqp_ba8fa0a4cf430dc8f0f815db21c5231cc430ef7f
```

### profile qualité

1. filtrer sur python
2. étendre le profile par défaut en lecture seule, en activant des règles supplémentaires 
3. ou copier // , en activant ou désactivant //
5. associer projet <=> profile
6. ajouter une gate custom
7. "unlock editing"
  + couverture degradée 
  + ajout couverture code sur tout le code
8. associer la gate <=> projet

* [definitions de métroques](https://docs.sonarsource.com/sonarqube-server/9.8/user-guide/metric-definitions/#quality-gates)
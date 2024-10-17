# CICD

## job tests unitaires

### setup python

> dans la VM Debian

```bash
python3 -m venv ~/venv
# activer l'environnement
source ~/venv/bin/activate
pip3 install -r app/requirements.txt
cd app
python3 app.py
```

### setup pytest

1. créer le fichier app/requirements-dev.txt
   * ajouter **pytest** dedans

2. activer l'environnement + `pip3 install -r app/requirements-dev.txt` instaler pytest

3. créer une config pytest: `app/pytest.ini`

```ini
[pytest]
python_files = pytest_*.py
```
4. dans l'environnement: `pytest`

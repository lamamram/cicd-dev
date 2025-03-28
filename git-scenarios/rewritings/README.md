# réécritures d'historiques

> copier le dossier "rewritings" en dehors du dépôt local courant

```bash
git init
git add . && git commit -m "root-commit"
git checkout -b feature
cat <<EOF > script1.txt
function1_1(){
  code1
  return
}

function1_2(){
  code2
  return
}
EOF
git add . && git commit -m "ajout script1.txt"
cat <<EOF > script2.txt
function2_1(){
  code3
  return
}
EOF
cat <<EOF >> script1.txt
function1_3(){
  bad_code
  return
}
EOF
git add . && git commit -m "mauvais msg"

```

---

## commit --amend

* réécrire le message sur le commit courant: 
  + `git commit --amend -m "ajout script2.txt + MAJ sur script1.txt"`

* réécrire le contenu sur le commit courant:

```bash
cat <<EOF >> script1.txt
function1_3(){
  good_code
  return
}
EOF
git add . && git commit --amend --no-edit
```

* les 2: modif + add + `git commit --amend -m "good message"`

---

## rebase

* configuration de la fusion classique ou conflit MAIS la branche de fonctionnalité n'est pas prête !
* on veut savoir comment les nouveaux commits de main vont intéragir avec notre code

### cas sans conflit

```bash
git checkout main
echo "new_file" > new_file.txt
git add . && git commit -m "ajout new_file.txt"

# le rebase se fait sur la branche qui se déplace
git checkout feature
git rebase main

# observer le graph
git graph -3
```

---

### cas avec conflit

---

## git rebase -i

---

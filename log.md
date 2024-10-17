# visualiser l'historique

```bash
## pas performant !!!
# afficher les métadonnées de TOUS les commit de la branche courante
git log
# afficher avec les diffs utiliser surtout git show <hash>
git log -p

## performant !!
git log --oneline -<n> --stat

## préférer un widget graphique la plupart du temps !!!

## on peut utiliser des alias avec
git config --global alias.ll 'log --oneline'

## next
```
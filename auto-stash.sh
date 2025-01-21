#!/bin/bash
## place in the PATH !!!

if [[ "$1" == "-" ]];then
  git switch -
  git stash apply -q stash^{/tmp-stash}
else
  git stash push -u -q -m "tmp-stash";
  git switch $1
fi
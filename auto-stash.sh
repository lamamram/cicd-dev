#!/bin/bash

if [[ "$1" == "-" ]]; then
  git switch - 
  git 
  git stash apply -q stash^{/tmp-stash}
  index=$(git stash list | grep -Po "\K[0-9]+\}.+tmp-stash$" | awk -F '}' '{ print $1  }')
  git stash drop "stash{$index}"
else
  git stash push -u -q -m "tmp-stash-$1";
  git switch $1
fi
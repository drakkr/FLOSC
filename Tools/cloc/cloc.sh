#!/bin/bash

# TODO : xpi files

for f in *.*
do
  echo "Processing $f file..."
  if [ ${f/*./} = 'jar' ]; then 
    cloc --extract-with="unzip >FILE<" --csv --out=temp/$f.csv $f
  else
    cloc --csv --out=temp/$f.csv $f
  fi
done
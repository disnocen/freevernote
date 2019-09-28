#! /bin/bash

file=$(basename $1 .md)
opt="-V colorlinks -V urlcolor=NavyBlue"  
pandoc $opt $1 -o $file.pdf

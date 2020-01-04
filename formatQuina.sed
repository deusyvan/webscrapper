#!/bin/sed -nf
# description: Transformar arquivo htm em arquivo texto
# name:        Deusyvan Silva
# version:     0.01
#
# Trocar <table por quebra de linha
s/<table/\n/g


# Loop :a
# Até o final: $!N
# Trocar: s/
# Linhas em branco: ^$
# Quebra de linha: \n
# Todos: /g
# Encerra loop: ta

#:a;$!N;s/^$/\n/g;ta

#

#/<[^>]*>/d

#
#/^$/d


#!/bin/bash

# Obtengo el numero de lineas que tenemos que recorrer en los tres ficheros.

LINEAS=$(cat "data_511/511_varnames.txt"| wc -l)

echo "{"

for nlinea in $(seq 1 $LINEAS); do 

	echo "$nlinea"

	CURRENT_VAR="$(sed "${nlinea}q;d" data_511/511_varnames.txt)"
	CURRENT_UNIT="$(sed "${nlinea}q;d" data_511/511_units.txt)"
	CURRENT_NOTE="$(sed "${nlinea}q;d" data_511/511_notes.txt)"

	echo "[ \"${CURRENT_VAR}\" , \"${CURRENT_UNIT}\"  , \"${CURRENT_NOTE}\" ]"

done


echo "}"

exit 0

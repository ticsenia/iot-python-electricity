#!/usr/bin/python3

import json
import sys
import os

rutaJSON=""
rutaNotesJSON=""

def die(msg):
	print(" * [ ERROR ] : "+msg)
	print(" * [ USAGE ] :  python-garen.py PATH_TO_JSONVALUES PATH_TO_JSONNOTES -c")
	sys.exit(1)

def do_csv():
	print(" * [ CSV Creation ] ")
	rutaJSON=sys.argv[1]
	print(" * [ CSV ] : Working with "+rutaJSON)
	data_file = open(rutaJSON)
	data = json.load(data_file)


	# Testing with name definitions
	print(" * [ CSV ] : Notes definition")
	rutaNotesJSON=sys.argv[2]
	notes_file = open(rutaNotesJSON)
	notes_data = json.load(notes_file)

	csv_file=open("temporal_csvfile.csv","w")
	csv_file.write("Variable,Medida,Unidad,Descripcion")
	csv_file.write("\n")
	
	for key, value in data.items():
		print("* Key -> " + str(key) + "\n\t* Values -> "+str(value))
		linea = str(key)+","+str(value[0])+","+str(value[1])+","
		try:
			print("\t* Notes -> "+notes_data[key])
			linea= linea +str(notes_data[key]).replace(",","-").replace(";","-")
		except Exception as e:
			print("\t* Notes -> Vacio")
			linea= linea +"None"
		csv_file.write(linea)
		csv_file.write("\n")
	
def do_sanity_checks():
	if len(sys.argv) != 4:
		die(" Incorrect number of parameters")
	
	if not os.path.exists(sys.argv[1]):
		die(" The first argument must be a JSON File")

	if not os.path.exists(sys.argv[2]):
		die(" The second argument must be a JSON File with notes definitions")
	
	

#
# MAIN
#

if __name__ == "__main__":
	do_sanity_checks()
	do_csv()






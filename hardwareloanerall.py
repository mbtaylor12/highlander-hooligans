import sys
import os
import json
import sqlite3
from sqlite3 import Error

helpFile = os.path.join(os.path.dirname(__file__),"help.txt")
db_file = os.path.join(os.path.dirname(__file__),"storage/hardwareinfo.db")

errorArgument = "Arguments did not follow proper structure, please read the man using -m."

paramName = []
paramType = []
paramValue = []

def connect_database():
	""" Create a data base connection specified by db_file
	:param db_file: database file
	:return: Connection object or None
	"""
	try:
		db = sqlite3.connect(db_file)
		print "Database connected successfully!"
		return db
	except Error as e:
		print(e)
		
	return None

def execute_command(db, command):
	""" Launch sql command provided to given database.
	:param db: database
	:param command: SQLite command
	:return: status message
	"""
	try:
		c = db.cursor()
		c.execute(command)
		print "SQLite command complete."
	except Error as e:
		print(e)
	
	
def create_table(db, table_name, param_name, param_type):
	""" Create a sqlite command using table_name, param_name
		and param_type. Using command created to execute sqlite
		command.
	:param db: database connection
	:param table_name: database table name
	:param param_name: table column names
	:param param_type: table column types
	:return: 
	"""
	command = "CREATE TABLE " + table_name + " ("
	for i in range(len(param_name)):
		command = command + param_name[i] + " " + param_type[i]
		if i == (len(param_name)-1):
			command = command + ");"
		else:
			command = command + ", "
			
	execute_command(db, command)

def create_hardware_loaners():
	db = connect_database()
	table_name = "hardwareLoaners"
	param_name = ['assetName', 'assetDesc', 'manuFac', 'modeNum', 'serialNum', 'periphIncluded', 'roomNum', 'ticketStat']
	param_type = ['TEXT', 'TEXT', 'TEXT', 'TEXT', 'TEXT', 'TEXT', 'TEXT', 'INTEGER']
	with db:
		create_table(db, table_name, param_name, param_type)
        


def select_all(db, tableName):
	""" Select all from table
	:param db: database connection
	:param tableName: name of table selected
	:return: json dump
	"""
	c = db.cursor()
	c.execute("SELECT * FROM " + tableName)
	print json.dumps(c.fetchall())
    
def select_w(db, tableName, cass):
	""" Select all from table
	:param db: database connection
	:param tableName: name of table selected
	:return: json dump
	"""
	c = db.cursor()
	c.execute("SELECT * FROM " + tableName + " WHERE class = '" + cass + "'")
	print json.dumps(c.fetchall())

def insert_into_table(db, tableName):
	command = "INSERT INTO " + tableName + " ("
	for i in range(len(paramName)):
		command = command + paramName[i]
		if i == (len(paramName)-1):
			command = command + ")"
		else:
			command = command + ", "
	
	command = command + " VALUES ("
	for i in range(len(paramValue)):
		command = command + "?"
		if i == (len(paramValue)-1):
			command = command + ");"
		else:
			command = command + ", "
			
	#command = "INSERT INTO tableName (paramName[1], paramName[2], ..., paramName[n]) VALUES (?, ?, ?...?)"
	try:
		c = db.cursor()
		c.execute(command, paramValue)
        
		print "SQLite command complete."
	except Error as e:
		print(e)
        
        

def manual():
	File = open(helpFile, 'r', 0)
	for line in File:
		print line

def main():
	"""
	Main function that launches on start.
	Reads arguments to determine the dynamic process.
	"""
	if sys.argv[1] == "-s":
		if sys.argv[3] == "-all":
			db = connect_database()
			with db:
				select_all(db, sys.argv[2])
			db.close()
		elif sys.argv[3] == "-w":
			db = connect_database()
			db.close()
		else:
			print errorArgument
	elif sys.argv[1] == "-i":
		for i in range(3, len(sys.argv)):
			if sys.argv[i] == "-v":
				for j in range(i+1, len(sys.argv)):
					paramValue.append(sys.argv[j])
				break
			else:
				paramName.append(sys.argv[i])
		
		db = connect_database()
		with db:
			insert_into_table(db, sys.argv[2])
		db.close()
	elif sys.argv[1] == "-c":
		create_hardware_loaners()
	elif sys.argv[1] == "-m":
		manual()
	else:
		print errorArgument
	
	
main()
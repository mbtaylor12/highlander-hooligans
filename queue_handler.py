import sys
import os
import json
import sqlite3
from sqlite3 import Error

#helpFile = os.path.join(os.path.dirname(__file__),"help.txt")
db_file = os.path.join(os.path.dirname(__file__),"queue.db")

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
		print i
		command = command + param_name[i] + " " + param_type[i]
		if i == (len(param_name)-1):
			command = command + ");"
		else:
			command = command + ", "
			
	execute_command(db, command)

def create_tables():
	db = connect_database()
	table_wait = "waiting"
	table_expr = "expired"
	table_help = "help"
	param_name = ['cus_num', 'name', 'username', 'ru_id', 'os_platform', 'description']
	param_type = ['INTEGER PRIMARY KEY AUTOINCREMENT', 'TEXT', 'TEXT', 'TEXT', 'TEXT', 'TEXT']
	with db:
		create_table(db, table_wait, param_name, param_type)
		create_table(db, table_expr, param_name, param_type)
		create_table(db, table_help, param_name, param_type)
	db.close()
	
def select_all(db, tableName):
	""" Select all from table
	:param db: database connection
	:param tableName: name of table selected
	:return: json dump
	"""
	c = db.cursor()
	c.execute("SELECT * FROM " + tableName)
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
	try:
		c = db.cursor()
		c.execute(command, paramValue)
        
		print "SQLite command complete."
	except Error as e:
		print(e)
	
def pop_queue(db, startTable, endTable):
	""" Thia method acts as a pop function for a queue.
	pop_queue will take in a database connection, a starting
	taable and a end table. The starting table will contain 
	the row to which it will be popped. The row popped will
	then be moved into the end table. After moving the row,
	the row will then be printed back to the client side.
	
	:param db: database connection
	:param startTable: Table holding row to be popped.
	:param endTable: Where the row from startTable will be moved.
	:return: json dump of the row.
	"""
	c = db.cursor()
	c.execute("SELECT * FROM " + startTable + " ORDER BY cus_num ASC LIMIT 1")
	# Save values before deleting from startTable.
	row = c.fetchall()
	print row[0][0]
	# Move row from startTable to endTable.
	c.execute("INSERT INTO " + endTable + " SELECT * FROM " + startTable + " ORDER BY cus_num ASC LIMIT 1")
	c.execute("DELETE FROM " + startTable + " WHERE cus_num = " + str(row[0][0])) 
	
	print json.dumps(row)

# def manual():
	# File = open(helpFile, 'r', 0)
	# for line in File:
		# print line

def main():
	"""
	Main function that launches on start.
	Reads arguments to determine the dynamic process.
	"""
	if sys.argv[1] == "-s":
		db = connect_database()
		with db:
			select_all(db, sys.argv[2])
		db.close()
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
	elif sys.argv[1] == "-p":
		db = connect_database()
		with db:
			pop_queue(db, sys.argv[2], sys.argv[3])
		db.close()
	# elif sys.argv[1] == "-m":
		# manual()
	else:
		print errorArgument
		
	
if __name__ == "__main__":
	main()
	

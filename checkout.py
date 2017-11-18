import datetime
import sys
import os
import json
import sqlite3
from sqlite3 import Error

db_dir = os.path.join(os.path.dirname(__file__), 'storage/')
db_file = os.path.join(db_dir, 'checkout.db')
backup_dir = os.path.join(db_dir, 'backup/')
errorArgument = "Invalid arguments!"


def connect_database():
    """ Create a data base connection specified by db_file
    :param db_file: database file
    :return: Connection object or None
    """
    try:
        if not os.path.exists(db_dir):
            os.makedirs(db_dir)
        db = sqlite3.connect(db_file)
        print "Database connected successfully!"
        return db
    except Error as e:
        print(e)
    return None


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
    command = "CREATE TABLE IF NOT EXISTS " + table_name + " ("
    for i in range(len(param_name)):
        command = command + param_name[i] + " " + param_type[i]
        if i == (len(param_name) - 1):
            command = command + ");"
        else:
            command = command + ", "
    try:
        c = db.cursor()
        c.execute(command)
        db.commit()
        print "SQLite command complete."
    except Error as e:
        print(e)


def create_tables():
    """ Create required tables for python script.
    :arguments: python queue_handler.py -c
    :return: nothing
    """
    db = connect_database()
    table_checkedout = "out"
    table_past = "past"
    param_name = ['name', 'time', 'reason']
    param_type1 = ['TEXT', 'TEXT', 'TEXT']
    with db:
        create_table(db, table_checkedout, param_name, param_type1)
        create_table(db, table_past, param_name, param_type1)

    
    db.close()


def select_all(db, tableName):
    """ Select all from table
    :arguments: python queue_handler.py -s [TABLE_NAME]
    :param db: database connection
    :param tableName: name of table selected
    :return: json dump
    """
    try:
        c = db.cursor()
        c.execute("SELECT * FROM " + tableName)
        print json.dumps(c.fetchall())
    except Error as e:
        print(e)


def insert_out(db, values):
    """ Insert function to sqlite database for new customers signing in to the
        TAC. Function will insert info from the customer and return a friendly
        message detailing the customer's number, to which it will be called.
    :arguments: python queue_handler.py -i [VALUE1 VALUE2 ... VALUE(n)]
    :param db: database Connection
    :param values: provided information from the customer.
    :return: Message detailing the customers ticket number.
    """
    command = "INSERT INTO out (name, time, reason)"
    command = command + " VALUES ("
    for i in range(len(values)):
        command = command + "?"
        if i == (len(values) - 1):
            command = command + ");"
        else:
            command = command + ", "
    try:
        c = db.cursor()
        c.execute(command, values)
        c.execute("SELECT * FROM out ORDER BY time DESC LIMIT 1")
        db.commit()
        customer = c.fetchall()
        print "Your number is " + str(customer[0][0])
    except Error as e:
        print(e)


def pop_waiting(db):
    """ Pop the waiting queue from the waiting table into the help table.
    :arguments: python queue_handler.py -pw
    :param db: database connection
    :return: Message detailing customer to be helped.
    """
    try:
        c = db.cursor()
        c.execute("SELECT * FROM out ORDER BY time ASC LIMIT 1")
        # Save values before deleting from waiting table.
        customer = c.fetchall()
        # Move customer from waiting table to help table.
        c.execute("INSERT INTO past SELECT * FROM out ORDER BY time ASC LIMIT 1")
        c.execute("DELETE FROM out WHERE time = " + str(customer[0][1]))
        db.commit()
        print "Now helping customer number: " + str(customer[0][0])
    except Error as e:
        print(e)


def refresh_tables(db):
    """ Drops all queue tables and re-creates them.
    :arguments: python queue_handler.py -r
    :param db: database connection.
    :return: possible error, else, nothing.
    """
    try:
        c = db.cursor()
        c.execute("DROP TABLE out")
        c.execute("DROP TABLE past")
        create_tables()
    except Error as e:
        print(e)


def export_helped_table(db):
    """ Creates a backup of the entire helped table into
        an excel spreadsheet (.xlsx) file.
    :arguments: python queue_handler.py -e
    :param db: database connection.
    :return: nothing.
    """
    # Get current date.
    date = datetime.datetime.today().strftime('%Y-%m-%d')
    # Create directory and file.
    if not os.path.exists(backup_dir):
        os.makedirs(backup_dir)
    backup_file = backup_dir + "backup_" + date + ".xlsx"
    # Create workbook and add worksheet.
    workbook = xlsxwriter.Workbook(backup_file)
    worksheet = workbook.add_worksheet()
    # Add bold format to highlight cells.
    bold = workbook.add_format({'bold': True})
    # Create data headers.
    worksheet.write('A1', 'Customer Number', bold)
    worksheet.write('B1', 'Name', bold)
    worksheet.write('C1', 'Username', bold)
    worksheet.write('D1', 'RU_ID', bold)
    worksheet.write('E1', 'OS_Platform', bold)
    worksheet.write('F1', 'Description', bold)
    # Get number of rows in table.
    c = db.cursor()
    c.execute("SELECT * FROM helped")
    customers = c.fetchall()
    # Loop through the data and write it row by row.
    for row in range(0, len(customers)):
        for col in range(0, 6):
            worksheet.write((row + 1), col, customers[row][col])
    workbook.close()


def main():
    """
    Main function that launches on start.
    Reads arguments to determine the dynamic process.
    """
    db = connect_database()
    with db:
        if sys.argv[1] == "-s":
            select_all(db, sys.argv[2])
        elif sys.argv[1] == "-i":
            cus_data = []
            for i in range(2, len(sys.argv)):
                cus_data.append(sys.argv[i])
            insert_out(db, cus_data)
        elif sys.argv[1] == "-c":
            create_tables()
        elif sys.argv[1] == "-pw":
            pop_waiting(db)
        elif sys.argv[1] == "-r":
            refresh_tables(db)
        elif sys.argv[1] == "-e":
            export_helped_table(db)
        else:
            print errorArgument
    db.close()


# def test_data():
#     values = ['ryan', 'rmayobre', '900756136', 'windows7', 'test']
#     db = connect_database()
#     create_tables()
#     insert_customer(db, values)
#     pop_waiting(db)
#     pop_help(db, '1')
#     select_all(db, 'helped')
#     export_helped_table(db)
#     db.close


if __name__ == "__main__":
    main()
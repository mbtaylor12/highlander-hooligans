import sys
import sqlite3


databasename = sys.argv[1]
tablename = sys.argv[2]
username= sys.argv[3]
password = sys.argv[4]
permissions = sys.argv[5]
salt = sys.argv[6]

conn = sqlite3.connect(databasename)

statement = "UPDATE " + tablename + " SET password='" + password + "', permissions='" + permissions + "', salt='" + salt + "' WHERE username='" + username + "'"


c = conn.cursor()
c.execute(statement)

conn.commit()
conn.close()

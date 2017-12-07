import sys
import sqlite3


databasename = sys.argv[1]
tablename = sys.argv[2]
colname = sys.argv[3]
data = sys.argv[4]

conn = sqlite3.connect(databasename)

statement = "DELETE FROM " + tablename + " WHERE " + colname + "='" + data + "'"

c = conn.cursor()
c.execute(statement)

conn.commit()
conn.close()


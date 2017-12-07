import sys
import sqlite3


databasename = sys.argv[1]
tablename = sys.argv[2]
assetNum = sys.argv[3]
assetDesc = sys.argv[4]
manuFac = sys.argv[5]
modelNum = sys.argv[6]
serialNum = sys.argv[7]
periphIncluded = sys.argv[8]
roomNum = sys.argv[9]
ticketStat = sys.argv[10]

conn = sqlite3.connect(databasename)

statement = "UPDATE " + tablename + " SET assetDesc='" + assetDesc + "', manuFac='" + manuFac + "', modelNum='" + modelNum + "', serialNum='" + serialNum + "', periphIncluded='" + periphIncluded + "', roomNum='" + roomNum + "', ticketStat='" + ticketStat + "' WHERE assetNum='" + assetNum + "'"


c = conn.cursor()
c.execute(statement)

conn.commit()
conn.close()

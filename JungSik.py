
# -*- coding: utf-8 -*-


from bs4 import BeautifulSoup

from urllib.request import urlopen

import pymysql
import datetime

html = urlopen('http://fd.postech.ac.kr/bbs/board_menu.php?bo_table=weekly')

source = html.read()

html.close()

soup = BeautifulSoup(source, "lxml")

temp3=soup.get_text()

start='(월)\n\n'

end = 'Kcal'

mon = (temp3.split(start))[1].split(end)[0]


start='(화)\n\n'

end = 'Kcal'

tue = (temp3.split(start))[1].split(end)[0]


start='(수)\n\n'

end = 'Kcal'

wed = (temp3.split(start))[1].split(end)[0]

start='(목)\n\n'

end = 'Kcal'

thu = (temp3.split(start))[1].split(end)[0]

start='(금)\n\n'

end = 'Kcal'

fri = (temp3.split(start))[1].split(end)[0]

start='(토)\n\n'

end = 'Kcal'

sat = (temp3.split(start))[1].split(end)[0]

start='(일)\n\n'

end = 'Kcal'

sun = (temp3.split(start))[1].split(end)[0]

temp4=(temp3.split(start))[1].split(end)[0]

def insert_jungsik(Mon,Tue,Wed,Thu,Fri,Sat,Sun,Week):
    query = "INSERT INTO Jungsik (Mon,Tue,Wed,Thu,Fri,Sat,Sun,Week) " \
            "VALUES(%s,%s,%s,%s,%s,%s,%s,%s)"
    args = (Mon,Tue,Wed,Thu,Fri,Sat,Sun,Week)
    conn2 = pymysql.connect(host='13.124.175.104', user='root', password='daisy7962', db='cafeteria', charset='utf8')
    cursor = conn2.cursor()
    cursor.execute(query,args)
    conn2.commit()
    cursor.close()
    conn.close()

insert_jungsik(mon,tue,wed,thu,fri,sat,sun,datetime.datetime.today())
    

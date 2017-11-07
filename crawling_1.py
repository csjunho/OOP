# -*- coding: utf-8 -*-
"""
Spyder Editor

This is a temporary script file.
"""
from bs4 import BeautifulSoup
from urllib.request import urlopen
html = urlopen('http://fd.postech.ac.kr/bbs/board_menu.php?bo_table=weekly')
source = html.read()
html.close()

soup = BeautifulSoup(source, "lxml")
table_div = soup.find(id="wrapper")
tables = table_div.find_all("table")
menu_table = tables[2]
trs = menu_table.find_all('tr')
sangrok_bakban_lunch = trs[13]
print(sangrok_bakban_lunch);
#tds = sangrok_bakban_lunch.find_all('td')
#mon = tds[3].span.string
#tue = tds[4].span.string
#wed = tds[5].span.string
#thu = tds[6].span.string
#fri = tds[7].span.string

#print(mon, tue, wed, thu, fri)

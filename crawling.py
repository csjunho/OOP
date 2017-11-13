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
#table_div = soup.find(id="wrapper")
#tables = table_div.find_all("table")
#menu_table = tables[2]
#trs = menu_table.find_all('tr')
#sangrok_bakban_lunch = trs[13]
temp3=soup.get_text()
start='(월)'
end = 'Kcal'
print((temp3.split(start))[1].split(end)[0])
start='(화)'
end = 'Kcal'
print((temp3.split(start))[1].split(end)[0])
start='(수)'
end = 'Kcal'
print((temp3.split(start))[1].split(end)[0])
start='(목)'
end = 'Kcal'
print((temp3.split(start))[1].split(end)[0])
start='(금)'
end = 'Kcal'
print((temp3.split(start))[1].split(end)[0])
start='(토)'
end = 'Kcal'
print((temp3.split(start))[1].split(end)[0])
start='(일)'
end = 'Kcal'
print((temp3.split(start))[1].split(end)[0])
temp4=(temp3.split(start))[1].split(end)[0]


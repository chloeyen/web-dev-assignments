#!/usr/bin/python
import cgi

form = cgi.FieldStorage()
city = form.getvalue('city').upper()
province = form.getvalue('province&state','').upper()
country = form.getvalue('country').upper()
url = form.getvalue('url')

if province == "":
    location = "{}, {}".format(city, country)
else:
    location = "{}, {}, {}".format(city, province, country)

print "Content-type: text/html\n\n"

html= '''
<DOCTYPE html>
<html lang="en">
<head><title>Python Demo</title></head>
<body style="margin: 0px; padding: 0">
'''

print html
print '<div style="padding: 10px; text-align: center; font-size: 5em; color: white; background-color: #b03a2e;">'
print location + '</div>'
print '<div style="display: flex; width: 100%; height: auto; justify-content: center;">'
print '<img src="' + url + '" alt="Image of "' + city + '" style="width: 80%; height: auto; border: 50px solid pink;">'
print '</div>'
print '</body></html>'





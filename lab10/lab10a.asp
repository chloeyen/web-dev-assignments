<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab10a Background changing page</title>
</head>

<%
bgcolor = Request.QueryString("color")
Dim reg
Set reg = new RegExp
reg.Pattern = "^([0-9A-Fa-f]{3}){1,2}$"

if IsEmpty(bgcolor) Or bgcolor = "" then 
    bgcolor = "white"
elseif reg.Test(bgcolor) then
    bgcolor = "#" & bgcolor 
end if
%>

<body style="background-color: <% response.write(bgcolor) %>">

<%
lastVisit = Request.Cookies("lastVisit")
currentDateTime = Now
adjustDate = DateAdd("h", 1, currentDateTime)

if lastVisit = "" then
    response.write("<p>This is your first visit! Cookie has been set!</p>")
    Response.Cookies("lastVisit") = adjustDate
   
else 
    response.write("<p>Welcome back! Your last visit was <strong>" & lastVisit & "</strong></p>")
end if

response.write ("<p>Background is currently set to: " & bgcolor & "</p>")
%>

</body>
</html>
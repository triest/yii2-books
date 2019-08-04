

**REAT API**

Запросы:<br>
**КНИГИ:**  <br>
Получение всех книг:
GET: http://host/api

Получение всех книг по id автора:
GET: http://host/apis/:id

Удаление автора и связанных с ним книг:
DELETE:  http://host/apis/:id

Обновление автора книги:<br>
PUT: http://host/apis/:book_id?id_author=:author_id
<br>
POST параметры: <br> 
title, year, id_author,id_puhlisher 
<br>
id_puhlisher - задел под модель puhlisher.

Создание книги: <br>
POST: http://host/api/create
<br>
POST параметры: <br>
title, year, id_author,id_puhlisher 
<br>

**АВТОРЫ:** <br>
Создание автора: <br>
GET: http://host/authors <br>
GET: http://host/authors/:id <br>
DELETE: http://host/authors/:id <br> 
PUT: http://books/authors/:id <br>
POST параметры: <br> 
family,name,year_of_birth,country
POST: http://host/author/create <br>
POST параметры: <br> 
family,name,year_of_birth,country

Поля:  
family (requared)
name
year_of_birth (date)
country

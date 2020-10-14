# Student-library
Library web site that contain books and each book belong to specific category and contain two users, admin and student.
# User (admin and student) can:
  -1.	Register by username, password, mail, phone no and choose his role.
  -2.	Login by username, password and role.
  -3.	Update his profile details.
  -4.	Search for books that satisfy certain criteria.
  -5.	Show list of books.
# Admin can:
  -1.	Add book (book name, ISBN, Author, Publication Year, Number of copies, Category, Cover).
  -2.	Update book details.
  -3.	Show list of late borrowers and send to them reminder mail.
# Student can:
  -1.	Borrow a book by book name and select return date.
  -2.	Return a book by book name.
  -3.	Extend borrowing period by book name and select return date

## DataBase
**Download database 'registration' from one of links**
- https://www.dropbox.com/s/tnm9pyg4i1y9rst/registration.sql?dl=0
- https://drive.google.com/file/d/1UgxOxUzxVkVhtJUf9xj4kW9KyToE3Zim/view?usp=sharing
## Installation
 ### Follow the following steps to install and run the project
  1. Download the project as zip file
  2. Extract the zip file and copy student-library-master
  3. Paste inside root directory(for xampp xampp/htdocs, for wamp wamp/www, for lamp var/www/html)
  4. Open PHPMyAdmin (http://localhost/phpmyadmin)
  5. Create a database with name registration
  6. Import registration.sql file
  7. Run the script http://localhost/Student-library-master
  8. Link for admin Panel : http://localhost/Student-library-master/adminPage.php
  9. Link for student Panel : http://localhost/Student-library-master/studentPage.php



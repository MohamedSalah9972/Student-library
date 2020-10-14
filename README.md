# Student-library
Library web site that contain books and each book belong to specific category and contain two users, admin and student.
## User (admin and student) can:
  - Register by username, password, mail, phone no and choose his role.
  - Login by username, password and role.
  -	Update his profile details.
  -	Search for books that satisfy certain criteria.
  - Show list of books.
## Admin can:
  -	Add book (book name, ISBN, Author, Publication Year, Number of copies, Category, Cover).
  -	Update book details.
  -	Show list of late borrowers and send to them reminder mail.
## Student can:
  -	Borrow a book by book name and select return date.
  -	Return a book by book name.
  -	Extend borrowing period by book name and select return date

# DataBase
**Download database 'registration' from one of links**
- [Link 1(dropbox)](https://www.dropbox.com/s/tnm9pyg4i1y9rst/registration.sql?dl=0)
- [Link 2(google drive)](https://drive.google.com/file/d/1UgxOxUzxVkVhtJUf9xj4kW9KyToE3Zim/view?usp=sharing)
# Installation
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
# Technologies used
- **PHP, MySQL, JavaScript, Ajax, HTML, CSS**


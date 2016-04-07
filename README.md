# bookstore
  Library management software

## Features
  - Responsive website design with Bootstrap
  - Book autocomplete feature (Google Book API)
  - Lend as many books as you want
  - Works with Lamp stack (Apache, Php, MySQL)
  - Database example ready to import via PhpMyAdmin
  - Create diffrent users
  - Easy to add new languages
  - Works with most browsers
  - Easy to configure and install
  - 100% free and open source

## Installation
  1. Put the html folder into the htdocs folder of your Apache server
  2. Adjust the settings in include/settings.php (MySQL pass...)
  3. Include the database/bookstore.sql into your MySQL database
    1. Download PhpMyAdmin
    2. Extract and put it into the htdocs folder of your Apache server
    3. Browse to PhpMyAdmin and login
    4. Create a database named BookStore

      ![alt text](https://raw.githubusercontent.com/simonmeusel/bookstore/master/image/phpMyAdminCreateDatabase.png)
    5. Go to the import tab
    6. Select the database/bookstore.sql file
    7. Click Ok
  4. Setup the BookStore user
    1. Select the user table of the bookstore database

      ![alt text](https://raw.githubusercontent.com/simonmeusel/bookstore/master/image/phpMyAdminSelectUserTable.png)
    2. Edit the only user

      ![alt text](https://raw.githubusercontent.com/simonmeusel/bookstore/master/image/phpMyAdminEditUser.png)
    3. Put in your new secret ussername and password
  5. Browse to /bookstore/index.html
  6. That's it!

## Add book
  1. Click on the user icon (in the top right corner) and login

      ![alt text](https://raw.githubusercontent.com/simonmeusel/bookstore/master/image/bookstoreLogin.png)
  2. Click on the user icon add click on add book

      ![alt text](https://raw.githubusercontent.com/simonmeusel/bookstore/master/image/bookstoreAddBook.png)
  3. Type in the details

      ![alt text](https://raw.githubusercontent.com/simonmeusel/bookstore/master/image/bookstoreAddBookDetail.png)

## Credits
  - Bootstrap: http://getbootstrap.com/
  - JQuery: https://jquery.com/
  - Google Books API https://developers.google.com/books/

## Screenshot
  
  ![alt text](https://github.com/simonmeusel/bookstore/blob/master/image/bookstoreBanner.PNG)

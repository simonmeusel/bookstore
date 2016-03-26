# bookstore
  Library management program

## Features
  - Unlimited book
  - Search for book (by author, title and publisher)
  - Lend as many books as you want
  - Works with Lamp stack (Apche, Php, MySQL)
  - Database example ready to import via PhpMyAdmin
  - Create diffrent users
  - Language support: german !!!
  - Easy to configure and install
  - 100% free

## Installation
  1. Put the html folder into the htdocs folder of your Apache server
  2. Adjust the settings in include/settings.php (MySQL pass...)
  3. Include the database/bookstore.sql into your MySQL database
    1. Download PhpMyAdmin
    2. Extract and put it into the htdocs folder of your Apache server
    3. Browse to PhpMyAdmin and login
    4. Create a database named BookStore
    5. Go to the import tab
    6. Select the database/bookstore.sql file
    7. Click Ok
  4. Setup the BookStore user
    1. Select the user table of the bookstore database
    2. Edit the only user
    3. Put in your new secret ussername and password
  5. Browse to ip/bookstore/index.html
  6. That's it!

## Add book
  1. Click on the user icon (in the top right corner) and login
  2. Click on the user icon add click on add book
  3. Type in the details

## Credits
  - Bootstrap: http://getbootstrap.com/
  - JQuery: https://jquery.com/

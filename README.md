decoupled-app
=============

A Decoupled Application in PHP: Putting the Pieces Together

This code was developed to demonstrate how to utilize existing modern programming patterns (such as, Dependency Injection, Dependency Container, REST services, Unit of Work, and Repository) to build a decoupled application in PHP. For more information, read the full article here: 
http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html

Prerequisites:

MySQL (version 5.6.17)
PHP (version 5.5.12)
Apache (version 2.4.9)
Composer

The versions above are the version that I used to run the application. It is highly likely that slightly older versions would work as well, I just haven't tested them.

Installation steps:

Download the code from https://github.com/abdulla16/decoupled-app.
Navigate to the root directory of the project (decoupled-app) and run command "composer install". This should download the project dependencies into the decoupled-app/vendor directory.
Create a database called "decoupled_app".
Create a database user (grant all permissions) with name "d_app_user" and password "123456". Note: you can change these settings as long as you change the information in decoupled-app/Container/bootstrap.php.
Using the command prompt (or terminal), navigate to directory /Container and run the command "../vendor/bin/doctrine orm:schema-tool:create". This should create the user table under the decoupled_app database.
Point your Apache server to the directory decoupled-app/Web.

That's it!

Now you can test adding a user:

Launch the localhost/index.html page in your browser.
Select the PUT request type.
Enter service name: addUser.
Enter JSON data:

{"firstName": "First",
"lastName": "Last",
"userName": "username"}
Click "Call Service". Now the new user should be created.



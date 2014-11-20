decoupled-app
=============

A Decoupled Application in PHP: Putting the Pieces Together

This code was developed to demonstrate how to utilize existing modern programming patterns (such as, Dependency Injection, Dependency Container, REST services, Unit of Work, and Repository) to build a decoupled application in PHP. For more information, read the full article here: 
http://software-architecture-php.blogspot.com/2014/11/a-decoupled-application-in-php-putting.html

Prerequisites:

1. MySQL (version 5.6.17)
2. PHP (version 5.5.12)
3. Apache (version 2.4.9)
4. Composer

The versions above are the version that I used to run the application. It is highly likely that slightly older versions would work as well, I just haven't tested them.

Installation steps:

1. Download the code from https://github.com/abdulla16/decoupled-app.
Navigate to the root directory of the project (decoupled-app) and run command "composer install". This should download the project dependencies into the decoupled-app/vendor directory.
2. Create a database called "decoupled_app".
3. Create a database user (grant all permissions) with name "d_app_user" and password "123456". Note: you can change these settings as long as you change the information in decoupled-app/Container/bootstrap.php.
4. Using the command prompt (or terminal), navigate to directory /Container and run the command "../vendor/bin/doctrine orm:schema-tool:create". This should create the user table under the decoupled_app database.
5. Point your Apache server to the directory decoupled-app/Web.

That's it!

Now you can test adding a user:

1. Launch the localhost/index.html page in your browser.
2. Select the PUT request type.
3. Enter service name: addUser.
4. Enter JSON data:

{"firstName": "First",
"lastName": "Last",
"userName": "username"}
5. Click "Call Service". Now the new user should be created.



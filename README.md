Steps tu run yii Sympel project
============================

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:
~~~
php composer.phar global require "fxp/composer-asset-plugin:^1.3.1"
~~~

Into the project dir using the following command you'll install all the requirement package:
~~~
php composer.phar install
~~~

Now you should be able to access the application through the following URL, assuming `project_name` is the directory
directly under the Web root. 


~~~
http://localhost/project_name/web/
~~~

Set document roots of your web server, for backend /path/to/project_name/web/ and using the URL http://project_name.dev/
~~~
<VirtualHost *:80>
        ServerName backend.dev
        DocumentRoot "/path/to/project_name/web/"
        
        <Directory "/path/to/project_name/web/">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
            # Apache 2.4
            Require all granted
            
            ## Apache 2.2
            # Order allow,deny
            # Allow from all
        </Directory>
    </VirtualHost>
~~~

Change the hosts file to point the domain to your server.

Windows: c:\Windows\System32\Drivers\etc\hosts
Linux/MAC: /etc/hosts

Add the following lines:

~~~
127.0.0.1   project_name.dev
~~~


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


CONFIGURATION
-------------

### Database
The file of the database is on root dir of the project `/db_24102017.sql`

Edit the file `config/db.php` with real data, for example:
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=sympel_db',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```
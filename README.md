## Deploy to Hosting

- Import the wedding-invitation.zip folder first
- Extract wedding-invitation.zip zip folder in main domain
- Create 3 subdomains, namely: invitation, guestbook, admin and are directed to document_root, namely public_html
- Create database and import database
- Open the app/config folder
- Edit database.php and constants.php files

Database.php

```php
'hostname' => 'localhost',
'username' => 'YourDBUsername',
'password' => 'YourDBPassword',
'database' => 'YourDBName',
```

Constants.php

```php
// //LINK DOMAIN WITH URL
define('SITE_UTAMA', 'https://undangakad.my.id/');
define('SITE_UNDANGAN', 'https://invitation.undangakad.my.id/');
define('SITE_ADMIN', 'https://admin.undangakad.my.id/');
define('SITE_BUKUTAMU', 'https://bukutamu.undangakad.my.id/');

//DOMAIN ONLY
define('MAIN_DOMAIN', 'undangakad.my.id');
define('DOMAIN_MAIN_WWW', 'www.undangakad.my.id'); //PAKE WWW
define('DOMAIN_UNDANGAN', 'invitation.undangakad.my.id');
define('DOMAIN_ADMIN', 'admin.undangakad.my.id');
define('DOMAIN_BUKUTAMU', 'guestbook.undangakad.my.id');
```

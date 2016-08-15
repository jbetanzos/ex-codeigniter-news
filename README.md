# DemoSite-News

The application was developed for PHP 5.2.4, it uses the las Angujar and Bootstrap 
libraries. Legacy browser could have problems.

If you try to update the project with the composer command you need to copy manually the 
content of the directory 

	Source/application/vendor/phenix/php-font-lib/

Into the directory

	Source/application/vendor/dompdf/dompdf/lib/php-font-lib/

The CodeIgniter project must be configure according to your local environment. Feel free 
to edit the Source/application/config/config.php in the variable $config['base_url']

You also need to update the database connection in Source/application/config/database.php

The database script is in

	Source/db_script/news.sql

Finally you need to update the configuration for a Gmail account in the class
Source/application/models/Mailer/GmailMailer.php in the variables

	$this->mailClient->Username = '';
	$this->mailClient->Password = '';

Additional Development
PHPUnit Testing
FrontEnd Development
Design
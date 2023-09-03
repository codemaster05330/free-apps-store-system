It is database management application for free apps store 
Technologies used: PHP and MySQL.

demo
====

[demo](https://freeappstore.000webhostapp.com/)

* demo credentials 
	* admin :   admin@domain.com , admin
	* developer: dev1@domain.com , developer1
	* developer: dev2@domain.com , developer2
	* normal user: user@domain.com , user
	
system details
==============

* it has three kinds of users 
	* guset[unregistered] 
	* normal user[registered user]	
	* developer[registered developer]	
	* admin[admin privilege user]

* guset privileges
	* browse website apps ,developers 
	* search for specific app name
	* sign up 
	* download apps

* normal user privileges
	* guset privileges
	* review apps
	* manage thier accounts[update ,delete]
	* create developer account

* developer privileges
	* guset privileges
	* add new app 
	* update their apps
	* delete their apps
	* manage their accounts
	* view thier apps related reviews 
	
* admin privileges
	* manage users [change privilege,delete]
	* approve or unapprove  [apps(new/updates) ,developers accounts(new/updates),apps users reviews]
	* manage system divisions (categories,platforms)[add ,edit ,delete]
	* misc


code notes
==========
		* all form inputs are straightforward ,no validation script till now
        * projet focus mainly on php and mysql,so play with css styles as you want
		
		
		

future list
============
			*reveiew and rating system for apps 
			*optimize search based on apps keywords rather than apps names
			*ability to report apps ,and broken links 
			*show related or similar apps list 
			*social sign up and login 
			*apps ads
			*provide statistics system for admin ,developer
			*newsletters for new apps ,apps updates
			
how to use it 
=============
	1- import appstore.sql to your db , as it contain database setup 
	2- copy content to your local server directory 

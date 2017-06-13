it is database management application for free apps store 
Technologies used: PHP and MySQL.

demo
====

[demo](https://) 

demo credentials :
	admin :   admin@domain.com , admin
	develper: dev1@domain.com , develper1
	develper: dev2@domain.com , develper2
	normal user: user@domain.com , user
	
system details
==============

it has three kinds of users 
	o guset[unregistered] 
	o normal user[registered user]	
	o develper[registered develper]	
	o admin[admin privilege user]

guset privileges:
	o download apps
	o report broken links

normal user privileges:
	o guset privileges
	o review apps
	o manage thier accounts

develper privileges:
	o guset privileges
	o add new app 
	o update their apps
	o delete their apps
	o manage their accounts
	
admin privileges:
	o manage users [add,edit,delete]
	o review [apps(new/updates) ,develpers accounts(new/updates),apps users reviews]
	o manage system divisions (categories,platforms)[add ,edit ,delete]
	o misc


how to use it 
=============
	1- download images from [here](https://)
	2- extract images folder in repo dir
	3- setup database in dbconfig.php file located in includes folder
	4- edit dbsetup.php to choose admin credentials defaults are
		login mail: admin@domain.com ,password : admin
	4- run dbsetup.php file to setup system tables
	5- note that system will be empty ,you need to create develper account and add apps to it
	
	
finally
=======
	
I would also gladly welcome your questions and contributions.

you are welcome to contact me at

m.hussein1389@gmail.com

Have fun!

Mohamed Hussein.		
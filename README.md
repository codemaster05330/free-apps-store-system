it is database management application for free apps store 
Technologies used: PHP and MySQL.

demo
====

[demo](https://) 

demo credentials :
	* admin :   admin@domain.com , admin
	* develper: dev1@domain.com , develper1
	* develper: dev2@domain.com , develper2
	* normal user: user@domain.com , user
	
system details
==============

it has three kinds of users 
	* guset[unregistered] 
	* normal user[registered user]	
	* develper[registered develper]	
	* admin[admin privilege user]

guset privileges:
	* download apps
	* report broken links

normal user privileges:
	* guset privileges
	* review apps
	* manage thier accounts

develper privileges:
	* guset privileges
	* add new app 
	* update their apps
	* delete their apps
	* manage their accounts
	
admin privileges:
	* manage users [add,edit,delete]
	* review [apps(new/updates) ,develpers accounts(new/updates),apps users reviews]
	* manage system divisions (categories,platforms)[add ,edit ,delete]
	* misc


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
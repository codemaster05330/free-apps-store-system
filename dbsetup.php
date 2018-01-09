<?php

/**
 * @author mohamed hussein
 * @copyright 2017
 */
include_once('includes/dbconfig.php');

$sql='CREATE TABLE IF NOT EXISTS users (userID int(11) NOT NULL AUTO_INCREMENT,
        userEmail VARCHAR(255) NOT NULL,
        userPassword VARCHAR(255) NOT NULL ,
        userFirstName VARCHAR(255) NOT NULL ,
        userLastName VARCHAR(255) NOT NULL ,
        userLevel int(8) NOT NULL,
        relatedID int(8) ,
        joinDate DATETIME NOT NULL,
        activationKey VARCHAR(255),
        userImg longblob ,
        lastLogin DATETIME,
        notification VARCHAR(255),
        UNIQUE INDEX email_unique(userEmail),
        PRIMARY KEY(userID)
         )ENGINE=INNODB';
         
        mysql_query($sql) or die("query failed due to ".mysql_error());
        
       $sql='CREATE TABLE IF NOT EXISTS Categories  (catID int(11) NOT NULL AUTO_INCREMENT,
        catName VARCHAR(255) NOT NULL,
        catParent int(8),
        UNIQUE INDEX catname_unique(catName),
        PRIMARY KEY(catID)
         )ENGINE=INNODB';
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
          $sql='CREATE TABLE IF NOT EXISTS platforms   (platformID int(11) NOT NULL AUTO_INCREMENT,
        platformName VARCHAR(255) NOT NULL,
        platformIcon longblob NOT NULL,
        UNIQUE INDEX platform_unique(platformName),
        PRIMARY KEY(platformID)
         )ENGINE=INNODB';
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
          $sql='CREATE TABLE IF NOT EXISTS reviews (reviewID int(11) NOT NULL AUTO_INCREMENT,
        authorID int(11) NOT NULL,
        reviewValue float(11) NOT NULL ,
        reveiwContent VARCHAR(255) NOT NULL ,
        reviewAppID  int(11) NOT NULL,
        reviewDate DATETIME NOT NULL,
        approvedBy int(11) ,
        approvalDate DATETIME,
        PRIMARY KEY(reviewID)
         )ENGINE=INNODB';
         
        mysql_query($sql) or die("query failed due to ".mysql_error()); 
        
        $sql='CREATE TABLE IF NOT EXISTS developers (developerID int(11) NOT NULL AUTO_INCREMENT,
        developerName VARCHAR(255) NOT NULL,
        developerEmail VARCHAR(255) NOT NULL ,
        developerWebsite VARCHAR(255) NOT NULL ,
        develperLogo longblob NOT NULL ,
        authorID int(11) NOT NULL,
        country int(8) NOT NULL ,
        city VARCHAR(255) NOT NULL,
        state VARCHAR(255) NOT NULL,
        zipcode int(11) NOT NULL,
        Address1 VARCHAR(255),
        Address2 VARCHAR(255),
        approvalMsg VARCHAR(255),
        approvedBy int(11) ,
        approvalDate DATETIME,
        UNIQUE INDEX developer_unique(developerName),
        PRIMARY KEY(developerID)
         )ENGINE=INNODB';
         
        mysql_query($sql) or die("query failed due to ".mysql_error());
        
        $sql='CREATE TABLE IF NOT EXISTS Apps  (appID int(11) NOT NULL AUTO_INCREMENT,
        appName VARCHAR(80) NOT NULL,
        appShortDesc VARCHAR(100) NOT NULL ,
        applongDesc VARCHAR(255) NOT NULL ,
        appIcon longblob NOT NULL ,
        developerID int(11) NOT NULL,
        appVersion float(8) NOT NULL,
        appReleaseDate DATETIME NOT NULL,
        appLanguage int(8) NOT NULL,
        appMainCatID int(11) NOT NULL,
        appSubCatID int(11) NOT NULL,
        appPlatformID int(11) NOT NULL,
        appSysRequirements VARCHAR(255) NOT NULL ,
        appSize float(11) NOT NULL ,
        appPrimaryLink VARCHAR(255) NOT NULL ,
        appSecondaryLink VARCHAR(255) ,
        appVideoLink VARCHAR(255)  ,
        appScreenshot1 VARCHAR(255) NOT NULL ,
        appScreenshot2 VARCHAR(255) ,
        appScreenshot3 VARCHAR(255)  ,
        appScreenshot4 VARCHAR(255)  ,
        appScreenshot5 VARCHAR(255)  ,
        appDownloads int(11) ,
        appRating float(11) ,
        approvalMsg VARCHAR(255),
        approvedBy int(11) ,
        approvalDate DATETIME,
        UNIQUE INDEX app_unique(appName),
        PRIMARY KEY(appID)
         )ENGINE=INNODB';
         
        mysql_query($sql) or die("query failed due to ".mysql_error());
        
        
        //relation between tables
        
        //users table
          $sql="ALTER TABLE users ADD FOREIGN KEY(relatedID) REFERENCES developers(developerID) ON DELETE CASCADE ON UPDATE CASCADE";
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
          
          //review table
          $sql="ALTER TABLE reviews ADD FOREIGN KEY(authorID) REFERENCES users(userID) ON DELETE RESTRICT ON UPDATE CASCADE";
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
           $sql="ALTER TABLE reviews ADD FOREIGN KEY(reviewAppID) REFERENCES apps(appID) ON DELETE CASCADE ON UPDATE CASCADE";
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
          $sql="ALTER TABLE reviews ADD FOREIGN KEY(approvedBy) REFERENCES users(userID) ON DELETE RESTRICT ON UPDATE CASCADE";
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
          //developers table
          $sql="ALTER TABLE developers ADD FOREIGN KEY(authorID) REFERENCES users(userID) ON DELETE CASCADE ON UPDATE CASCADE";
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
          $sql="ALTER TABLE developers ADD FOREIGN KEY(approvedBy) REFERENCES users(userID) ON DELETE RESTRICT ON UPDATE CASCADE";
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
          //apps table
          $sql="ALTER TABLE apps ADD FOREIGN KEY(approvedBy) REFERENCES users(userID) ON DELETE RESTRICT ON UPDATE CASCADE";
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
          $sql="ALTER TABLE apps ADD FOREIGN KEY(developerID) REFERENCES developers(developerID) ON DELETE CASCADE ON UPDATE CASCADE";
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
          $sql="ALTER TABLE apps ADD FOREIGN KEY(appMainCatID) REFERENCES Categories (catID) ON DELETE CASCADE ON UPDATE CASCADE";
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
          $sql="ALTER TABLE apps ADD FOREIGN KEY(appSubCatID) REFERENCES Categories (catID) ON DELETE CASCADE ON UPDATE CASCADE";
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
          $sql="ALTER TABLE apps ADD FOREIGN KEY(appPlatformID) REFERENCES platforms (platformID) ON DELETE CASCADE ON UPDATE CASCADE";
          mysql_query($sql) or die("query failed due to ".mysql_error());
          
          //default admin login email
        $adminEmail='admin@domain.com';
        //default admin password
        $adminPass='admin';
        
        $adminPass=md5($adminPass);
        
       // $sql="INSERT INTO users (userEmail,userPassword,userFirstName,userLastName,userLevel,joinDate)VALUES
        //       ('$adminEmail','$adminPass','mohamed','hussein',0,NOW())";
        
      // mysql_query($sql) or die("query failed due to ".mysql_error());
       
?>
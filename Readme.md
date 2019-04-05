 
# PHP/MySql project : NerdLuv
A multi-page "online dating" site that processes HTML forms with PHP while storing/retrieving data from mysql database.
## signup.php:
   - [X] A  header  logo,  a formto  create  a  new account, and footer notes/images.
   - [X] Name must have 16 alphabets separataed by space and first letter capitalised
   - [X] Gender is a radio button with female checked by default
   - [X] Age is 6 letter wide text box where only 2 characters are allowed
   - [X] only Keirsey personality type allowed and label is hyperlinked
   - [X] Favorite OS has Windows selected by default and has MACOSX and linux as Options
   - [X] Seeking age must have 2 digit input box

## signup-submit.php:
- [X] form should submitits data as a  POST to signup-submit.php
- [X] Resulting page has usual header and fotter and the text "login to see your matches"
- [X] All data must be validated, in case of error, errors must be displayed

## matches.php:
- [X] has 16 character input box that sends a GET request to matches-submit.php

## matches-submit.php:
- [X] If opposite gender, compatible age, same favourite OS, at least one personlity type common, found show the matches
- [X] If none found, display "No match is found"

## Database features:
- [X] Contains four tables (users, personalities, fav_os, seeking_age)

## To Setup:
Following steps are required to deploy the project "as is " in your server
1. Make sure you have mysql, and php. Routing can be setup by you.
1. create database named ```NERDLUV``` in mysql as ```CREATE DATABASE NERDLUV;```
1. create user named  ```USER1``` in mysql as ```CREATE USER 'USER1'@'localhost' IDENTIFIED BY 'USER1PASSWORD';```
1. grant permissions to ```USER1``` for the database as ```GRANT ALL PRIVILEGES ON NERDLUV.* TO 'USER1'@'localhost';```
2. import the **NERDLUV.sql** file into database as ```SOURCE NERDLUV.sql```
1. NerdLuv is all set for deployment at your own discretion!
1. ***optional*** you can also import a readily available dataset. Instead of importing **NERDLUV.sql**, import **data.sql**

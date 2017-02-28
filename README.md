# Warehouse
There is warehouse with many employees who can add/edit/delete products to stock. Also there are many categories of products. Such case is possible that one products belongs to many categories. There should be possibility to add and remove new employees to the system. Product should contain picture, description, price and whatever.


TECHNOLOGIES USED
============================

This Application use the [PHP](http://php.com/), [Yii 2 Framework](http://www.yiiframework.com/) and [MySQL database](http://mysql.com/)

YII 2
============================

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-basic/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-basic/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)

INSTALLATION & CONFIGURATION
============================

To install and running the APP is required to following the instructions bellow:

Clone the repository
```bash
git clone git@github.com:pauloteixeira/Warehouse.git
```

Configure your database connection, in the root of the project open the file and change data using the command below
```bash
$ vim basic/config/db.php
```

The file have the struct below:
```bash
<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=locahost;dbname=warehouse',
    'username' => 'root',
    'password' => 'dbpassword',
    'charset' => 'utf8',
];
```

create the vhost
```bash
<VirtualHost *:80>
    ServerAdmin warehouse.dev
    DocumentRoot "/Users/username/wwwroot/app/warehouse/basic/web"
    ServerName warehouse.dev
    ErrorLog "/Users/username/wwwroot/log/warehouse-error_log"
    CustomLog "/Users/username/wwwroot/log/warehouse-access_log" common
</VirtualHost>
```

**P.S.**
Can be necessary to give written permission in the images folder and other that are inside

Create the database using the script below
```sql
CREATE DATABASE warehouse;
```

Run the migrations in the terminal
```bash
php yii migrate new
```
This migration will be create all of the tables and insert a user to init of use.

if is necessaire, I'm making a database dump available to alread run the application with data in the folder script in the root of the project.

if you're using the dump data, the password of the admin@admin.com user is: senha123


ADMIN USER ACCESS
============================

**Username:** admin@admin.com

**Password:** password123



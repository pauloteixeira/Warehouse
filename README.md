# Warehouse
Há armazém com muitos funcionários que podem adicionar / editar / excluir produtos para estoque. Também há muitas categorias de produtos. Tal caso é possível que um produto pertence a muitas categorias. Deve haver possibilidade de adicionar e remover novos funcionários para o sistema. O produto deve conter a imagem, a descrição, o preço e o que quer que.

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



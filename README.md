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

To install and running the ERP is required to following the instructions bellow:

Clone the repository
```bash
git clone https://pauloteixeira@bitbucket.org/erpescola/escola.git
```

create the vhost
```bash
<VirtualHost *:80>
    ServerAdmin warehouse.dev
    DocumentRoot "/Users/pauloteixeira/wwwroot/app/warehouse/basic/web"
    ServerName warehouse.dev
    ErrorLog "/Users/pauloteixeira/wwwroot/log/warehouse-error_log"
    CustomLog "/Users/pauloteixeira/wwwroot/log/warehouse-access_log" common
</VirtualHost>
```

Install Composer
```bash
cd ~/
curl -sS https://getcomposer.org/installer | php
```


Move composer to global place
```bash
sudo mv composer.phar /usr/local/bin/composer
```

Inside the project run composer installation
```bash
cd warehouse/basic
composer install
```

ADMIN USER ACCESS
============================

**Username:** admin@admin.com

**Password:** senha123

EMPLOYEE USER ACCESS
============================

**Username:** employee1@admin.com

**Password:** senha123


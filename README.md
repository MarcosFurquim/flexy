# flexy

## How install

1. First of all, you need Docker installed in your computer

2. after that, just execute **docker-compose up** on project rootfolder using terminal or any or bash shell.
```sh
$ docker-compose up
```

3. Docker will start building this images:
    - nginx-proxy
    - flexy (application struture, the code!)
    - mariadb (where all storage here!)
    - phpMyAdmin (used only if you do not have any db client gui ;) ) 

4. After all done, you will need to add in your hosts
    - In Windows **C\Windows\System32\Drivers\etc\hosts**
    - In Linux/Mac **/etc/hosts**

    ### This line
    **127.0.0.1     local.flexy.com.br**

5.  All Done, just acess this link in your browser: **local.flexy.com.br**

## What was used:
* [Symfony](https://symfony.com) - PHP Framework
* [Twig](https://twig.symfony.com/) - Twig is a modern template engine for PHP
* [node.js](https://nodejs.org) - evented I/O for the backend
* [Gulp](https://gulpjs.com/) - the streaming build system
* [jQuery](https://jquery.com/) -  famous framework for Javascript
* [Twitter Bootstrap](https://getbootstrap.com/) - great UI boilerplate for modern web apps

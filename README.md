# flexy

## How install

1. First all, you need Docker installed in your computer
2. after that, just execute **docker-compose up** on root (where are the **docker-compose.yml** file) inside prompt or bash shell.
```sh
$ docker-compose up
```
3. The Docker will start build these images:
    - nginx-proxy
    - flexy (application struture, the code!)
    - mariadb (where all storage here!)
    - phpMyAdmin (only for use if you need one user client for db ;))
4. After all done, you need add in your hosts
    - In Windows stay  in  **C\Windows\System32\Drivers\etc\hosts**
    - In Linux/Mac here **/etc/hosts**

    ### ADD this line
    **127.0.0.1     local.flexy.com.br**
5.  All Done, only acess in your browser: **local.flexy.com.br**

## What was used:
* [Symfony](https://symfony.com) - PHP Framework
* [Twig](https://twig.symfony.com/) - Twig is a modern template engine for PHP
* [node.js](https://nodejs.org) - evented I/O for the backend
* [Gulp](https://gulpjs.com/) - the streaming build system
* [jQuery](https://jquery.com/) -  famous framework for Javascript
* [Twitter Bootstrap(https://getbootstrap.com/) - great UI boilerplate for modern web apps

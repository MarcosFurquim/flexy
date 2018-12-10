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
* [Twig] - Twig is a modern template engine for PHP
* [node.js] - evented I/O for the backend
* [Gulp] - the streaming build system
* [jQuery] -  famous framework for Javascript
* [Twitter Bootstrap] - great UI boilerplate for modern web apps

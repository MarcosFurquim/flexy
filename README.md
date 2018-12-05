# flexy

##How install

1. You nedd Docker installed in your computer
2. after that, just execute docker-compose up on root (where are the **docker-compose.yml** file)
3. The Docker will start build next images:
    - nginx-proxy
    - flexy (application struture, the code!)
    - mariadb (where all storage here!)
    - phpMyAdmin (only for use if you need one user client for db ;))
4. After all done, you need add in your hosts
    - In Windows stay  in  **C\Windows\System32\Drivers\etc\hosts**
    - In Linux/Mac here **/etc/hosts**

    ###ADD this line
    **127.0.0.1     local.flexy.com.br**
5.  All Done, only acess in your browser: **local.flexy.com.br**
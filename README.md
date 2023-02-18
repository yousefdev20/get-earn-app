# **E-Wallet**

### **Maintainer**
Yousef <[yousef.dev20@gmail.com]()>

### **Testing**
If you need to start test verify the testing database is running fine and
make sure you are inside the running container inside docker not on your machine.
change `.env.testing` if you need change the configuration that related test env steps:
1. serve the application via docker and make sure the container is up in running then
2. you need to migrate the testing database via the below command.
```
php artisan migrate --env=testing
php artisan test --env=test
```

### **Serve application**
You can serve this application using one command is (make)
or you can use the below commands:
###### I prefer use the first command that going to help you just one command (make)
```
sudo make
```
Or
```
docker-compose up -d --build
docker exec -it GetEarnApp composer install
docker exec -it GetEarnApp cp .env.example .env
docker exec -it GetEarnApp php artisan key:generate
docker exec -it GetEarnApp php artisan migrate
docker exec -it GetEarnApp php artisan migrate --env=testing
docker exec -it GetEarnApp php artisan key:generate
docker exec -it GetEarnApp php artisan optimize:clear
docker exec -it GetEarnApp php artisan view:cache
docker exec -it GetEarnApp php artisan route:cache
docker exec -it GetEarnApp php artisan event:cache
docker exec -it GetEarnApp php artisan config:cache

```

### **Services**

1. PHP -v 8.2 (with all php extensions)
2. MySQL -v 8.0
3. Supervisord or any web service
4. Redis server


### **Front-end Services**

1. Vue-cli -v 3.0
2. Vuex
3. VueRouter
4. Apexcharts


### Finally, Type this command (all in one)
```
make 
```

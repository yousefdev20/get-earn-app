# **E-Wallet**

### **Maintainer**
```
(Yousef)
```
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
docker-compose up -d --build
docker exec -it GetEarnApp /bin/bash
composer install
php artisan migrate
php artisan seed
php artisan optimize
```

### **Services**

1. PHP -v ~7.4 (with all php extenstion)
2. mysql -v 8.0
3. supervisord or any web service
4. redis server, or local driver


### **Front-end Services**

```
1. Vue-cli -v 3.0
2. Vuex
3. VueRouter
4. Apexcharts
```

### Finally, Type this command (all in one)
```
make 
```

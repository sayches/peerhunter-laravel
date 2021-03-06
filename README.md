# PeerHunter

| Admin Panel | Mobile Application | Database |
| --- | --- | --- |
| Laravel 7.2 (PHP Framework) | Ionic Framwork (Capacitor Ionic) & Apache Cordova | MySQL |

## 🖥️ Laravel Setup:
1. ``sudo apt-get install php7.2 php7.2-cli php7.2-common``
2. ``sudo apt install php7.2-xml``
3. ``sudo apt-get install php7.2-mbstring``
4. ``sudo apt-get install php7.2-gd``
5. ``sudo apt-get install php7.2-zip``
6. ``sudo apt-get install php7.2-curl``
7. Install Composer
8. ``sudo chmod 777 composer.json``
9. ``sudo composer require ladumor/one-signal``
10. ``sudo composer update``
11. ``sudo nano .env``
12. Do essential changes in ``.env`` file placed in root folder like database changes and app url and mail changes:
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

13. ``sudo apt install mysql-server``
14. ``sudo mysql_secure_installation``
15. ``sudo mysql -u root -p``
16. ``CREATE DATABASE db_name_here;``
17. ``CREATE USER 'db_user_here'@'localhost' IDENTIFIED WITH mysql_native_password BY 'db_password_here';``
18. ``GRANT ALL PRIVILEGES ON peerhunter.* TO 'db_user_here'@'localhost';``
19. ``FLUSH PRIVILEGES;``
20. ``sudo chmod 777 -R storage``
21. ``sudo apt-get install php7.2-mysql``
22. ``php artisan migrate``
23. ``php artisan serve --host 0.0.0.0 --port=8000``
24. ``sudo php artisan key:generate``
25. ``php artisan db:seed``
26. ``php artisan config:cache``
27. ``php artisan migrate:fresh`` to erase the database and start fresh
28. ``sudo php artisan passport:install --force`` to make the API secure. And ``php artisan passport:client --personal`` to create a client for the passport
29. To install S3 dependency on the sever, run the following command: ``composer require league/flysystem-aws-s3-v3 "~1.0"``

## 🔗 APIs Locations:
1. Twilio Authentication via SMS API path: ``./app/Http/Controllers/UserController.php``
___
Copyright © 2021 Sayches Ltd. All rights reserved.

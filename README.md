1. Скопировать .env.example в .env
2. Установить пароль к БД в `.env` файле `DB_ROOT_PASSWORD`
3. Скопировать config.php.example в config.php
4. Установить пароль к БД в `config.php` файле `password` 
5. Запустить контейнеры `docker-compose up -d`
6. Установить зависимости проекта `docker exec -it app composer install`
7. Посетить http://127.0.0.1/

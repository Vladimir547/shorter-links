##Установка

1. git clone https://github.com/Vladimir547/shorter-links.git
2. cd shorter-links
3. composer install
4. npm install and npm run build and npm run dev
5. Создать .env из файла .env.example
6. php artisan key:generate
7. bash ./vendor/laravel/sail/bin/sail up (./vendor/bin/sail up);
8. Установить в файле .envследущее:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=shorterLinks
    DB_USERNAME=sail
    DB_PASSWORD=password
9. php artisan migrate
10. php artisan serve
##Принцип работы
   Что бы создавать новые ссылки необходимо перейти во вкладку создать:
    ![image](https://github.com/Vladimir547/shorter-links/assets/48596087/87e2f1cf-294f-4679-8d77-7e974a6a7cd4)
   При создании проверяется правильность введенного внешней ссылки. Вводить необходимо в формате "https://github.com/".Если ввести неправильно, товалидация не пройдет:
   ![image](https://github.com/Vladimir547/shorter-links/assets/48596087/76626133-8522-44f8-a646-1713b33c619c)
   Поле "Внутреняя ссылка" может оставаться пустым, но можно и ввести данные. Данные в этом поле должны быть уникальными, и не содержать специальных символов:
   ![image](https://github.com/Vladimir547/shorter-links/assets/48596087/094e5f12-3e71-441e-a83b-3af84b8e68a2)
   Если попытаться создать с неуникальной внутренней ссылкой, выдаст ошибку:
   ![image](https://github.com/Vladimir547/shorter-links/assets/48596087/1e05122b-fdb1-4e49-8fd0-79aac878f728)
    Поле "Название", так же необходимо указывать(обязательно для заполнения).

   На главной странице выводятся все сгенерированные ссылки:
   ![image](https://github.com/Vladimir547/shorter-links/assets/48596087/7dbda2f8-03ef-42c5-988e-39395dab9a42)
   При нажатии на "Удалить", ссылка удаляется.
    Если нажать на "Изменить", то перейдете на страницу редактирования:
   ![image](https://github.com/Vladimir547/shorter-links/assets/48596087/e5449d3c-176e-4e58-b9de-e40dbf247a89)
   На странице редактирования, все работает также ка и на странице "Создать"

##Вход в админ панель:
http://127.0.0.1:8000/admin
email: admin@admin.com
password: password

##Api

Endpoints: 

Для получения всех ссылок:
метод: GET
http://127.0.0.1:8000/api/all

Для создания:
метод: POST
http://127.0.0.1:8000/api/create
body: {"url_external":"https://www.metasrc.com/","url_internal": "строка или пустота","url_name": "test"}

   


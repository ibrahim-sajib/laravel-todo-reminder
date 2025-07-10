
# reminder

```bash
# clone the repo
git clone 

#go to the chatbox
cd your_project_directory

#copy the .env.example content and make a .env file

cp .env.example .env

#install composer
composer install

#install npm
npm install

#generate app key
php artisan key:generate

#run this for starting the docker container
./vendor/bin/sail up -d

#migrate and seed the data
./vendor/bin/sail artisan migrate:fresh --seed

#for the root permission run this command in the terminal of docker laravel.test container if necessary
chown -R sail:sail storage

#run this
npm run dev

#run this if faced permission issues for log file
chmod -R 775 storage

#set this accordingly

MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=

APP_TIMEZONE=Asia/Dhaka

```

# Go to the dashboard page
# You can login with this credentials after seed
```plaintext
 name = Test User
 email = test@example.com
 password = password
```

# Go to the todos page
```
http://localhost/todos
```

# Setup queue and scheduler
./vendor/bin/sail artisan queue:work   
./vendor/bin/sail artisan schedule:work
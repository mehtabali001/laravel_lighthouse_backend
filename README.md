<<<<<<< HEAD
# laravel_lighthouse_backend
=======

Add this in .env file 

GOOGLE_CLIENT_ID=653246850784-pmophq77uh3ng0sg4jg3hf7bkjfpftjo.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=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
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/callback

Edit this in .env file as per your need:

APP_URL=http://localhost:8000

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=lighthouse

DB_USERNAME=

DB_PASSWORD=


Run:

npm install

php artisan migrate

php artisan serve



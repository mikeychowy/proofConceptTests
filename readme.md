# Proof of Laravel competencies using Laradminator admin dashboard template

**_[Laravel](https://laravel.com/) PHP Framework with [Adminator](https://github.com/puikinsh/Adminator-admin-dashboard)_** as admin dash

## Setup:

All you need is to run these commands:

```bash

git clone https://github.com/mikeychowy/proofConceptTests.git proof

cd proof

composer install # Install backend dependencies

sudo chmod 777 storage/ -R # Chmod Storage

php artisan storage:link # Enable link to storage

cp .env.example .env # Update database credentials configuration according to your setup

php artisan key:generate # Generate new keys for Laravel

php artisan migrate:fresh --seed # Run migration and seed users and categories for testing

yarn install # or npm i to Install node dependencies(>= node 9.x)

npm run production # To compile assets for prod

#if you don't use apache or nginx
php artisan serve

```

## Demo:

npm installing and rebuilding the assets is actually not needed as the public folder is an optimized build ready to be served.

**Note:**
Username: test@example.com
Password: 123456


>  **all the other non-admin accounts' passwords are 123456 as well**

#### Mailtrap (password reset functionality):

*  Please provide your own [MailTrap](https://mailtrap.io/) credentials in order to test the reset password functionality.

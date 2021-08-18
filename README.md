# DESCRIPTION

The repository contains configurations of Laravel and User Permissions 
using Spatie. The seeder of Users, Roles and Permissions can be seeded
successfully and there is no extension of the Models.

## INSTALLATION

First clone the repository

```bash
  Clone the repository
  cd my-project
```

Run composer and npm install

```bash
  Run composer
  Run npm install 
```

Create the copy of the .env file/ or copy and paste
```bash
  Cp .env.example
```
Generate an app encryption key
```bash
  php artisan key:generate 
```
Create an empty database for the application and update the .env 
file and update the following fields as required
```bash
  DB_DATABASE: your database name
  DB_USERNAME: your username
  DB_PASSWORD: password to the database
```

The email nortifications require the SMTP server to send the emails
to the user which need configuration as well on the .env file
```bash
  MAIL_HOST=smtp.mailtrap.io
  MAIL_PORT=2525
  MAIL_USERNAME=username
  MAIL_PASSWORD=password
  MAIL_ENCRYPTION=tls
  MAIL_FROM_ADDRESS=default_email_address
  MAIL_FROM_NAME="${APP_NAME}"  
```

When the setup is done run the migration 
```bash
  php artisan migrate
```

The application uses a package called [![Spatie](https://spatie.be/docs/laravel-permission/v4/introduction)
, which implements Roles and Permissions. There some configurations in this repository, to fast track the setup of roles and permissions you might run
the following command which __SEED_ default users, roles and permission in the database. 
```bash
  php artisan migrate:fresh --seed
```

When it runs, it creates the following users 
```bash
   Username:

   super@admin.com
   admin@admin.com
   manager@admin.com
   test@test.com (user)

   Password:

   password (in smaller letters for all users)
   
```

Start the server with the following artisan command
```bash
  php artisan serve
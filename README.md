# Falatozz.hu Laravel API

## Setup
- php > 8, composer
- composer install
- ./vendor/bin/sail up -d
- ./vendor/bin/sail php artisan migrate

## demo data ha kell
-  ./vendor/bin/sail php artisan db:seed
            'name' => 'falatozz',
            'email' => 'api@falatozz.hu',
            'email_verified_at' => now(),
            'password' => Hash::make('falatozz'),
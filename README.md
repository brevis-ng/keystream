<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation

Clone KeyStream
```
git clone https://github.com/brevis-ng/keystream.git
```

```cd``` to keystream folder

Run ```composer install``` to install all of the project dependencies

Copy ```.env.example``` file to ```.env```.
Open ```.env``` and change database name(```DB_DATABASE```), user(```DB_USERNAME```), password(```DB_PASSWORD```), app url(```APP_URL```)

Generate new app encryption key: ```php artisan key:generate```

Migrate the database and seed admin: ```php artisan migrate --seed```, the seeded admin is ```admin@keystream.com``` and password is ```@admin@```

## License

The KeyStream is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

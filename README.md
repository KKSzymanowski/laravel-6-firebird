## Firebird database driver for Laravel 6

Package inspired by [jacquestvanzuydam/laravel-firebird](https://github.com/jacquestvanzuydam/laravel-firebird/blob/master/composer.json) but simplified, modernized and made compatible with Laravel 6.

I do not create my own Firebird databases, only read from existing ones so the INSERT and UPDATE support may be spotty.

### Installation
```
composer require kkszymanowski/laravel-6-firebird
``` 
Add you database configuration in `config/database.php`
```php
'connections' => [
    'myFirebirdConnection' => [
        'driver'=> 'firebird',
        'host'=> env('DB_FIREBIRD_HOST', localhost),
        'database' => env('DB_FIREBIRD_DATABASE', '/path_to/database.fdb'),
        'username' => env('DB_FIREBIRD_USERNAME', 'SYSDBA'),
        'password' => env('DB_FIREBIRD_PASSWORD', 'masterkey'),
        'charset' => env('DB_FIREBIRD_CHARSET', 'UTF8'),
    ],

    // ...
],
```
Add the `DB_FIREBIRD_*` environment variables to you `.env` file, for example:
```
DB_FIREBIRD_HOST=192.168.0.1
DB_FIREBIRD_DATABASE=C:/DB.FDB
DB_FIREBIRD_USERNAME=user
DB_FIREBIRD_PASSWORD=password
DB_FIREBIRD_CHARSET=ISO-8859-2
```
If you're using models add
```php
protected $connection = 'myFirebirdConnection';
```
to your Firebird models.

If you're just running SQLs you can do:
```php
$users = DB::connection('myFirebirdConnection')->table('USERS')->select($sql, $bindings);
```

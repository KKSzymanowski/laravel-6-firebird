## Firebird database driver for Laravel 6

Package inspired by [jacquestvanzuydam/laravel-firebird](https://github.com/jacquestvanzuydam/laravel-firebird) but simplified, modernized and made compatible with Laravel 6, 7 and 8.

I do not create my own Firebird databases, only read from existing ones so the INSERT and UPDATE support may be spotty.

### Installation
```
composer require kkszymanowski/laravel-6-firebird
``` 
Add you database configuration in `config/database.php`
```php
'connections' => [
    'myFirebirdConnection' => [
        'driver'   => 'firebird',
        'host'     => env('DB_FIREBIRD_HOST', 'localhost'),
        'port'     => env('DB_FIREBIRD_PORT', '3050'),
        'database' => env('DB_FIREBIRD_DATABASE', '/path_to/database.fdb'),
        'username' => env('DB_FIREBIRD_USERNAME', 'SYSDBA'),
        'password' => env('DB_FIREBIRD_PASSWORD', 'masterkey'),
        'charset'  => env('DB_FIREBIRD_CHARSET', 'UTF8'),
    ],

    // ...
],
```
Add the `DB_FIREBIRD_*` environment variables to your `.env` file, for example:
```
DB_FIREBIRD_HOST=192.168.0.1
DB_FIREBIRD_PORT=3050
DB_FIREBIRD_DATABASE=C:/DB.FDB
DB_FIREBIRD_USERNAME=user
DB_FIREBIRD_PASSWORD=password
DB_FIREBIRD_CHARSET=ISO-8859-2
```

### Usage
#### Eloquent as model
To override your default database connection define `$connection` name in your Eloquent Model
```php
/**
 * The connection name for the model.
 *
 * @var string
 */
protected $connection = 'myFirebirdConnection';
```
After defining connection name you can use it in normal way as you use Eloquent:
```php
$user = User::where('id', 1)->get();

$users = User::all();
```

#### DB Query
Each time you have to define connecion name (if it isn't your default one), for example:
```php
$sql = 'SELECT * FROM USERS WHERE id = :id';
$bindings = ['id' => 1];
$user = DB::connection('myFirebirdConnection')->select($sql, $bindings);

$users = DB::connection('myFirebirdConnection')->table('USERS')->select('*')->get();
```

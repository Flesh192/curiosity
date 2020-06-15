### Instalation

##### System requirements:
 * PHP 7.4

#### Installation process:

Clone the repository. Go to the project dir.

Install all composer dependencies

```
    composer install
```

Clone the env-example file to .env, adjust the settings in it as you needed, run key generate.
```
    cp env-example .env
    php artisan key:generate
``` 

To run application use
```
    php artisan serve
``` 

To run tests write in console 
```
    phpunit
``` 

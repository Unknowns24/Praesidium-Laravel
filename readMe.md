# Praesidium

_Este es un paquete de roles y permisos diseñado para laravel 8_

## Requerimientos

 - Composer
 - PHP 7.3 o superior
 - Laravel 8.0.0 o superior
 - .env con base de datos configurada en tu aplicacion

### Instalacion

* **1 - Instalar Paquete** 
``` composer requier unk/praesidium ```

* **2 - Publicar el archivo de configuraciones**
```php artisan vendor:publish --tag=config```

* **3 - Publicar el archivo de Migraciones**
```php artisan vendor:publish --tag=migrations```

* **4 - Publicar el archivo de Seeders**
```php artisan vendor:publish --tag=seeds```

* **5 - Subir las migraciones a la base de datos**
```php artisan migrate```


* **6 - Subir la seed a la base de datos**
```php artisan db:seed --class=UNK\\Praesidium\\Database\\Seeders\\PraesidiumSeeder```


### Autor

* [Unknowns](https://github.com/Unknowns24)
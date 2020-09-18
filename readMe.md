# Praesidium

_Este es un paquete de roles y permisos diseñado para laravel 8_

## Requerimientos

 - Composer
 - PHP 7.3 o superior
 - Laravel 8.0.0 o superior
 - .env con base de datos configurada en tu aplicacion

## Instalacion

_Antes de nada para poder comenzar con la instalacion se debe agregar el siguiente codigo al archivo "composer.json" del projecto donde se quiere instalar esta libreria para laravel 8_

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/Unknowns24/Praesidium-Laravel.git"
    }
]
```

_Con esto le indicamos a composer que esa sera la direccion donde se tendra que descargar el paquete que solicitaremos mas tarde. Ahora vamos a tener que agragar al apartado "require" del mismo archivo el siguiente fragmento de codigo_

```json
"unk/praesidium": "dev-master"
```

_Despues de hacer esto, podremos realizar los siguientes pasos para la instalacion sin problemas._

* **1 - Instalar Paquete** 
``` 
composer requirev unk/praesidium 
```

* **2 - Publicar el archivo de configuraciones**
``` 
php artisan vendor:publish --tag=config 
```

* **3 - Publicar el archivo de Migraciones**
``` 
php artisan vendor:publish --tag=migrations 
```

* **4 - Publicar el archivo de Seeders**
``` 
php artisan vendor:publish --tag=seeds 
```

* **5 - Subir las migraciones a la base de datos**
``` 
php artisan migrate 
```


* **6 - Subir la seed a la base de datos** 
``` 
php artisan db:seed --class=UNK\\Praesidium\\Database\\Seeders\\PraesidiumSeeder 
```

##

### Autor

* [Unknowns](https://github.com/Unknowns24)
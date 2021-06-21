# Prueba Técnica CRUD

Esto es un **CRUD** para una prueba técnica. Consiste en una parte **pública** y otra **privada** accesible mediante un log in. En la parte **pública**, se muestra una tabla con empresas ficticias públicas y un botón para hacer log in. En la parte **privada**, se *muestran* dos pantallas de administración, una con todas las empresas (públicas y privadas), sus correspondientes empleados, haciendo click en cada una de ellas; y otra con la lista de todos los empleados. En cada uno de las pantallas de administración, se pueden *crear* nuevos elementos, *editar* los existentes o *borrarlos*.

## Requisitos

PHP 7.4.20 o superior
NodeJS 14.16.1 o superior

## Instalación

1. ejecutamos el comando `composer install` en la carpeta del proyecto
2. ejecutamos el comando `npm install`
3. ejecutamos el comando `npm run dev`
4. si no lo hemos hecho ya, creamos la base de datos donde se alojarán los datos de la app
5. creamos el archivo *.env* en base a *.env.example* y adecuamos las variables correspondientes a la base de datos con los datos y credenciales de la que hemos creado nosotros.
6. ejecutamos el comando `php artisan migrate` en nuestro proyecto para generar las tablas necesarias en nuestra base de datos
7. ejecutamos el comando `php artisan db:seed` para poblar la base de datos
8. ejecutamos el comando `php artisan key:generate`
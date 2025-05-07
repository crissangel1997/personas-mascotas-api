# Proyecto de Gestión de Personas y Mascotas API

Este proyecto es una API construida en **Laravel 8** que permite gestionar personas y mascotas. La API proporciona endpoints para crear, consultar, actualizar y eliminar registros de personas y sus respectivas mascotas.

## Requisitos del Sistema

- **WAMP 64bit Server 3.3.7** (PHP 7.4.33) 
- **Composer**
- **Laravel 8.x**
- **MySQL**

### Consideraciones importantes del desarrollador

* Antes de ejecutar el php artisan migrate, se debe crear la base de datos por que si no saldra 
  que no existe una base de datos cuando esta migre.

* En los endpoint de creacion de mascotas no es necesario pasar **imagen** esta se registra sola utilizando la api externa

* Los endpoint que tienen bearer token: ///, quiere decir que esas rutas necesitas Authorization

* El **php artisan db:seed** debe ser ejecutado solo una vez, debido a que si se vuelve a ejecutar se eliminara el usuario de prueba.

* Ojo en caso de ser ejecutado de nuevo  **php artisan db:seed**,  elimine de phpMyAdmin las tablas user, persona, mascotas 
  despues lance **php artisan migrate:fresh --seed** 

* Cada vez que se añada una documentacion a una ruta o auna funcion con laravel scribe se be ejecutar  **php artisan scribe:generate**, 
  y para visualizarlo en el anvegador se coloca **http://127.0.0.1:8000/docs**

# Instrucciones para instalar y correr el proyecto

Sigue estos pasos para instalar y correr el proyecto en tu entorno local:

### 1. Clonar el Repositorio

Clona el repositorio en tu máquina local usando Git:

En la termina de vsCode una vez seleccionada la ruta C:\wamp64\www

# Colocar: 

- git clone https://github.com/crissangel1997/personas-mascotas-api.git

### 2. Instalar dependencias

- composer install

### 3. Copiar el .env.example que ya viene con la configuracion d ela base de datos

- cp .env.example .env

### 4. Generar la clave de aplicacion 

- php artisan key:generate

### 5. Ejecturar migracion
- php artisan migrate

### 6.Ejecutar seed
- php artisan db:seed

### Iniciar el servidor 
- php artisan serve


## Endpoint, prueba con postman

**Registrar un usuario**

- POST http://127.0.0.1:8000/api/register

Ejemplo

{
  "name": "Juan Pérez",
  "email": "juan@example.com",
  "password": "123456"
}

**Iniciar sesion**

- POST http://127.0.0.1:8000/api/login

Ejemplo

{
  "email": "juan@example.com",
  "password": "123456"
}

**Logout**

- POST http://127.0.0.1:8000/api/logout

bearer Token: ///

**Refresh Token**

- POST http://127.0.0.1:8000/api/refresh

bearer Token: ///

**get Me**

- GET http://127.0.0.1:8000/api/me

bearer Token: ///

## Personas enpoint

- POST http://127.0.0.1:8000/api/personas

bearer Token: ///

Ejemplo 
{
  "nombre": "Pedro Gómez",
  "email": "perdo@gmail.com",
  "fecha_nacimiento": "1999-06-06"
}
- PUT http://127.0.0.1:8000/api/personas/{id} **El {id} se reemplaza por el id de la persona a actualizar**

bearer Token: ///

Ejemplo 
{
  "nombre": "Luis Gómez",
  "email": "Luis@gmail.com",
  "fecha_nacimiento": "1999-06-06"
}

- GET http://127.0.0.1:8000/api/personas

bearer Token: ///

- Delete http://127.0.0.1:8000/api/personas{id} **El {id} se reemplaza por el id de la persona a eliminar**

bearer Token: ///

## Consultar persona mascota

- GET http://127.0.0.1:8000/api/personas/{id}/mascotas **El {id} se reemplaza por el id de la persona con mascota a consultar**

bearer Token: ///

### Endpoint mascotas

- POST http://127.0.0.1:8000/api/mascotas

bearer Token: ///

Ejemplo 
{
 "nombre": "luna",
  "especie": "gato",
  "raza": "siamés",
  "edad": 2,
  "persona_id": 1 **se le asigna el id de persona a la mascota**
  }

- PUT http://127.0.0.1:8000/api/mascotas/{id} **El {id} se reemplaza por el id de la mascota a actualizar**

 bearer Token: ///  

 Ejemplo 
 {
 "nombre": "lucas",
  "especie": "perro",
  "raza": "beagle",
  "edad": 5,
  "persona_id": 1
  
  }

- GET http://127.0.0.1:8000/api/mascotas

 bearer Token: ///  

- DELETE http://127.0.0.1:8000/api/mascotas/{id}  **El {id} se reemplaza por el id de la mascota a eliminar**

 bearer Token: ///  


## Usuario para la autenticacion

- El usuario siguiente se encuentra en el UserSeeder lo cual  una vez se ejecute el seed se puede utilizar en el login

{ 
  "email": "admin@example.com",
  "password": "password123"
}




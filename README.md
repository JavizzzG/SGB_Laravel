Bienvendio al proyetco SGB_Laravel, un proyecto realizado en poco tiempo con esfuerzo y dedicación.

Si deseas ejecutar este proyecto en un entorno local sigue los siguientes pasos

1) Instala php y composer

- PHP: https://www.php.net/manual/en/install.php
- Composer: https://getcomposer.org/


2) Si ya tienes php y composer, es hora de instalar Laravel, este proceso lo puedes ver en la página de la documentación de Laravel https://laravel.com/docs/12.x/installation


3) Si ya tienes todo esto instalado, ahora si podemos clonar el repositorio.
Clona el repositorio de github en una carpeta vacía, aquí tienes un https para que lo clones
https://github.com/JavizzzG/SGB_Laravel.git


4) Cuando instales el repositorio, tendrás que ejecutar unos comandos en la consola, ya se en vsc o directamente en powershell, o la de tu preferencia.

5) A continuación nos ubicamos en la carpeta raiz "SGB_Laravel", y ejecutamos los siguientes comandos

    - composer install

    - npm install

    - cp .env.example .env

    - php artisan key:generate


6) Luego de ejecutar esos comandos debes usar un gestor de bases de datos o usar alguna herramienta que te permita escribir comandos de lenguaje SQL. Pero antes debes cambiar las variables de entorno .env para que apunten a tu base de datos. Puedes usar un modelo como este:

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3307
DB_DATABASE=sgb_prueba    
DB_USERNAME=root
DB_PASSWORD=

Ya habiendo configurado las variables de entorno para que paunten atu base de datos, ahora sí, creas una base de datos con el mismo nombre que usaste en la variable de entorno DB_DATABASE.

    - CREATE DATABASE sgb_prueba;


Luego de esto regresas al lugar donde escribiste los comandos de consola anteriores y escribes el siguiente comando que creara las tablas y conexiones de la base de datos

    - php artisan migrate


Esto te mostrará en consola las tablas generadas. Ahora bien, para generar algunos datos previos para el correcto funcionamiento del sistema, vas a regresar a la herramienta que usaste para escribir en SQL y copias y pegas el siguiente comando


USE sgb_prueba;

INSERT INTO billete (valor_billete, cantidad_billete) VALUES 
(50000, 20),
(20000, 20),
(10000, 20),
(5000, 20);

INSERT INTO cuenta (cedula_cuenta, nombre_cuenta, telefono_cuenta, nacimiento_cuenta, estado_cuenta, monto_cuenta) VALUES 
("1090293242", "Javier Galvis", "3018765431", '2008-01-01', 1, 5000000);

INSERT INTO tarjeta (cuenta_id, numero_tarjeta, cvc_tarjeta, monto_tarjeta, BIC_tarjeta, pin_tarjeta) VALUES 
(1, "1234567890123456", "123", 3000000, "B4anC4", "1234");



Con estos pasos ya está todo configurado y listo para ejecutar, asi que vamos a ver como se hace.


8) Para ejecutar el proyecto vas a escribir los siguientes comandos en la consola. te ubicas en la carpeta raiz y ejecutas el siguiente comando.

   - npm run dev

Y luego ejecutas este otro comando en otra terminal, pero sin finalizar el anterior, ambos se deben ejecutar al mismo tiempo.

   - php artisan serve

Este ultimo comando te muestra en la consola el servidor en que se está ejecutando, el cual debe parecerse al siguiente

[http://127.0.0.1:8000].

Copias y lo pegas en el navegador o puedes usar Ctrl + click en la url y ya con esto se abrirá la aplicación.

Si realizaste todos los pasos bien, deberías estar viendo la página inicial del proyecto que te pide ingresar una tarjeta.

De lo contrario, puedes repetir los pasos, ayudarte con IA o perdir ayuda a alguien para poder ejecutar.
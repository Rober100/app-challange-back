Sistema de Administración de Tareas - Backend

Este es el repositorio del backend para el Sistema de Administración de Tareas para empleados de la empresa "XY". Esta aplicación proporciona una API RESTful construida con Laravel para administrar tareas, usuarios, comentarios y archivos adjuntos.

Características

Autenticación de Usuarios: Los usuarios pueden iniciar sesión con su correo electrónico y contraseña. También hay funcionalidad para restablecer la contraseña si se olvida.
Gestión de Tareas: Los usuarios pueden crear, ver, actualizar y eliminar tareas. Las tareas tienen un título, una descripción, un estado y un empleado asignado.
Comentarios en las Tareas: Los usuarios pueden comentar en las tareas propias y las de sus compañeros.
Adjuntos de Archivos: Los usuarios pueden adjuntar archivos (PDF, JPG, JPEG, PNG) a las tareas. (Desarrollo)
Gestión de Roles: Hay roles de usuario para administradores y empleados. Los administradores tienen permisos adicionales para crear y eliminar tareas, así como para asignar empleados a tareas.
Reportes de Tareas: Los administradores pueden generar un reporte en formato PDF que muestra un resumen de las tareas realizadas en un período de tiempo especificado.
Requisitos

PHP >= 7.3
Composer
MySQL
Laravel CLI
Configuración

Clona este repositorio en tu máquina local.
Ejecuta composer install para instalar las dependencias de PHP.
Copia el archivo .env.example y renómbralo a .env. Luego, actualiza las variables de entorno con la configuración de tu base de datos y el correo electrónico SMTP.
Genera una nueva clave de aplicación ejecutando php artisan key:generate.
Ejecuta las migraciones de la base de datos con php artisan migrate.
Opcional: Si deseas cargar datos de prueba, puedes ejecutar los seeders con php artisan db:seed.
Inicia el servidor local con php artisan serve.
¡Gracias por considerar contribuir al proyecto! Elige un método de autenticación que se adapte mejor a tus necesidades y sigue las instrucciones para configurar y utilizar la aplicación.
# Formulario de Contacto — Universidad de La Salle

Es una aplicación que permite a los usuarios diligenciar un formulario de contacto de la Universidad de La Salle, almacena la información en una base de datos MySQL y permite visualizar los mensajes registrados.

## Funcionalidades
- Registro de datos desde formulario
- Validación de campos
- Visualización de mensajes
- Prueba de conexión (test.php)

## Tecnologías utilizadas

| Capa | Tecnología |
|:---:|:---:|
| Estructura | HTML5 |
| Estilos | CSS3 + Tailwind CSS |
| Íconos | Font Awesome 6.5 |
| Interactividad | JavaScript |
| Backend | PHP |
| Base de datos | MySQL |
| Servidor local | XAMPP (Apache + MySQL) |
| Hosting | InfinityFree |


## Roles del equipo

### Líder
**Juan Pablo Romero Guerrero**
Responsable de la organización y distribución de actividadaes a los integrantes según su rol y supervisar el correcto funcionamiento de cada parte del proyecto

### Frontend
#### Página principal
**Luisa María Puentes Torres**
Responsable del diseño y desarrollo visual de la página de inicio del sitio
- index.html — Estructura y contenido de la página principal
- css/styles.css — Estilos del proyecto


#### Formulario de contacto
**Santiago Cárdenas Aldana**
Responsable del desarrollo del formulario de contacto y su integración con el backend
- contacto.html — Formulario con campos de nombre, apellido, correo, teléfono, programa, asunto y mensaje, configurado para enviar datos a enviar.php


### Backend y Base de datos
**Juan Pablo Romero Guerrero**
Responsable de la lógica del servidor, el procesamiento de datos y la gestión de la base de datos
- enviar.php — Recibe los datos del formulario y los almacena usando consultas preparadas (protección contra SQL Injection)
- conexion.php — Realiza la conexión con la base de datos leyendo las credenciales desde el archivo .env
- Creación de la base de datos y la tabla en MySQL
- sql/database.sql — Script con la estructura de la base de datos


### Deploy
**Humberto Cubillos Torres**
Responsable de publicar el proyecto en una herramienta de Hosting público gratuito
- Subir del proyecto a InfinityFree
- Verificar el funcionamiento
- Configurar el hosting


### Tester
**Todos**
Todos los integrantes fueron responsables de probar el funcionamiento de cada parte del proyecto (Formulario, conexión a base de datos, almacenamiento de datos y visualización de mensajes), con tal de verificar que cada una funcionara correctamente y que en conjunto dieran solución adecuada al problema planteado.

## Repositorio en GitHub

- [https://github.com/Korikashi/Formulario-lasalle](https://github.com/Korikashi/Formulario-lasalle)

## URL del sitio

[https://lasalleformulario.infinityfreeapp.com](https://lasalleformulario.infinityfreeapp.com)


## Cómo montar el proyecto localmente

En caso de clonar el repositorio y querer ejecutarlo en su entoro local, realice lo siguiente:

### 1. Clonar el repositorio

git clone https://github.com/usuario/FORMULARIO-LASALLE.git

### 2. Mover el proyecto a la carpeta de XAMPP

Copie la carpeta del proyecto dentro de: C:/xampp/htdocs/ De tal modo que quede así:

C:/xampp/htdocs/FORMULARIO-LASALLE/

### 3. Iniciar XAMPP

Abra XAMPP como administrador y prenda los módulos de Apache y MySQL

### 4. Crear el archivo .env

En la carpeta del proyecto encontrará un archivo .env.example con la estructura de las variables de entorno, cree una copia llamada .env y complete la información con sus propias credenciales.

Luego, abra el archivo .env creado y reemplace los valores con sus propios datos de conexión:

DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=nombre_de_su_base_de_datos
DB_USER=su_usuario
DB_PASS=su_contraseña

Los valores aquí varían dependiendo de su configuración local. Tenga en cuenta que el archivo .env no debe subirse al repositorio ni compartirse públicamente (está en .gitignore)

### 5. Crear la base de datos

1. Abra el navegador y vaya a: http://localhost/phpmyadmin
2. Cree una base de datos nueva con el nombre que puso en DB_NAME
3. Seleccione esa base de datos y vaya a la pestaña Importar
4. Seleccione el archivo sql/database.sql del proyecto y haga clic en Importar

### 6. Verificar la conexión

En su navegador, abra: http://localhost/FORMULARIO-LASALLE/test.php

Al hacerlo, debería ver el mensaje de "Conexión exitosa"

### 7. Abrir el proyecto

Abra el proyecto usando http://localhost/FORMULARIO-LASALLE/index.html en el navegador


## Integrantes

| Nombre | Rol |
|:---:|:---:|
| Juan Pablo Romero Guerrero | Líder, Backend, Base de datos, Tester |
| Luisa María Puentes Torres | Frontend (Página principal), Tester |
| Santiago Cárdenas Aldana | Frontend (Formulario), Tester |
| Humberto Cubillos Torres | Deploy, Tester |

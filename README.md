## Pasos para ejecutar el proyecto

1. Clonar este proyecto e ingresar a la carpeta

```bash
git clone https://github.com/JefersonDeLaCruz/ProyectoIEC.git
cd ProyectoIEC
```

2. Levantar el contenedor Docker

```bash
docker compose down -v #Para y elimina todos los contenedores junto con su vólumen
docker compose up -d --build
```

3. Entrar al contenedor creado

```bash
docker ps
77246d8d1a3e   phpmyadmin:latest   "/docker-entrypoint.…"   47 minutes ago   Up 46 minutes             0.0.0.0:8082->80/tcp, [::]:8082->80/tcp       php_myadmin
5e219a819f5b   proyectoiec-app     "docker-php-entrypoi…"   47 minutes ago   Up 46 minutes             0.0.0.0:8080->80/tcp, [::]:8080->80/tcp       app
312f50b14b2c   mysql:8.0           "docker-entrypoint.s…"   47 minutes ago   Up 46 minutes (healthy)   0.0.0.0:3307->3306/tcp, [::]:3307->3306/tcp   mysql_
docker exec -it app bash
```

3. Instalar todas las dependencias necesarias

```bash
cd ProyectoIEC
composer install
```

4. Copiar la carpeta .env y hacer la configuracion

```bash
cp .env.example .env
```

5. Generar la clave y hacer las migraciones necesarias

```bash
php artisan key:generate
php artisan migrate
```

6. Si realizo los pasos correctamente haga clic en el siguiente enlace

http://localhost:8080
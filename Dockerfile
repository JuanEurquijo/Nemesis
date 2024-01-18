FROM richarvey/nginx-php-fpm:1.9.1

# Instalar Node.js y npm
RUN apk add --update nodejs npm

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos de la aplicación
COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Ejecutar comandos de npm, por ejemplo, instalar dependencias
RUN npm install

# Ejecutar el comando npm run build
RUN npm run build

# CMD se mantiene igual
CMD ["/start.sh"]

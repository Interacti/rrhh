# Usa la imagen oficial de PHP 7.3 con Apache
FROM php:7.3-apache

# Habilita el módulo de Apache para reescribir URL
RUN a2enmod rewrite

# Instala las extensiones de PHP necesarias para CodeIgniter y otras dependencias
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_mysql zip

# Instala Composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia los archivos de tu aplicación CodeIgniter al contenedor
COPY . /var/www/html

# Define el directorio de trabajo
WORKDIR /var/www/html

# Instala las dependencias de Composer
##RUN composer install

# Expone el puerto 80 para Apache
EXPOSE 80

# Inicia el servidor Apache
CMD ["apache2-foreground"] 

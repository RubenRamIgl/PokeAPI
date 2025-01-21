# Usar una imagen base de PHP
FROM php:8.1-cli

# Copiar los archivos del proyecto al contenedor
WORKDIR /app
COPY . .

# Instalar extensiones necesarias (como cURL)
RUN docker-php-ext-install curl

# Exponer el puerto 3000
EXPOSE 3000

# Comando por defecto para iniciar el servidor embebido de PHP en el puerto 3000
CMD ["php", "-S", "0.0.0.0:3000", "-t", "/app"]


# FROM -> ¡Qué imagen usamos de base?
FROM node:22.13.0-alpine3.21
# Vamos a crear un directorio y a movernos a él
WORKDIR /app/PokeAPI
# Copia el contenido de esta carpeta (local) al directorio /app (de la imagen)
COPY . .
# Tenemos que instalar las dependencias
RUN npm install
# Exponer el puerto
EXPOSE 3000
# Arrancar la app
CMD ["npm","run","dev"]
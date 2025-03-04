FROM nginx:latest

# Удаляем стандартные конфиги
RUN rm -rf /etc/nginx/conf.d/*

# Копируем наш конфиг в контейнер
COPY nginx/nginx.conf /etc/nginx/conf.d/default.conf

COPY ./src/ /var/www/laravel

# Открываем порт
EXPOSE 80

# Запуск Nginx
CMD ["nginx", "-g", "daemon off;"]

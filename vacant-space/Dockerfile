FROM php:8.2-apache

# Copy local code to the Apache document root
COPY . /var/www/html/

# Enable Apache rewrite module
RUN a2enmod rewrite

# Configure Apache to listen on port 8080 (Cloud Run's default port)
RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Set environment variable
ENV PORT=8080

EXPOSE 8080

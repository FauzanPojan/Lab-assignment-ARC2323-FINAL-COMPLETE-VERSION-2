# 1. Start with the official PHP 8.2 image that includes an Apache web server
FROM php:8.2-apache

# 2. Install the 'mysqli' extension. 
# Your database.php file uses 'new mysqli()', so the server needs this to talk to your database.
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# 3. Enable Apache's rewrite module (Standard best practice for routing PHP applications)
RUN a2enmod rewrite

# 4. Copy all your files from GitHub into the server's public viewing folder
COPY . /var/www/html/

# 5. Set the correct permissions so the web server can read your files
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# 6. Expose port 80 to the internet
EXPOSE 80
FROM php:8.2-cli

# Copy project files
COPY . /app
WORKDIR /app

# Install Composer or npm if needed
RUN apt-get update && apt-get install -y unzip curl && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Optional: Build Tailwind
# RUN npm install && npm run build

# Serve the PHP app
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
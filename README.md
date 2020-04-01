# digital city API #

RESTful API for digital city created with Laravel framework.

## Setup project on Localhost ##

### 1. Install Docker App for Mac/Linux/Windows ###

Download application from this URL:

    https://www.docker.com/products/docker-desktop

### 2. Create environment file ###

Copy source of `.env.example` to newly created `.env` file. Prepare app and database configuration settings.

### 3. Run following commands to build the images ###

Enter in digital-city/backend/Docker/nginx dir:

    docker build -t digital-city-nginx .

Enter in digital-city/backend/Docker/mysql dir:

     docker build -t digital-city-mysql .
     
Enter in digital-city/backend dir:

    docker build -t digital-city-api .
    
### 4. Build app with docker compose ###

Enter in /digital-city dir:

    docker compose up -d
    
### 5. Check if containers are running ###

    docker compose ps

### 6. Visit your app in browser ###

Enter following in browser's address bar:

    localhost:80


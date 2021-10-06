# WeatherApp

<br>

## About the project
This project is intended to test my skills in using the API with Laravel, in addition to caching and testing. I had used the Guzzle package as HTTP client, and the OpenWeatherMap as Weather API. 

<br>

## Benefits
Using my API you will be able to reduce the number of external requests, as it will store data in cache, for a limited period of time, since our intention is not to send "delayed" data to the user.

<br>

## How to run this project

Open your terminal, cmd or powershell and type:
```
git clone https://github.com/silvasilas99/weather-app.git
```

Move to app path and install dependencies
```
cd weather-app
composer install
```

Copy the .example.env to .env in root
```
copy .env.example .env  #Windows
cp .env.example .env    #Linux
```

Open the .env file and change the database name (DB_DATABASE) to whatever you have, the username (DB_USERNAME) and password (DB_PASSWORD) match your configuration.

Run the following commands:
```
php artisan key:generate
php artisan migrate
php artisan serve
```

Run the tests using PHPUnit:
```
./vendor/bin/phpunit
```